<x-app-layout>
    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>
        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="mx-auto">
                <h1 class="text-2xl font-semibold mb-4">Add Teacher</h1>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form to Create Teacher -->
                <form action="{{ route('teachers.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                               class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="subject_id" class="block text-sm font-medium text-gray-700">Subject</label>
                        <select id="subject_id" name="subject_id" required
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Show School select only for 'web' guard -->
                    @if (Auth::guard('school')->check())
                        <input type="hidden" name="school_id" value="{{ Auth::guard('school')->user()->id }}">
                    @else
                        <div class="mb-4">
                            <label for="school_id" class="block text-sm font-medium text-gray-700">School</label>
                            <select id="school_id" name="school_id" required
                                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                        {{ $school->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-white">هل يوجد تخصص؟ (no7)</label>
                        <div class="mt-1 flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="no7" value="نعم" {{ (isset($teacher) && $teacher->specialization === 'نعم') ? 'checked' : '' }} class="form-radio text-indigo-600">
                                <span class="ml-2 text-gray-700 dark:text-white">نعم</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="no7" value="نعم" {{ (isset($teacher) && $teacher->specialization === 'لا') ? 'checked' : '' }} class="form-radio text-indigo-600">
                                <span class="ml-2 text-gray-700 dark:text-white">لا</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Add Teacher
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>
