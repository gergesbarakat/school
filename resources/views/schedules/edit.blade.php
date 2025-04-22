<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h2 class="text-xl font-semibold mb-4">تعديل جدول الحصص</h2>

                <form action="{{ route('schedules.update') }}" method="POST">
                    @csrf

                    @if(!$selectedSchoolId)
                        <div class="mb-4">
                            <label for="school_id" class="block mb-1 font-medium text-gray-700 dark:text-white">المدرسة</label>
                            <select name="school_id" class="form-select w-full">
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}" @if($selectedSchoolId == $school->id) selected @endif>
                                        {{ $school->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <table class="table-auto w-full mb-4 border border-gray-300 dark:border-gray-700 text-center">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-800">
                                <th class="border px-4 py-2">#</th>
                                <th class="border px-4 py-2">المادة</th>
                                <th class="border px-4 py-2">رقم</th>
                                @foreach($classes as $class)
                                    <th class="border px-4 py-2">{{ $class->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="schedule-rows">
                            @foreach($existingSchedules as $i => $schedule)
                                <tr>
                                    <td class="border px-4 py-2">{{ $i + 1 }}</td>
                                    <td class="border px-4 py-2">
                                        <select name="rows[{{ $i }}][subject_id]" class="form-select w-full">
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}" @if($subject->id == $schedule->subject_id) selected @endif>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="number" name="rows[{{ $i }}][number]" class="form-input w-full" value="{{ $schedule->number }}" required>
                                    </td>
                                    @foreach($classes as $class)
                                        <td class="border px-4 py-2"></td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="button" onclick="addRow({{ count($existingSchedules) }})" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">+ صف جديد</button>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">تحديث الجدول</button>
                </form>
            </div>
        </div>

        <script>
            let rowCount = {{ count($existingSchedules) }};
            function addRow(index = rowCount) {
                const subjects = @json($subjects);
                const classesCount = {{ $classes->count() }};
                const tbody = document.getElementById('schedule-rows');
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td class="border px-4 py-2">${index + 1}</td>
                    <td class="border px-4 py-2">
                        <select name="rows[${index}][subject_id]" class="form-select w-full">
                            ${subjects.map(s => `<option value="${s.id}">${s.name}</option>`).join('')}
                        </select>
                    </td>
                    <td class="border px-4 py-2">
                        <input type="number" name="rows[${index}][number]" class="form-input w-full" required>
                    </td>
                    ${'<td class="border px-4 py-2"></td>'.repeat(classesCount)}
                `;
                tbody.appendChild(row);
                rowCount++;
            }
        </script>
    </body>
</x-app-layout>
