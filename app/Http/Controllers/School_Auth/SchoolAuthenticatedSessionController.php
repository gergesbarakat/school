<?php

namespace App\Http\Controllers\School_Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SchoolLoginRequest ;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SchoolAuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('school-auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(SchoolLoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        Auth::guard('web')->logout();

        $request->session()->regenerate();

        return redirect()->intended(route('school.school-dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
                Auth::guard('web')->logout();

        Auth::guard('school')->logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->route('school.login');
    }
}