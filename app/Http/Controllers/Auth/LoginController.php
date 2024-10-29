<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthenticateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function create(Request $request)
    {
        if ($request->is('admin/login')) {
            return View('admin/auth/login');
        }
        return redirect()->route('index')->with(['type' => 'auth']);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validateWithBag('login', [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->only('email', 'password');
        $isRemember = $request->boolean('remember');

        if (Auth::attempt($credentials, $isRemember)) {
            // If user try to move to any admin page
            if ($request->is('admin/*')) {
                if ($request->user()->isAdmin()) {
                    $request->session()->regenerate();
                    return redirect()->intended('/admin/dashboard/');
                } else {
                    return back()->with(['message' => 'You are not admin']);
                }
            } else {
                $request->session()->regenerate();
                return redirect()->intended('/')->with(['message' => 'Đăng nhập thành công']);
            }
        }

        return back()->withErrors(
            new MessageBag(['email' => 'The provided credentials do not match our records.', 'password' => 'The provided password is incorrect.']),
            'login'
        )->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        $isAdmin = $request->user()->isAdmin();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $isAdmin ? redirect('/admin/login') : redirect()->route('index');
    }
}