<x-app-layout>

    <body class = "body bg-white dark:bg-[#0F172A]">
        <x-side-bar>

        </x-side-bar>
        <!-- CONTENT -->
        <div class = "content ml-12 transform ease-in-out duration-500   px-2 md:px-5 pb-4 ">

            <div class=" mx-auto">

                @if ($errors->any())
                    <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

                    </div>
                @endif

                <div class="relative flex flex-col p-3 w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
                    <h1 class="text-2xl w-1/2 font-bold mb-4">جميع المدرسين</h1>

                    <a href="{{ route('teachers.create') }}"
                        class="bg-blue-500 w-fit text-white px-4 py-2 rounded mb-4 inline-block">+ Add Teacher</a>

                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
                    @endif

                    <table class="w-full table-auto border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2">#</th>
                                <th class="p-2">الاسم</th>
                                <th class="p-2">الايميل</th>
                                <th class="p-2">الهاتف</th>
                                <th class="p-2">لمادة</th>
                                <th class="p-2">صورة</th>
                                <th class="p-2">تعديل و حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr class="text-center border-t">
                                    <td class="p-2">{{ $loop->iteration }}</td>
                                    <td class="p-2">{{ $teacher->name }}</td>
                                    <td class="p-2">{{ $teacher->email }}</td>
                                    <td class="p-2">{{ $teacher->phone }}</td>
                                    <td class="p-2">{{ $teacher->subject->name ?? '-' }}</td>
                                    <td class="p-2">
                                        @if ($teacher->photo)
                                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="photo"
                                                class="w-10 h-10 rounded-full object-cover">
                                        @else
                                            <span>No Photo</span>
                                        @endif
                                    </td>
                                    <td class="p-2">
                                        <a href="{{ route('teachers.edit', $teacher->id) }}"
                                            class="text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                            class="inline-block" onsubmit="return confirm('Delete this teacher?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:underline ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
</x-app-layout>
