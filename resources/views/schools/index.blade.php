<x-app-layout>

    <body class = "body bg-white dark:bg-[#0F172A]">
        <x-side-bar>

        </x-side-bar>
        <!-- CONTENT -->
        <div class = "content ml-12 transform ease-in-out duration-500   px-2 md:px-5 pb-4 ">

            <div class=" mx-auto">
                @if ($errors->any())
                    <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

                    </div>
                @endif


                <div
                    class="relative flex flex-col p-3 w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
                    <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                        <div class="flex items-center justify-between ">
                            <div>
                                <h3 class="text-lg font-semibold text-slate-800">مدارس البنات</h3>
                            </div>
                            {{-- <div class="flex flex-col gap-2 shrink-0 sm:flex-row">

                                <a href="{{ route('schools.create') }}"
                                    class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white shadow-md shadow-slate-900/10 transition-all hover:shadow-lg hover:shadow-slate-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" stroke-width="2" class="w-4 h-4">
                                        <path
                                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                        </path>
                                    </svg>
                                    اضافة مدرسة
                                </a>
                            </div> --}}
                        </div>

                    </div>
                    <div class="p-0 overflow-scroll">
                        <table class="w-full mt-4 text-left table-auto min-w-max">
                            <thead>
                                <tr>
                                    <th
                                        class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                        <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                                            المدرسة
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" aria-hidden="true"
                                                class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                            </svg>
                                        </p>
                                    </th>
                                    <th
                                        class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                        <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                                            المنطقة التعليمية


                                        </p>
                                    </th>
                                    <th
                                        class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                        <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                            عدد الفصول


                                        </p>
                                    </th>
                                    <th
                                        class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                        <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                            اسم مسؤولة الجدول


                                        </p>
                                    </th>
                                    <th
                                        class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                        <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                            جوال للتواصل

                                        </p>
                                    </th>
                                    <th
                                        class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                        <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                            تاريخ الانشاء

                                        </p>
                                    </th>
                                    <th
                                        class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                        <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                            تاريخ التحديث

                                        </p>
                                    </th>
                                    <th
                                        class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                        <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                            تحميل</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                    <tr>
                                        <td class="p-4 border-b border-slate-200">
                                            <div class="flex items-center gap-3">
                                                <img src="{{ $school->logo ? asset('storage/' . $school->logo) : 'https://via.placeholder.com/40' }}"
                                                    alt="{{ $school->name }}"
                                                    class="relative inline-block h-9 w-9 rounded-full object-cover object-center" />
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-semibold text-slate-700">{{ $school->name }}
                                                    </p>
                                                    <p class="text-sm text-slate-500">{{ $school->type }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 border-b border-slate-200">
                                            <p class="text-sm font-semibold text-slate-700">{{ $school->area }}</p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200">
                                            {{ count(value: $classes->where('school_id', $school->id)) }}
                                        </td>
                                        <td class="p-4 border-b border-slate-200">
                                            <p class="text-sm text-slate-500">{{ $school->manager_name }}</p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200">
                                            <p class="text-sm text-slate-500">{{ $school->phone }}</p>
                                        </td>

                                        <td class="p-4 border-b border-slate-200">
                                            <p class="text-sm text-slate-500">{{ $school->created_at }}</p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200">
                                            <p class="text-sm text-slate-500">{{ $school->updated_at }}</p>
                                        </td>
                                        <td class="p-4 bg-green-300 hover:bg-slate-900/10 border-b border-slate-200">
                                            <a
                                                href="{{ route('export.schedules', parameters: ['school_id' => $school->id]) }}">
                                                <button class="relative h-10 w-10 rounded-lg ">
                                                    تحميل الجدول
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>



                <script>
                    let table = new DataTable('table');
                </script>

            </div>
        </div>

    </body>
</x-app-layout>
