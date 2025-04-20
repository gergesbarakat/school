<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h2 class="text-lg font-semibold mb-4">Grades</h2>

                <a href="{{ route('grades.create') }}" class="bg-blue-500 text-white p-2 rounded mb-4">Add Grade</a>

                @if (session('success'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Grade Name</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr>
                                <td class="px-4 py-2">{{ $grade->name }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('grades.edit', $grade->id) }}" class="text-yellow-500">Edit</a>
                                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
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
