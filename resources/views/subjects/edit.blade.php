<x-app-layout>

    <body class = "body bg-white dark:bg-[#0F172A]">
        <x-side-bar>

        </x-side-bar>
        <!-- CONTENT -->
        <div class = "content ml-12 transform ease-in-out duration-500   px-2 md:px-5 pb-4 ">

            <div class = "flex flex-wrap my-5 -mx-2">
                <form method="POST" action="{{ route('subjects.update', $subject->id) }}" class="max-w-md mx-auto mt-10">
                    @csrf
                    @method('PUT')
                    <h2 class="text-3xl text-end p-6 font-bold w-full tracking-tight text-black">تعديل مادة</h2>

                    <div class="flex flex-wrap mb-6 w-full items-around justify-center">
                        @if ($errors->any())
                        <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                            role="alert">
                            <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

                        </div>

                    @endif

                    <div class="mb-4">
                        <label class="block font-bold mb-1">اسم المادة</label>
                        <input type="text" name="name" class="w-full border px-3 py-2" value="{{ old('name', $subject->name) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">الفئة</label>
                        <input type="text" name="category" class="w-full border px-3 py-2" value="{{ old('category', $subject->category) }}">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">تحديث</button>
                </form>






            </div>
        </div>


</x-app-layout>
