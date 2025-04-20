<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h2 class="text-lg font-semibold mb-4">Create Grade</h2>

                <form action="{{ route('grades.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Grade Name</label>
                        <input type="text" id="name" name="name" class="w-full border-gray-300 rounded" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Create Grade</button>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>
