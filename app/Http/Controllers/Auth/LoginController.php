<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthenticateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function create()
    {
        return View('Auth/Login');
    }

    public function store(LoginAuthenticateRequest $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $isRemember = $request->boolean('remember'); 
 
        if (Auth::attempt($credentials, $isRemember)) {
            $request->session()->regenerate();

            if($request->user()->isAdmin()){
                return redirect('/admin/dashboard');
            }
 
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        $isAdmin = $request->user()->isAdmin();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $isAdmin ? redirect('/admin/login') : redirect('/login');
    }
}