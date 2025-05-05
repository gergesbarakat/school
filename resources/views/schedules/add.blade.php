<x-app-layout>


    <x-side-bar></x-side-bar>

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


 </x-app-layout>
