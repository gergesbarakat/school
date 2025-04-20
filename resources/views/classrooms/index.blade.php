<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <div class="mb-4">
                    <a href="{{ route('classrooms.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Add Classroom</a>
                </div>

                @if(session('success'))
                    <div class="text-green-500 mb-4">{{ session('success') }}</div>
                @endif

                <table class="table-auto w-full border border-gray-300 text-center">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">Class Name</th>
                            <th class="border p-2">Grade</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classrooms as $classroom)
                            <tr>
                                <td class="border p-2">{{ $classroom->name }}</td>
                                <td class="border p-2">{{ $classroom->grade->name ?? 'N/A' }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('classrooms.edit', $classroom) }}" class="text-yellow-500 hover:text-yellow-600 mr-2">Edit</a>
                                    <form action="{{ route('classrooms.destroy', $classroom) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</x-app-layout>
