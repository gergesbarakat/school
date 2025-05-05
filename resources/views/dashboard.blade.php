<x-app-layout>

    <x-side-bar>

    </x-side-bar>
 
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <div class="max-w-xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">تصدير جدول المدرسة</h2>

                    <div class="mb-4">
                        <label for="school-select" class="block mb-2 text-sm font-medium text-gray-700">اختر المدرسة</label>
                        <select id="school-select"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                            <option value="">-- اختر المدرسة --</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-right">
                        <button id="export-button"
                                class="hidden px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition"
                                type="button">
                            <svg class="inline w-5 h-5 mr-2 -mt-1" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/>
                            </svg>
                            تحميل الجدول
                        </button>
                    </div>
                </div>


                <script>
                    document.getElementById('school-select').addEventListener('change', function () {
                        const selectedSchoolId = this.value;
                        const exportButton = document.getElementById('export-button');

                        if (selectedSchoolId) {
                            exportButton.style.display = 'inline-block';

                            exportButton.onclick = function () {
                                // Create and submit a form to download the file
                                const form = document.createElement('form');
                                form.method = 'GET';
                                form.action =' {{ route('export.schedules') }}'; // Adjust to your route
                                form.style.display = 'none';

                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = 'school_id';
                                input.value = selectedSchoolId;

                                form.appendChild(input);
                                document.body.appendChild(form);
                                form.submit();
                                document.body.removeChild(form);
                            };
                        } else {
                            exportButton.style.display = 'none';
                        }
                    });
                </script>

            </div>
        </div>



    <!-- CONTENT -->
    {{-- <div class = "content ml-12 transform ease-in-out duration-500   px-2 md:px-5 pb-4 ">

        <div class = "flex flex-wrap my-5 -mx-2">
            <div class = "w-full lg:w-1/3 p-2">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500 from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                    <div
                        class = "flex text-indigo-500 dark:text-white items-center bg-white   p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "object-scale-down transition duration-500">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            اجمالي عدد المدارس
                        </div>
                        <div class = "">
                            100
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class = "w-full md:w-1/2 lg:w-1/3 p-2 ">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500 from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                    <div
                        class = "flex text-indigo-500 dark:text-white items-center bg-white   p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "object-scale-down transition duration-500 ">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            اجمالي عدد الطلاب
                        </div>
                        <div class = "">
                            500
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                <div
                    class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500 from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                    <div
                        class = "flex text-indigo-500 dark:text-white items-center bg-white   p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "object-scale-down transition duration-500">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                        </svg>
                    </div>
                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class = "text-xs whitespace-nowrap">
                            اجمالي عدد الفصول
                        </div>
                        <div class = "">
                            500
                        </div>
                    </div>
                    <div class = " flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class = "w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class = "p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                role="alert">
                <span class = "font-medium">Info alert!</span> تم اضافة مدرسة جديدة.
            </div>
            <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                <span class = "font-medium">Danger alert!</span> Change a few things up and try submitting again.
            </div>
            <div class = "p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class = "font-medium">Success alert!</span> Change a few things up and try submitting again.
            </div> --}}
        {{-- <div class=" mx-auto">



            <div
                class="relative flex flex-col p-3 w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
                <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                    <div class="flex items-center justify-between ">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-800">مدارس البنات</h3>
                        </div>
                        <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                            <a href="{{ route('schools.index') }}"
                                class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                رؤية الجميع
                            </a>
                        </div>
                    </div>

                </div>
                <div class="p-0 overflow-scroll">
                    <table class="w-full mt-4 text-left table-auto min-w-max table-center">
                        <thead>
                            <tr>
                                <th
                                    class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                    <p
                                        class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                                        المدرسة
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
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
                                        عدد فصول المدرسة


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
                                    </p>
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
                                        <p class="text-sm font-semibold text-slate-700">{{ $school->region }}</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        {{ $school->classrooms }}
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="text-sm text-slate-500">{{ $school->manager_name }}</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="text-sm text-slate-500">{{ $school->phone }}</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <a href="{{ route('schools.edit', $school->id) }}">
                                            <button class="relative h-10 w-10 rounded-lg hover:bg-slate-900/10">
                                                <span
                                                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4">
                                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157
                                                                3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513
                                                                8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0
                                                                00-1.32 2.214l-.8 2.685a.75.75 0
                                                                00.933.933l2.685-.8a5.25 5.25 0
                                                                002.214-1.32L19.513 8.2z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>





        </div>
    </div>
--}}

</x-app-layout>
