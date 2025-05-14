<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // Role-based redirection
        if ($user->role === 'env_police') {
            return redirect()->intended('/admin/env-police');
        }

        if ($user->role === 'municipal') {
            return redirect()->intended('/admin/municipal');
        }

        if ($user->role === 'division_office') {
            return redirect()->intended('/admin/division-office');
        }

        if ($user->role === 'super_admin') {
            return redirect()->intended('/admin/manage');
        }

        return redirect()->intended('/lodge-complaint');
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}
