<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all(); // Get all grades
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.add');
    }
    public function show(Grade $grade)
    {
        return  ( compact('grade'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Grade::create([
            'name' => $request->name,
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade created successfully!');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $grade->update([
            'name' => $request->name,
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully!');
    }
}
