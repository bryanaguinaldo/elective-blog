<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserInformationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MiscFunctionsController extends Controller
{
    public function changePassword(ChangePasswordRequest $request)
    {
        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with([
            'status' => 1,
            'message' => 'Password updated successfully.'
        ]);
    }

    public function changeInformation(UserInformationRequest $request)
    {
        User::where('id', Auth::user()->id)->update($request->validated());

        return redirect()->back()->with([
            'status' => 1,
            'message' => 'Information updated successfully.'
        ]);
    }

    public function changeBio(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'description' => 'required|max:255'
        ]);

        User::where('id', Auth::user()->id)->update($validation->validated());
        return redirect()->back()->with([
            'status' => 1,
            'message' => 'Bio updated successfully.'
        ]);
    }

    public function loadOtherUsers()
    {
        $users = User::where('id', '!=', Auth::user()->id)->inRandomOrder()->limit(5)->get();
    }

    public function search(Request $request)
    {
        if (request()->ajax()) {
            if ($request->value == null) {
                return "";
            }
            $results = User::where('username', 'LIKE', '%' . $request->value . '%')->whereNot('username', Auth::user()->username)->limit(5)->get();
            $view = view('search-results')->with(["results" => $results])->render();
            return response()->json($view);
        }
        return abort(404);
    }
}
