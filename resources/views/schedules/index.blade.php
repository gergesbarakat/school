<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <!-- CONTENT -->
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h2 class="text-2xl font-bold mb-4">View Schedule</h2>

                <div class="bg-white p-6 rounded shadow-md">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- School Select -->
                        @if (Auth::guard('web')->check())
                            <div>
                                <label for="school_id" class="block font-semibold mb-1">Select School</label>
                                <select id="school_id" class="w-full border rounded px-3 py-2"
                                    onchange="loadScheduleTable()">
                                    <option value="">-- Select School --</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <input id="school_id" type="hidden" name="school_id"
                                value="{{ Auth::guard('school')->user()->id }}">
                        @endif
                        <!-- Grade Select -->
                        <div>
                            <label for="grade_id" class="block font-semibold mb-1">Select Grade</label>
                            <select id="grade_id" class="w-full border rounded px-3 py-2"
                                onchange="loadScheduleTable()">
                                <option value="">-- Select Grade --</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Class Select -->
                        <div>
                            <label for="classroom_id" class="block font-semibold mb-1">Select Class</label>
                            <select id="classroom_id" class="w-full border rounded px-3 py-2"
                                onchange="loadScheduleTable()">
                                <option value="">-- Select Class --</option>
                                @foreach ($classrooms as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Schedule Table Container -->
                <div id="schedule-table-container" class="mt-8"></div>
            </div>
        </div>
    </body>

    <script>
        function loadScheduleTable() {
            const school_id = document.getElementById('school_id').value;
            const grade_id = document.getElementById('grade_id').value;
            const class_id = document.getElementById('classroom_id').value;

            if (!school_id || !grade_id || !class_id) return;

            fetch(`/schedules/show?s=${school_id}&g=${grade_id}&c=${class_id}`)
                .then(response => response.json())
                .then(data => {

                    document.getElementById('schedule-table-container').innerHTML = data.html;
                    $.fn.dataTable.ext.errMode = function(settings, helpPage, message) {
                        console.warn("DataTables warning: " + message);
                    };

                    $('#schedule-table tbody tr').each(function() {
                        let isEmpty = true;
                        $(this).find('td').each(function() {
                            if ($(this).text().trim() !== "") {
                                isEmpty = false;
                                return false; // Break loop
                            }
                        });

                        if (isEmpty) {
                            $(this).remove();
                        }
                    });

                    new DataTable("table")
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</x-app-layout>
