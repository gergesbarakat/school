<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;



class SchoolController extends Controller
{


    /**
     * Display a listing of the schools.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all(); // Retrieve all schools
        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new school.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.add');
    }

    /**
     * Store a newly created school in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manager_name' => 'required|string|max:255',
            'email' => 'required|email|unique:schools,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:20',
            // Add more validation rules as needed
            // 'address' => 'nullable|string|max:255',
            // 'postal_code' => 'nullable|string|max:20',
            // 'country' => 'nullable|string|max:255', // Make country nullable
            // 'data' => 'nullable', // Allow data to be null
               'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'grades_classes' => 'nullable|json', // Assuming this is a JSON field
            // 'state' => 'nullable|string|max:255',
            // 'city' => 'nullable|string|max:255',

               'area' => 'required|string|max:255',
            // Optional validation can be added as needed
        ]);

        School::create([
            'name' => $request->name,
            'manager_name' => $request->manager_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

            // Use default values if these fields are not sent
            'address' => $request->input('address', 'Not Provided'),
            'postal_code' => $request->input('postal_code', '00000'),
            'country' => $request->input('country', 'Unknown'),
            'state' => $request->input('state', 'Unknown'),
            'city' => $request->input('city', 'yururt'),
            'area' => 'sdjgfajdf',
            'logo' => $request->input('logo', 'default-logo.png'),
            'phone' => $request->phone,
            'grades_classes' => $request->input('grades_classes', '{}'),
            'data' => $request->input('data', '{}'),
        ]);

        return redirect()->route('schools.index')->with('success', 'School created successfully.');
    }


    /**
     * Display the specified school.
     *
     * @param \App\Models\School $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified school.
     *
     * @param \App\Models\School $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    /**
     * Update the specified school in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\School $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'manager_name' => 'required|string|max:255',
            'email' => 'required|email|unique:schools,email,' . $school->id,
            'password' => 'nullable|string|min:8|confirmed',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255', // Make country nullable
            'data' => 'nullable', // Allow data to be null
        ]);

        // Set default value for country if not provided
        $country = $request->input('country', 'Unknown'); // Default to 'Unknown' if no country is provided

        // Update the school
        $school->update([
            'name' => $request->name,
            'manager_name' => $request->manager_name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $school->password, // Only update password if provided
            'address' => $request->address,
            'phone' => $request->phone,
            'postal_code' => $request->postal_code ?? null,
            'country' => $country, // Use default value if not provided
            'data' => $request->data,
        ]);

        return redirect()->route('schools.index')->with('success', 'School updated successfully');
    }

    /**
     * Remove the specified school from the database.
     *
     * @param \App\Models\School $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('schools.index')->with('success', 'School deleted successfully');
    }
}
