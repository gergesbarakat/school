<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;   
use App\Http\Requests\StoresubjectRequest;
use App\Http\Requests\UpdatesubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the subjects.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new subject.
     */
    public function create()
    {
        return view('subjects.add');
    }

    /**
     * Store a newly created subject in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        Subject::create($request->only('name', 'category'));

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully!');
    }

    /**
     * Show the form for editing the specified subject.
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified subject in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        $subject->update($request->only('name', 'category'));

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
    }

    /**
     * Remove the specified subject from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
    }
}