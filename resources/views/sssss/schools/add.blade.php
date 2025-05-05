<x-app-layout>

    <x-side-bar>

    </x-side-bar>
    <!-- CONTENT -->
    <div class = "content ml-12 transform ease-in-out duration-500   px-2 md:px-5 pb-4 ">

        <div class=" mx-auto">



            <div
                class="relative flex flex-col p-3 w-full h-full text-slate-700 bg-white justify-center items-center shadow-md rounded-xl bg-clip-border">

                <form class="w-full flex flex-col max-w-lg items-right justify-start" method="POST"
                    action="{{ route('schools.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-3xl text-end p-6 font-bold w-full tracking-tight text-black">اضافة مدرسة</h2>

                    <div class="flex flex-wrap mb-6 w-full items-around justify-center">
                        @if ($errors->any())
                        <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                            role="alert">
                            <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

                        </div>

                    @endif
                        <div class="w-full flex-col items-center flex px-3 mb-6 md:mb-0 py-4">
                            <label for="photo" class="block text-sm/6 m-5 font-medium text-gray-900">لوجو
                                المدرسة</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <svg class="size-20 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                    id="pnnn">
                                    <path fill-rule="evenodd"
                                        d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <img src="" alt="" id="logo"
                                    style="width:125px;height:125px;border-radius:50%;display:none">
                                <input type="file" style='display:none' name="logo">
                                <button type="button" onclick="imageinput()"
                                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50">Change</button>
                            </div>
                            @error('logo')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full flex justify-around gap-2 mb-6 md:mb-0">
                            <div class="w-6/12">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">اسم
                                    المدرسة</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-6/12">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">البريد
                                    الالكتروني</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('email') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                    type="text" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap w-full">
                            <div class="w-full">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">كلمة
                                    المرور</label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('password') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="password" name="password">
                                @error('password')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex jusify-around gap-2 w-full mb-2">
                        <div class="w-full w-1/2 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">اسم مسؤولة
                                الجدول</label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('manager_name') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                type="text" name="manager_name" value="{{ old('manager_name') }}">
                            @error('manager_name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-1/2 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">المنطقة
                                التعليمية</label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border @error('city') border-red-500 @else border-gray-200 @enderror text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                                    name="area">
                                    <option value="">اختر المنطقة</option>
                                    <option value="new_mexico" @selected(old('city') == 'new_mexico')>New Mexico</option>
                                    <option value="missouri" @selected(old('city') == 'missouri')>Missouri</option>
                                    <option value="texas" @selected(old('city') == 'texas')>Texas</option>
                                </select>
                                @error('city')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="w-full mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">جوال
                            للتواصل</label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('phone') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            name="phone" type="text" value="{{ old('phone') }}" placeholder="90210">
                        @error('phone')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                        Submit
                    </button>
                </form>

                <script>
                    function imageinput() {
                        const fileInput = document.querySelector('input[type=file]');
                        fileInput.click();
                        fileInput.addEventListener('change', function() {
                            document.querySelector('#pnnn').classList.add('hidden');
                            const logo = document.querySelector('#logo');
                            logo.style.display = "flex";
                            logo.setAttribute('src', URL.createObjectURL(this.files[0]));
                        });
                    }
                </script>

            </div>





        </div>
    </div>


</x-app-layout>
