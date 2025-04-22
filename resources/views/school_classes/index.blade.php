<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <!-- Success message -->
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <h1 class="text-2xl font-semibold mb-4">School Classes</h1>
                <div class="flex justify-end mb-4">
                    <a href="{{ route('school-classes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Class</a>
                </div>

                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-left">Class Name</th>
                            <th class="border px-4 py-2 text-left">Grade</th>
                            <th class="border px-4 py-2 text-left">Classroom</th>
                            <th class="border px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classes as $class)
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ $class->name }}</td>
                                <td class="border px-4 py-2">{{ $class->grade->name }}</td>
                                <td class="border px-4 py-2">{{ $class->classroom->name }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('school-classes.edit', $class) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('school-classes.destroy', $class) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
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
