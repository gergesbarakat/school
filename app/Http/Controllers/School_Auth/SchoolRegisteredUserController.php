<?php

namespace App\Http\Controllers\School_Auth;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class SchoolRegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('school-auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $fields = [
            'address',
            'manager_name',
            'phone',
            'area',
            'state',
            'postal_code',
            'country',
            'logo',
        ];

        // Loop through and set null fields to empty strings
        foreach ($fields as $field) {
            if ($request->missing($field) || is_null($request->$field)) {
                $request->merge([$field => '']);
            }
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . School::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => 'nullable|string',
            'manager_name' => 'nullable|string',
            'phone' => 'nullable|string',
            'area' => 'nullable|string',
            'state' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'country' => 'nullable|string',
            'grades_classes' => 'nullable|array',
            'address' => 'nullable|array',

            'data' => 'nullable|array',
            'logo' => 'nullable|string',

        ]);

        $user = School::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'manager_name' => $request->manager_name,
            'phone' => $request->phone,
            'area' => $request->area,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'logo' => $request->logo,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('school')->login($user);

        return redirect(route('school.school-dashboard', absolute: false));
    }
}