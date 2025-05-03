<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h2 class="text-center text-2xl mb-4">Edit Schedule</h2>

                <!-- Grade and Classroom Selection -->
                <form method="POST" action="{{ route('schedules.update', $schedules->first()->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Grade and Classroom Filters -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        @if (Auth::guard('web')->check())
                            <div class="form-group">
                                <label for="school" class="block">school</label>
                                <select disabled id="school" name="school" class="form-control" required>
                                    <option value="{{ $school_id }}">{{ $schools->find($school_id)->name }}</option>
                                </select>
                                <input type="hidden" name="school_id" id='school_id' value="{{ $school_id }}"
                                class="hidden">

                            </div>
                        @else
                            <input type="hidden" name="school_id" id='school_id' value="{{ $school_id }}"
                                class="hidden">
                        @endif
                        <div class="form-group">
                            <label for="grade" class="block">Grade</label>
                            <select disabled id="grade" name="grade" class="form-control" required>
                                <option value="{{ $grade_id }}">{{ $grade->find($grade_id)->name }}</option>
                            </select>
                        </div>
                        <input type="hidden" name="grade" id='grade_id' value="{{ $grade_id }}" class="hidden">
                        <input type="hidden" name="classroom" id='classroom' value="{{ $classroom->id }}"
                            class="hidden">

                        <div class="form-group">
                            <label for="classroom" class="block">Classroom</label>
                            <select id="classroom" disabled name="classroom" class="form-control" required>
                                <option value="{{ $classroom }}">{{ $classroom->name }}</option>

                            </select>
                        </div>
                    </div>

                    <!-- Table for Adding Schedule -->
                    <div class="mt-8">
                        <style>
                            table.dataTable thead th,
                            table.dataTable tfoot th {
                                text-align: center;
                                justify-content: center;
                                align-items: center;
                                border: 1px solid black;

                            }

                            table.dataTable.row-border>tbody>tr>*,
                            table.dataTable.display>tbody>tr>* {
                                text-align: center;
                                justify-content: center;
                                align-items: center;
                                border: 1px solid black;

                            }
                        </style>
                        <table id="schedule-table" class="overflow-x-scroll display justify-center text-center"
                            style="width:100%">
                            <thead>
                                <tr class="border-black">
                                    <th colspan="3" width="30%">الصفوف</th>
                                    @foreach ($school_classes as $school_class)
                                        <th class="border-black  " colspan="1">{{ $school_class->name }}</th>
                                    @endforeach

                                </tr>
                                <tr class="border-black">
                                    <th class="border-black bg-red-200" colspan="1" data-dt-order="disable">العدد
                                    </th>
                                    <th class="border-black bg-red-200" colspan="1">المواد</th>
                                    <th class="border-black bg-red-200" colspan="1">عدد الحصص</th>
                                    @foreach ($school_classes as $school_class)
                                        <th class="border-black bg-red-200">المعلمة</th>
                                    @endforeach


                                </tr>
                            </thead>
                            <tbody>
                                @php $asdf = 0 @endphp

                                @php
                                    $unique_subjects = [];
                                @endphp

                                @foreach ($schedules as $schedule)
                                    @php
                                        $unique_subjects[] = $schedule->subject_id;
                                    @endphp
                                @endforeach
                                @php
                                    $unique_subjects = array_unique($unique_subjects);
                                    $row = 0;
                                @endphp
                                @foreach ($unique_subjects as $unique_subject)
                                    <tr class="border-black">
                                        @php $asdf = $asdf + optional($schedules->where('school_id', $school_id)->where('grade_id', $grade_id)->where('row_id', $row)->where('subject_id', $unique_subject)->first())->classes_per_week @endphp

                                        @php
                                            $scheduless = $schedules
                                                ->where('school_id', $school_id)
                                                ->where('grade_id', $grade_id)
                                                ->where('row_id', $row)
                                                ->where('grade_id', $grade_id)
                                                ->where('subject_id', $unique_subject);
                                        @endphp
                                        <td class="bg-red-200 number  rownumber">{{ $row + 1 }} </td>
                                        <td class="bg-red-200">
                                            <select id="row" name="row[{{ $row }}][subject]"
                                                class="form-control" required>
                                                @foreach ($subjects as $subject)
                                                    <option {{ $unique_subject == $subject->id ? 'selected' : '' }}
                                                        value="{{ $subject->id }}"> {{ $subject->name }} </option>
                                                @endforeach

                                            </select>
                                        </td>
                                        @php $ccccc = optional($schedules->where('school_id', $school_id)->where('grade_id', $grade_id)->where('row_id', $row)->where('subject_id', $unique_subject)->first())->classes_per_week @endphp
                                        <td class="bg-red-200">
                                            <input type="number" name="row[{{ $row }}][classes_per_week]"
                                                class="form-control" min="1" required
                                                value="{{ $ccccc }}">
                                        </td>
                                        @foreach ($school_classes as $school_class)
                                            <td>


                                                <select id="row "
                                                    name="row[{{ $row }}][class{{ $school_class->id }}][teacher]"
                                                    class="form-control" required>

                                                    @foreach ($teachers as $teacher)
                                                        <option
                                                            {{ optional(
                                                                $schedules->where('school_id', $school_id)->where('grade_id', $grade_id)->where('row_id', $row)->where('class_id', $school_class->id)->where('subject_id', $unique_subject)->first(),
                                                            )->teacher_id == $teacher->id
                                                                ? 'selected'
                                                                : '' }}
                                                            value="{{ $teacher->id }}">{{ $teacher->name }} </option>
                                                    @endforeach

                                                </select>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @php
                                        $row++;
                                    @endphp
                                @endforeach









                            </tbody>
                            <tfoot>
                                <tr class="border-black">
                                    <th colspan="3">اجمالي الحصص {{ $asdf }}</th>

                                </tr>
                            </tfoot>
                        </table>
                        <div class="mt-4">
                            <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md"
                                id="add-row-btn">Add Row</button>
                            <button type="button" class="px-4 py-2 bg-red-500 text-white rounded-md"
                                id="delete-last-row-btn">Delete Last Row</button>

                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-md">Save
                            Schedule</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            // Add new row functionality
            let rowNumber = 1;
            document.getElementById('add-row-btn').addEventListener('click', function() {
                // Create a new row

                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                                <tr class="border-black">
                                    <td class="bg-red-200 number  rownumber">` + (parseInt($('.rownumber:last')
                    .text()) + 1) + `</td>

                                    <td class="bg-red-200">
                                        <select id="row" name="row[` + rowNumber + `][subject]" class="form-control" required>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }} </option>
                                            @endforeach

                                        </select>
                                    </td>
                                    <td class="bg-red-200">
                                        <input type="number" name="row[` + rowNumber + `][classes_per_week]" class="form-control"
                                            min="1" required>
                                    </td>
                                    @foreach ($school_classes as $school_class)
                                        <td>
                                            <select id="row " name="row[` + rowNumber + `][class{{ $school_class->id }}][teacher]" class="form-control" required>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">{{ $teacher->name }} </option>
                                                @endforeach

                                            </select>
                                        </td>
                                    @endforeach



                                </tr>                    `;

                // Append the new row to the table
                document.querySelector('#schedule-table tbody').appendChild(newRow);
                rowNumber++; // Increment the row number for the next row

            });
            document.getElementById('delete-last-row-btn').addEventListener('click', function() {
                const tableBody = document.querySelector('#schedule-table tbody');
                const rows = tableBody.querySelectorAll('tr');
                if (rows.length > 0) {
                    tableBody.removeChild(rows[rows.length - 1]);
                    rowNumber--;
                    console.log(rowNumber) // keep rowNumber accurate
                }
            });
        </script>
    </body>
</x-app-layout>
