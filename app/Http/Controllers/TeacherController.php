<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\School;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        // Get all schools and subjects to populate the dropdowns
        $schools = School::all();
        $subjects = Subject::all();

        return view('teachers.add', compact('schools', 'subjects'));
    }

    // Store the teacher in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id', // Ensure school exists
            'subject_id' => 'required|exists:subjects,id', // Ensure subject exists
            'email' => 'required|email',
            'phone' => 'nullable|string',
        ]);

        // Create a new teacher
        Teacher::create([
            'name' => $request->name,
            'school_id' => $request->school_id,
            'subject_id' => $request->subject_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('teachers.index');
    }

    public function edit(Teacher $teacher)
    {
        $subjects = Subject::all();
        return view('teachers.edit', compact('teacher', 'subjects'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string',
            'subject_id' => 'required|exists:subjects,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        } else {
            $validated['photo'] = $teacher->photo; // keep old photo if no new one
        }

        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}
