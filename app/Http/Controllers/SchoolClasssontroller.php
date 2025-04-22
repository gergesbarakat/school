<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolClasssontroller extends Controller
{
    public function index()
    {
        // Fetch classes related to the authenticated school
        $classes = SchoolClass::where('school_id', Auth::guard('school')->user()->id)->get();

        return view('school_classes.index', compact('classes'));
    }

    public function create()
    {
        $grades = Grade::all();
        $classrooms = Classroom::all(); // Fetch classrooms related to the authenticated school
        return view('school_classes.add', compact('grades', 'classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
         ]);

        SchoolClass::create([
            'name' => $request->class_name,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'school_id' => Auth::guard('school')->user()->id,
        ]);

        return redirect()->route('school-classes.index')->with('success', 'Class created successfully!');
    }

    public function edit(SchoolClass $schoolClass)
    {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        return view('school_classes.edit', compact('schoolClass', 'grades', 'classrooms'));
    }

    public function update(Request $request, SchoolClass $schoolClass)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $schoolClass->update([
            'name' => $request->name,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
        ]);

        return redirect()->route('school-classes.index')->with('success', 'Class updated successfully!');
    }

    public function destroy(SchoolClass $schoolClass)
    {
        $schoolClass->delete();
        return redirect()->route('school-classes.index')->with('success', 'Class deleted successfully!');
    }
}