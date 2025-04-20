<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <!-- CONTENT -->
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Edit Schedule</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- School -->
                    <div>
                        <label class="block text-gray-700 dark:text-white font-semibold mb-2">School</label>
                        <input type="text" value="{{ $school->name }}" class="w-full px-4 py-2 border rounded bg-gray-100 text-gray-700" disabled>
                        <input type="hidden" name="school_id" value="{{ $school->id }}">
                    </div>

                    <!-- Grade -->
                    <div>
                        <label class="block text-gray-700 dark:text-white font-semibold mb-2">Grade</label>
                        <input type="text" value="{{ $grade->name }}" class="w-full px-4 py-2 border rounded bg-gray-100 text-gray-700" disabled>
                        <input type="hidden" name="grade_id" value="{{ $grade->id }}">
                    </div>

                    <!-- Class -->
                    <div>
                        <label class="block text-gray-700 dark:text-white font-semibold mb-2">Class</label>
                        <input type="text" value="{{ $classroom->name }}" class="w-full px-4 py-2 border rounded bg-gray-100 text-gray-700" disabled>
                        <input type="hidden" name="class_id" value="{{ $classroom->id }}">
                    </div>
                </div>

                <!-- Loader -->
                <div id="loader" class="hidden text-center mb-4 text-blue-500">Saving schedule...</div>

                <!-- Schedule Table -->
                <form id="scheduleForm">

                    {!! $table !!}
                    <input type="hidden" id="schedule_id" id="schedule_id" value="{{ $schedule_id }}">

                    <input type="hidden" id="school_id" name="school_id" value="{{ $school_id }}">
                    <input type="hidden" id="grade_id" name="grade_id" value="{{ $grade_id }}">
                    <input type="hidden" id="class_id" name="class_id" value="{{ $class_id }}">
                    @if ($errors->any())
                        <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                            role="alert">
                            <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

                        </div>
                    @endif
                    <div class="mt-4 text-right">
                        <div id="saveButton" type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Save
                            Schedule</div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.getElementById("saveButton").addEventListener("click", function() {
                const scheduleId = document.getElementById("schedule_id").value;

                const data = {
                    school_id: document.getElementById("school_id").value,
                    grade_id: document.getElementById("grade_id").value,
                    class_id: document.getElementById("class_id").value,
                    subject: {},
                    teacher: {}
                };
                console.log(data)
                document.querySelectorAll("select[name^='subject']").forEach(select => {
                    const [day, time] = select.name.match(/\[(.*?)\]/g).map(s => s.replace(/\[|\]/g, ''));
                    if (!data.subject[day]) data.subject[day] = {};
                    data.subject[day][time] = select.value;
                });

                document.querySelectorAll("select[name^='teacher']").forEach(select => {
                    const [day, time] = select.name.match(/\[(.*?)\]/g).map(s => s.replace(/\[|\]/g, ''));
                    if (!data.teacher[day]) data.teacher[day] = {};
                    data.teacher[day][time] = select.value;
                });

                fetch(`/schedules/${scheduleId}`, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify(data)
                    })
                    .then(res => res.json())
                    .then(response => {
                        alert("Schedule updated successfully.");
                        window.location.href = "/schedules";
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("Error occurred while saving schedule.");
                    });
            });
        </script>
    </body>
</x-app-layout>
