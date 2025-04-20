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
                <div
                    class="relative flex flex-col p-3 w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">

                    <div class="p-0 overflow-scroll">
                        <h2 class="text-2xl font-bold mb-4">قائمة المواد</h2>

                        <a href="{{ route('subjects.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">إضافة
                            مادة جديدة</a>

                            <table class="table-auto w-full mt-4 border-collapse border">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border px-4 py-2">الاسم</th>
                                        <th class="border px-4 py-2">الفئة</th>
                                        <th class="border px-4 py-2">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $subject)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $subject->name }}</td>
                                            <td class="border px-4 py-2">{{ $subject->category }}</td>
                                            <td class="border px-4 py-2">
                                                <a href="{{ route('subjects.edit', $subject->id) }}" class="text-blue-500">تعديل</a>

                                                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 ml-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>





            </div>
        </div>


</x-app-layout>
