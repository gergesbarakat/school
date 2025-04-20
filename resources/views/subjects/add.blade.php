<x-app-layout>

    <body class = "body bg-white dark:bg-[#0F172A]">
        <x-side-bar>

        </x-side-bar>
        <div class=" mx-auto">



            <div
                class="relative flex flex-col p-3 w-full h-full text-slate-700 bg-white justify-center items-center shadow-md rounded-xl bg-clip-border">

                <form method="POST" action="{{ route('subjects.store') }}" class="max-w-md mx-auto mt-10">
                    @csrf
                    <h2 class="text-3xl text-end p-6 font-bold w-full tracking-tight text-black">اضافة مادة</h2>
                    <div class="flex flex-wrap mb-6 w-full items-around justify-center">
                        @if ($errors->any())
                        <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                            role="alert">
                            <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

                        </div>

                    @endif

                    <div class="mb-4">
                        <label class="block font-bold mb-1">اسم المادة</label>
                        <input type="text" name="name" class="w-full border px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">الفئة</label>
                        <input type="text" name="category" class="w-full border px-3 py-2">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">اضافة</button>
                </form>
            </div>





        </div>
    </div>


</x-app-layout>
