<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">

                <h2 class="text-2xl font-bold mb-4 text-center">Add Schedule</h2>
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
                <div id="loader" class="hidden text-center mb-4">
                    <div class="text-blue-600 font-bold">Saving Schedule...</div>
                </div>

                <!-- Schedule Form -->
                <form id="scheduleForm">
                    @csrf
                     
                    <!-- Table -->
                    <div class="overflow-auto">
                        <table class="table-auto w-full border border-gray-300 text-center bg-white dark:bg-gray-800 dark:text-white">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="border p-2">Day / Time</th>
                                    @foreach ($timeSlots as $time)
                                        <th class="border p-2">{{ $time }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($days as $day)
                                    <tr>
                                        <td class="border p-2 font-bold">{{ $day }}</td>
                                        @foreach ($timeSlots as $time)
                                            <td class="border p-2">
                                                <select name="teacher[{{ $day }}][{{ $time }}]" class="w-full mb-1 border rounded p-1">
                                                    <option value="">Select Teacher</option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                    @endforeach
                                                </select>

                                                <select name="subject[{{ $day }}][{{ $time }}]" class="w-full border rounded p-1">
                                                    <option value="">Select Subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mt-6">
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Save Schedule</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
        document.getElementById('scheduleForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = e.target;
            const loader = document.getElementById('loader');
            loader.classList.remove('hidden');

            const formData = new FormData(form);

            try {
                const response = await fetch("{{ route('schedules.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                    },
                    body: formData,
                });

                if (!response.ok) {
                    const contentType = response.headers.get("content-type");

                    if (contentType && contentType.includes("application/json")) {
                        const errorData = await response.json();
                        console.error('Server responded with error:', errorData);
                        alert("Error: " + (errorData.message || "Validation failed."));
                    } else {
                        const errorText = await response.text();
                        console.error('Non-JSON error:', errorText);
                        alert("Server error: " + errorText.slice(0, 200)); // limit long HTML
                    }
                    return;
                }

                const data = await response.json();
                if (data.success) {
                    alert('✅ Schedule saved successfully!');
                    window.location.href = "{{ route('schedules.index') }}";
                } else {
                    alert('❌ Something went wrong.');
                }

            } catch (error) {
                console.error('Catch error:', error);
                alert('⚠️ An error occurred while saving: ' + error.message);
            } finally {
                loader.classList.add('hidden');
            }
        });
        </script>

</x-app-layout>
