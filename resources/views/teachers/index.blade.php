<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div>
                <div class = "p-4  mb-4 text-right text-3xl text-bold      text-red-700 bg-white border-3xl border border-green-500   dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    {{ $settings->where('name', 'teacher1')->first()->text }}
                </div>
                <div class = "p-4  mb-4 text-right text-xl text-bold      text-red-700 bg-white border-3xl border border-green-500   dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    {{ $settings->where('name', 'teacher2')->first()->text }}
                </div>
            </div>
            <form action="{{ route('school-classes.index') }}" method='GET'
                class="mx-auto flex flex-col items-end justify-start">
                @csrf

                <div class = "p-4  mb-4  text-3xl text-bold      text-red-700 bg-white border-3xl border border-green-500   dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    انصبة المعلمين
                </div>

                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table id='asd' class="min-w-full table-auto border-collapse border border-gray-300"
                    dir="rtl">
                    <thead>
                        <tr>
                            <th
                                class="px-4 py-2 border border-lg border-black text-right text-sm font-medium bg-red-200 text-black">
                                م</th>

                            <th
                                class="px-4 py-2 border border-lg border-black text-right text-sm font-medium bg-red-200 text-black">
                                الاسم</th>
                            <th
                                class="px-4 py-2 border border-lg border-black text-right text-sm font-medium bg-red-200 text-black">
                                نصابها</th>
                            @if (!Auth::guard('school')->check())
                                <th
                                    class="px-4 py-2 border border-lg border-black text-right text-sm font-medium bg-red-200 text-black">
                                    المدرسة</th>
                            @endif
                            <th
                                class="px-4 py-2 border border-lg border-black text-right text-sm font-medium bg-red-200 text-black">
                                يعطي لهم سوابع
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php  $row = 0;  @endphp
                        @if (count($teachers) > 0)
                            @foreach ($teachers as $teacher)
                                <tr class="odd:bg-gray-100 rowid">


                                    <td class=" px-4 py-2 bg-red-200 text-black border border-lg border-black text-sm">
                                        {{ ++$row }}</td>
                                    <input type="hidden" id="row_id{{ $row }}"
                                        name="row[{{ $row }}][row_id]" value=" {{ $row }}" required
                                        class="hidden  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">


                                    <td class=" border border-lg border-black text-sm">
                                        <input type="text" id="name{{ $row }}"
                                            name="row[{{ $row }}][name]" value="{{ $teacher->name }}" required
                                            class="  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    </td>
                                    <td class=" border border-lg border-black text-sm">
                                        <input type="text" id="subject{{ $row }}"
                                            name="row[{{ $row }}][subject]"
                                            value="{{ $teacher->number_of_classes }}" required
                                            class="  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    </td>
                                    <td class=" border border-lg border-black text-sm">
                                        <select class='w-full h-full p-3' id="no7{{ $row }}"
                                            name="row[{{ $row }}][no7]">
                                            <option {{ $teacher->no7 == 'لا' ? 'selected' : '' }} value="لا">لا
                                            </option>
                                            <option {{ $teacher->no7 == 'نعم' ? 'selected' : '' }} value="نعم">نعم
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="odd:bg-gray-100 rowid">


                                <td class=" px-4 py-2 bg-red-200 text-black border border-lg border-black text-sm">
                                    {{ ++$row }}</td>
                                <input type="hidden" id="row_id{{ $row }}"
                                    name="row[{{ $row }}][row_id]"
                                    value="{{ old('row[' . $row . '][row_id]') }}" required
                                    class="hidden  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">


                                <td class=" border border-lg border-black text-sm">
                                    <input type="text" id="name{{ $row }}"
                                        name="row[{{ $row }}][name]"
                                        value="{{ old('row[' . $row . '][name]') }}" required
                                        class="  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </td>
                                <td class=" border border-lg border-black text-sm">
                                    <input type="text" id="subject{{ $row }}"
                                        name="row[{{ $row }}][subject]"
                                        value="{{ old('row[' . $row . '][subject]') }}" required
                                        class="  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </td>
                                <td class=" border border-lg border-black text-sm">
                                    <select class='w-full h-full p-3' id="no7{{ $row }}"
                                        name="row[{{ $row }}][no7]">
                                        <option {{ old('row[' . $row . '][no7]') == 'لا' ? 'selected' : '' }}
                                            value="لا">لا
                                        </option>
                                        <option {{ old('row[' . $row . '][no7]') == 'نعم' ? 'selected' : '' }}
                                            value="نعم">نعم
                                        </option>
                                    </select>
                                </td>
                            </tr>


                        @endif
                    </tbody>
                </table>
                <div class="flex gap-4">
                    <div class="mt-4   justify-start">
                        <a onclick="deleteLastRow()"
                            class="bg-red-800 text-xl text-white px-4 py-2   hover:bg-blue-600">
                            ازالة صف </a>
                    </div>
                    <div class="mt-4   justify-start">
                        <a onclick="addRow()" class="bg-[#1E293B] text-xl text-white px-4 py-2   hover:bg-blue-600">
                            اضف معلم
                        </a>
                    </div>


                </div>
                <div class="w-full mt-6 p-4 flex-row-reverse flex gap-2">
                    <div class=" flex w-1/2   justify-start">
                        <a href="{{ route('school.school-dashboard' ) }}"
                            class="bg-[#1E293B] text-center w-full text-xl text-white px-4 py-2   hover:bg-blue-600">
                            السابق
                        </a>
                    </div>
                    <div class="flex  w-1/2        justify-start">
                        <input type="submit" value='التالي '
                            class='bg-[#1E293B] text-center w-full text-xl text-white px-4 py-2   hover:bg-blue-600'
                            name="" id="">
                    </div>

                </div>
            </form>

        </div>
    </body>
    <script>
        let newRowNumber;

        function addRow() {
            const tableBody = document.getElementById('asd'); // ← replace with your table body ID

            // Get the last rowid number
            const allRowIds = document.querySelectorAll('.rowid');
            newRowNumber = allRowIds ? allRowIds.length = allRowIds.length + 1 : allRowIds.length = 1;

            // Create the new row HTML
            const newRow = document.createElement('tr');
            newRow.className = 'odd:bg-gray-100';

            newRow.innerHTML = `
                <td class="rowid px-4 py-2 bg-red-200 text-black border border-lg border-black text-sm">${newRowNumber}</td>
                <td class="border border-lg border-black text-sm">
                    <input type="text" id="name${newRowNumber}" name="row[${newRowNumber}][name]"
                        class="block w-full px-4 py-2 border shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                </td>
                                    <input type="hidden" id="row_id${newRowNumber}" name="row[${newRowNumber}][row_id]"
                        class="block w-full hidden px-4 py-2 border shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" required>

                <td class="border border-lg border-black text-sm">
                    <input type="text" id="subject${newRowNumber}" name="row[${newRowNumber}][subject]"
                        class="block w-full px-4 py-2 border shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                </td>
                <td class="border border-lg border-black text-sm">
                    <select class='w-full h-full p-3' id="no7${newRowNumber}" name="row[${newRowNumber}][no7]">
                                            <option   value="لا">لا
                                            </option>
                                            <option   value="نعم">نعم
                                            </option>
                                        </select>
                 </td>
            `;

            // Append the new row to the table body
            tableBody.appendChild(newRow);
        }

        function deleteLastRow() {
            const tableBody = document.getElementById('asd'); // your <tbody> id
            const rows = tableBody.querySelectorAll('tr');
            if (rows.length > 0) {
                rows[rows.length - 1].remove();
                newRowNumber = newRowNumber - 1
            }
        }
    </script>

</x-app-layout>
