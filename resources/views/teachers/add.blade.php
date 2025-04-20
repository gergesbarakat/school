<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <!-- CONTENT -->
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h2 class="text-2xl font-bold text-center">Create New Teacher</h2>

                <form method="POST" action="{{ route('teachers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Name Field -->
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Teacher Name</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded" />
                    </div>

                    <!-- School Dropdown -->
                    <div class="mt-4">
                        <label for="school_id" class="block text-sm font-medium text-gray-700">Select School</label>
                        <select name="school_id" id="school_id" class="mt-1 block w-full p-2 border border-gray-300 rounded">
                            <option value="">Select a School</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subject Dropdown -->
                    <div class="mt-4">
                        <label for="subject_id" class="block text-sm font-medium text-gray-700">Select Subject</label>
                        <select name="subject_id" id="subject_id" class="mt-1 block w-full p-2 border border-gray-300 rounded">
                            <option value="">Select a Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Email Field -->
                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded" required />
                    </div>

                    <!-- Phone Field -->
                    <div class="mt-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded" />
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Create Teacher</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>
