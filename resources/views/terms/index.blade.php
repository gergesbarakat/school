<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div>
                <div class = "p-4  mb-4 text-right text-3xl text-bold      text-red-700 bg-white border-3xl border border-green-500   dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    شروط الجدول
                </div>

            </div>
            <form action="{{ route('terms.index') }}" method='GET' class="mx-auto flex flex-col items-end justify-start">
                @csrf



                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table id='asd' class="min-w-full table-auto border-collapse border border-gray-300" dir="rtl">
                    <thead>
                        <tr>
                            <th
                                class="px-4 py-2 border border-lg border-black text-right text-sm font-medium bg-red-200 text-black">
                                م</th>

                            <th
                                class="px-4 py-2 border border-lg border-black text-right text-sm font-medium bg-red-200 text-black">
                                الشرط</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php  $row = 0;  @endphp
                        @if (count($terms) > 0)
                            @foreach ($terms as $term)
                                <tr class="odd:bg-gray-100 rowid">


                                    <td class=" px-4 py-2 bg-red-200 text-black border border-lg border-black text-sm">
                                        {{ ++$row }}</td>

                                    <td class=" border border-lg border-black text-sm">
                                        <input type="text" id="text{{ $row }}"
                                            name="text[{{ $row }}] " value=" {{ $term->text }}"
                                            class="  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr class="odd:bg-gray-100 rowid">


                                <td class="  px-4 py-2 bg-red-200 text-black border border-lg border-black text-sm">
                                    {{ ++$row }}</td>

                                <td class=" border border-lg border-black text-sm">
                                    <input type="text" id="text{{ $row }}" name="text[] "
                                        class="  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    </input>
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
                            اضف شرط
                        </a>
                    </div>


                </div>
                <div class="w-full mt-6 p-4 flex-row-reverse flex gap-2">
                    <div class=" flex w-1/2   justify-start">
                        <a href="{{ route('schedules.index', ['class_id' => '14']) }}"
                            class="bg-[#1E293B] text-center w-full text-xl text-white px-4 py-2   hover:bg-blue-600">
                            السابق
                        </a>
                    </div>
                    <div class="flex  w-1/2        justify-start">
                        <input type="submit" value='ارسال '
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



                                <td class="rowid px-4 py-2 bg-red-200 text-black border border-lg border-black text-sm">
                                    ${newRowNumber}</td>

                                <td class=" border border-lg border-black text-sm">
                                    <input type="text" id="text${newRowNumber}" name="text[] "
                                        class="  block w-full px-4 py-2 border   shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    </input>
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
