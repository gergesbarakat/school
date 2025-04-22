<?php

namespace App\Http\Controllers\School_Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SchoolLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('school-auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('school')->attempt($credentials )) {
            return redirect()->intended('/school/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout()
    {
        Auth::guard('school')->logout();
        return redirect('/school/login');
    }
}
