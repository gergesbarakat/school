<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h1 class="text-2xl font-semibold mb-4">Teachers</h1>

                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">الاسم</th>
                            <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">البريد الالكتروني</th>
                            <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">الهاتف</th>
                            <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">المادة</th>
                            @if (!Auth::guard('school')->check())
                                <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">المدرسة</th>
                            @endif
                            <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">يعطي لهم سوابع</th>

                            <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                            <tr class="odd:bg-gray-100">
                                <td class="px-4 py-2 border-b text-sm">{{ $teacher->name }}</td>
                                <td class="px-4 py-2 border-b text-sm">{{ $teacher->email }}</td>
                                <td class="px-4 py-2 border-b text-sm">{{ $teacher->phone }}</td>
                                <td class="px-4 py-2 border-b text-sm">{{ $teacher->subject->name }}</td>
                                @if (!Auth::guard('school')->check())
                                    <td class="px-4 py-2 border-b text-sm">{{ $teacher->school->name }}</td>
                                @endif
 <td class="px-4 py-2 border-b">{{ $teacher->specialization }}</td>

                                <td class="px-4 py-2 border-b text-sm">
                                    <a href="{{ route('teachers.edit', $teacher) }}" class="text-blue-500 hover:text-blue-700">تعديل</a> |
                                    <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('teachers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Add Teacher
                    </a>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
