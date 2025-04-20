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
                    <h1 class="text-2xl font-bold mb-4">Edit Teacher</h1>

                    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                role="alert">
                                <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

                            </div>
                        @endif
                        <div>
                            <label>Name</label>
                            <input type="text" name="name" class="w-full border p-2"
                                value="{{ old('name', $teacher->name) }}">
                        </div>

                        <div>
                            <label>Email</label>
                            <input type="email" name="email" class="w-full border p-2"
                                value="{{ old('email', $teacher->email) }}">
                        </div>

                        <div>
                            <label>Phone</label>
                            <input type="text" name="phone" class="w-full border p-2"
                                value="{{ old('phone', $teacher->phone) }}">
                        </div>

                        <div>
                            <label>Subject</label>
                            <select name="subject_id" class="w-full border p-2">
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" @selected($teacher->subject_id == $subject->id)>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Photo</label>
                            @if ($teacher->photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="photo"
                                        class="w-20 h-20 rounded-full object-cover">
                                </div>
                            @endif
                            <input type="file" name="photo" class="w-full">
                        </div>

                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                    </form>
                </div>
</x-app-layout>
