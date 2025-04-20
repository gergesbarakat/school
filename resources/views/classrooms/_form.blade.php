<div class="mb-4">
    <label for="school_id" class="block text-sm font-medium text-gray-700">School</label>
    <select name="school_id" id="school_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @foreach($schools as $school)
            <option value="{{ $school->id }}"
                {{ (isset($classroom) && $classroom->school_id == $school->id) ? 'selected' : '' }}>
                {{ $school->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="grade_id" class="block text-sm font-medium text-gray-700">Grade</label>
    <select name="grade_id" id="grade_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @foreach($grades as $grade)
            <option value="{{ $grade->id }}"
                {{ (isset($classroom) && $classroom->grade_id == $grade->id) ? 'selected' : '' }}>
                {{ $grade->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="class_name" class="block text-sm font-medium text-gray-700">Class Name</label>
    <input type="text" name="class_name" id="class_name" required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        value="{{ old('class_name', $classroom->class_name ?? '') }}">
</div>

<div class="mt-4">
    <button type="submit"
        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
</div>
