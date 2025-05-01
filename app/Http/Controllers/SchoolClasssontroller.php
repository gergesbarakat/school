<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolClasssontroller extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('school')->check()) {
            if ($request->row) {
                foreach ($request->row as $id => $row) {
                    if (Teacher::where('school_id', Auth::guard('school')->user()->id)->where('row_id', $id)) {
                        Teacher::where('school_id', Auth::guard('school')->user()->id)->where('row_id', $id)->delete();
                        Teacher::create([
                            'school_id' => Auth::guard('school')->user()->id,
                            'row_id' => $id,
                            'name' => $row['name'],
                            'number_of_classes' => $row['subject'],
                            'no7' => $row['no7'],
                        ]);

                    } else {
                        Teacher::create([
                            'school_id' => Auth::guard('school')->user()->id,
                            'row_id' => $id,
                            'number_of_classes' => $row['subject'],
                            'no7' => $row['no7'],
                            'name' => $row['name'],

                        ]);
                    }

                }
            }

            // Fetch classes related to the authenticated school

        }
        return view('school_classes.index', [
            'schools' => School::all(),
            'grades' => Grade::all(),
            'classrooms' => Classroom::all(),
            'teachers' => Teacher::all(),
            'school_classes' => SchoolClass::all(),
        ]);
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
