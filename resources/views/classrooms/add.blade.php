<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto max-w-lg">
                <h2 class="text-2xl font-semibold mb-4">Add Classroom</h2>

                @if($errors->any())
                    <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('classrooms.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Class Name</label>
                        <input type="text" name="name" class="w-full border px-4 py-2 rounded" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Grade</label>
                        <select name="grade_id" class="w-full border px-4 py-2 rounded" required>
                            <option value="">Select Grade</option>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Add</button>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>
