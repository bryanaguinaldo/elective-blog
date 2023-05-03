<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function register()
    {
        return view("register");
    }

    public function profile($username)
    {
        $user = User::where("username", $username)->first();
        if (!$user == null) {
            return view("profile")->with(["user" => $user]);
        }
        return abort(404);
    }
}
