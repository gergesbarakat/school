<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <form method="POST" action="{{ route('schools.update', $school) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-bold">School Name</label>
                        <input type="text" name="name" class="w-full border p-2" value="{{ $school->name }}" required>
                    </div>

                    @php
                        $existingData = json_decode($school->data, true) ?? [];
                    @endphp

                    @foreach ($grades as $grade)
                        <div class="mb-4">
                            <label class="font-semibold">{{ $grade->name }}</label>
                            <div class="grid grid-cols-3 gap-2 mt-2">
                                @foreach ($grade->classrooms as $classroom)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="data[{{ $grade->id }}][]" value="{{ $classroom->id }}"
                                            {{ in_array($classroom->id, $existingData[$grade->id] ?? []) ? 'checked' : '' }}>
                                        <span>{{ $classroom->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>
