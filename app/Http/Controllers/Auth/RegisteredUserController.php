<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validateWithBag('signup', [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => 'test',
            'gender' => 'male',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with(['message' => 'Tạo tài khoản thành công', 'type' => 'auth']);
    }
}
