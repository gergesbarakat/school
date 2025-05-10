<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div>
                <div class = "p-4  mb-4 text-right text-3xl text-bold      text-red-700 bg-white border-3xl border border-green-500   dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    عدد فصول المدرسة

                </div>
            </div>
            <style>
                table {
                    min-width: 30%;
                }

                @media (max-width: 768px) {


                    table {
                        min-width: 100%;
                    }
                }
            </style>
            <form action="{{ route('schedules.index') }}" method='GET'
                class="mx-auto flex flex-col items-end justify-start">
                @csrf
                <div class="w-full flex-wrap"
                    style="display: flex; gap: 30px; direction: rtl; justify-content: center; font-family: Arial;">
                    <input type="hidden" name="class_id" value="1">
                    @foreach ($grades as $gid => $grade)
                        @php
                            $clll = $classrooms->where('grade_id', $grade->id)->all();
                        @endphp
                        <table style="border: 3px solid black; border-collapse: collapse; text-align: center;">
                            <thead style="background-color: #e6adad;">
                                <tr>
                                    <th colspan="2" style="border: 3px solid black;">{{ $grade->name }}</th>
                                </tr>
                                <tr>
                                    <th style="border: 3px solid black;">الصف</th>
                                    <th style="border: 3px solid black;">عدد الفصول</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clll as $cid => $c)
                                    <tr>
                                        <td style="border: 3px solid black;">{{ $c->name }}</td>
                                        <td style="border: 3px solid black;">

                                            <input type="number" class="pr-3"
                                                name="grade[{{ $grade->id }}][{{ $c->id }}]"
                                                value="{{ count($school_classes->where('school_id', Auth::guard('school')->user()->id)->where('grade_id', $grade->id)->where('classroom_id', $c->id)) > 0? $school_classes->where('school_id', Auth::guard('school')->user()->id)->where('grade_id', $grade->id)->where('classroom_id', $c->id)->first()->number: '' }}"
                                                min="0" max="7">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach

                </div>
                <div class="w-full mt-6 p-4 flex-row-reverse flex gap-2">
                    <div class=" flex w-1/2   justify-start">
                        <a href="{{ route('teachers.index', ['back' => 'back']) }}"
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
                    <input type="text" id="no7${newRowNumber}" name="row[${newRowNumber}][no7]"
                        class="block w-full px-4 py-2 border shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                </td>
            `;

            // Append the new row to the table body
            tableBody.appendChild(newRow);
        }

        function deleteLastRow() {
            const tableBody = document.getElementById('asd'); // your <tbody> id
            const rows = tableBody.querySelectorAll('tr');
            if (rows.length > 0) {
                tableBody.removeChild(rows[rows.length - 1]);
                newRowNumber = newRowNumber - 1
            }
        }
    </script>

</x-app-layout>
