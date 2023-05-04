<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['username' => request('username'), 'password' => request('password')], 1)) {
            $user = User::where(["username" => request('username')])->first();
            return redirect()->intended(route('profile', ['username' => $request->username]));
        }

        return redirect()->back()->with([
            'status' => 0,
            'title' => "Login failed",
            'message' => 'Incorrect username or password.'
        ]);
    }

    public function signup(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($request->password);
        $validated['first_name'] = Str::title($request->first_name);
        $validated['last_name'] = Str::title($request->last_name);
        $validated['username'] = Str::lower($request->username);

        User::create($validated)->sendEmailVerificationNotification();

        session()->flash('status', 1);
        session()->flash('title', 'Registration Successful!');
        session()->flash('message', 'Please check your email for verification.');

        return response()->json([
            'title' => 'Registration Successful',
            'message' => 'Please check your email for verification.'
        ]);
    }

    public function logout()
    {
    }
}
