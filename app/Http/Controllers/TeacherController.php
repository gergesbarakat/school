<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\School;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{


    public function index()
    {
        // Check the guard being used
        if (Auth::guard('school')->check()) {
            $teachers = Teacher::where('school_id', Auth::guard('school')->user()->id)->get();
        } else {
            // For 'web' guard, show all teachers
            $teachers = Teacher::all();
        }

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::all();

        // Show a select input for the school when logged in with the 'web' guard
        if (Auth::guard('school')->check()) {
            $schools = School::where('id', Auth::guard('school')->user()->id)->get();
        } else {
            $schools = School::all();  // Allow selecting school when using the 'web' guard
        }

        return view('teachers.add', compact('subjects', 'schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:20',
            'subject_id' => 'required|exists:subjects,id',
            'no7' => 'required',
            'school_id' => Auth::guard('school')->check() ? '' : 'required|exists:schools,id',
        ]);

        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject_id' => $request->subject_id,
            'specialization' => $request->no7 ,
            'school_id' => Auth::guard('school')->check() ? Auth::guard('school')->id() : $request->school_id,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        $subjects = Subject::all();

        // Show the school select input for 'web' guard
        if (Auth::guard('school')->check()) {
            $schools = School::where('id', Auth::guard('school')->user()->id)->get();
        } else {
            $schools = School::all(); // All schools available for 'web' guard
        }

        return view('teachers.edit', compact('teacher', 'subjects', 'schools'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required|string|max:20',
            'subject_id' => 'required|exists:subjects,id',
            'no7' => 'required',
            'school_id' => Auth::guard('school')->check() ? '' : 'required|exists:schools,id',
        ]);
         $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject_id' => $request->subject_id,
            'specialization' => $request->no7      ,
            'school_id' => Auth::guard('school')->check() ? Auth::guard('school')->id() : $request->school_id,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }


    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}