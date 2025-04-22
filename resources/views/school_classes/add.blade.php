<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h1 class="text-2xl font-semibold mb-4">Add New Class</h1>

                <!-- Error Message -->
                @if($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('school-classes.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="class_name" class="block text-sm font-medium text-gray-700">Class Name</label>
                        <input type="text" name="class_name" id="class_name" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <div>
                        <label for="grade_id" class="block text-sm font-medium text-gray-700">Grade</label>
                        <select name="grade_id" id="grade_id" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="classroom_id" class="block text-sm font-medium text-gray-700">Classroom</label>
                        <select name="classroom_id" id="classroom_id" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                            @foreach($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save Class</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>
