<x-app-layout>

    <x-side-bar>

    </x-side-bar>
    <!-- CONTENT -->
    <div class = "content ml-12 transform ease-in-out duration-500   px-2 md:px-5 pb-4 ">

        <div class=" mx-auto">



            <div
                class="relative flex flex-col p-3 w-full h-full text-slate-700 bg-white justify-center items-center shadow-md rounded-xl bg-clip-border">

                <form class="w-full flex flex-col max-w-lg items-right justify-start"
                    action="{{ route('schools.update', $school->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- This is needed for the update method -->
                    @if ($errors->any())
                    <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

                    </div>

                @endif
                    <h2 class="text-3xl text-end p-6 font-bold w-full items-right tracking-tight text-black">تعديل بيانات
                        المدرسة</h2>

                    <div class="flex flex-wrap mb-6 w-full items-around justify-center">
                        <div class="w-full flex-col items-center flex px-3 mb-6 md:mb-0 py-4">
                            <label for="logo" class="block text-sm/6 font-medium text-gray-900">لوجو المدرسة</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                @if ($school->logo)
                                    <img id="logoPreview" src="{{ asset('storage/' . $school->logo) }}" alt="Logo"
                                        class="w-20 h-20 object-cover rounded-full border">
                                @else
                                    <svg id="logoPreview" class="w-20 h-20 text-gray-300" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif

                                <input type="file" id="logoInput" name="logo" class="hidden" accept="image/*">
                                <button type="button" onclick="document.getElementById('logoInput').click()"
                                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50">
                                    تغيير
                                </button>
                            </div>
                        </div>

                        <!-- Optional: Preview selected image -->
                        <script>
                            document.getElementById('logoInput').addEventListener('change', function(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    const preview = document.getElementById('logoPreview');
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        if (preview.tagName.toLowerCase() === 'img') {
                                            preview.src = e.target.result;
                                        } else {
                                            // replace svg with img if no image was set before
                                            const img = document.createElement('img');
                                            img.id = 'logoPreview';
                                            img.src = e.target.result;
                                            img.className = 'w-20 h-20 object-cover rounded-full border';
                                            preview.replaceWith(img);
                                        }
                                    };
                                    reader.readAsDataURL(file);
                                }
                            });
                        </script>
                        <div class="w-full flex justify-around gap-2 mb-6 md:mb-0">
                            <div class="w-6/12">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="name">
                                    اسم المدرسة
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="name" type="text" name="name" value="{{ $school->name }}">
                            </div>
                            <div class="w-6/12">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="email">
                                    البريد الالكتروني
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="email" type="text" name="email" value="{{ $school->email }}">
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full">
                            <div class="w-full">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="password">
                                    كلمة المرور
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="password" name="password" type="password" placeholder="******************">
                                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-around gap-2 w-full mb-2">
                        <div class="w-full w-1/2 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="manager_name">
                                اسم مسؤولة الجدول
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="manager_name" name="manager_name" type="text"
                                value="{{ $school->manager_name }}">
                        </div>
                        <div class="w-1/2 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="area">
                                المنطقة التعليمية
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="area" name="area">
                                    <option value="New Mexico" {{ $school->area == 'New Mexico' ? 'selected' : '' }}>New
                                        Mexico</option>
                                    <option value="Missouri" {{ $school->area == 'Missouri' ? 'selected' : '' }}>
                                        Missouri</option>
                                    <option value="Texas" {{ $school->area == 'Texas' ? 'selected' : '' }}>Texas
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="phone">
                            جوال للتواصل
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="phone" name="phone" type="text" value="{{ $school->phone }}">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">حفظ التعديلات</button>
                    </div>
                </form>

            </div>





        </div>
    </div>

</x-app-layout>
