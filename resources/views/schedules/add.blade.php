<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h2 class="text-center text-2xl mb-4">Create Schedule</h2>

                <!-- Grade and Classroom Selection -->
                <form method="POST" action="{{ route('schedules.store') }}">
                    @csrf

                    <!-- Grade and Classroom Filters -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="grade" class="block">Grade</label>
                            <select id="grade" name="grade" class="form-control" required>
                                <option value="">Select Grade</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}" {{ request('grade') == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="classroom" class="block">Classroom</label>
                            <select id="classroom" name="classroom" class="form-control" required>
                                <option value="">Select Classroom</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}" {{ request('classroom') == $classroom->id ? 'selected' : '' }}>{{ $classroom->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Table for Adding Schedule -->
                    <div class="mt-8">
                        <table class="table-auto w-full border-collapse" id="schedule-table">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">classes</th>
                                    @foreach ($schoolClasses as $schoolClass)
                                        <th class="border px-4 py-2">{{ $schoolClass }}</th>
                                    @endforeach

                                </tr>
                                <tr>
                                    <th class="border px-4 py-2">Row Number</th>
                                    <th class="border px-4 py-2">Subject</th>
                                    <th class="border px-4 py-2">Classes per Week</th>
                                    <th class="border px-4 py-2">Teacher</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Row Template -->
                                <tr>
                                    <td class="border px-4 py-2" class="row-number">1</td>
                                    <td class="border px-4 py-2">
                                        <select name="subjects[]" class="form-control">
                                            <option value="">Select Subject</option>
                                            @foreach ($schoolClasses as $schoolClass)
                                                <option value="{{ $schoolClass->subject_id }}">{{ $schoolClass->subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="number" name="classes_per_week[]" class="form-control" min="1" required>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <select name="teachers[]" class="form-control">
                                            <option value="">Select Teacher</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" id="add-row-btn">Add Row</button>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-md">Save Schedule</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            // Add new row functionality
            let rowNumber = 2;

            document.getElementById('add-row-btn').addEventListener('click', function () {
                // Create a new row
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="border px-4 py-2">${rowNumber}</td>
                    <td class="border px-4 py-2">
                        <select name="subjects[]" class="form-control">
                            <option value="">Select Subject</option>
                            @foreach ($schoolClasses as $schoolClass)
                                <option value="{{ $schoolClass->subject_id }}">{{ $schoolClass->subject->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="border px-4 py-2">
                        <input type="number" name="classes_per_week[]" class="form-control" min="1" required>
                    </td>
                    <td class="border px-4 py-2">
                        <select name="teachers[]" class="form-control">
                            <option value="">Select Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </td>
                `;

                // Append the new row to the table
                document.querySelector('#schedule-table tbody').appendChild(newRow);
                rowNumber++; // Increment the row number for the next row
            });
        </script>
    </body>
</x-app-layout>
