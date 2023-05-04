<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/u/' . Auth::user()->username);
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware("guest")->group(function () {
    Route::get("/login", [ViewController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.auth");

    ### Sign Up
    Route::get("/signup", [ViewController::class, "register"])->name("signup");
    Route::post("/signup", [AuthController::class, "signup"])->name("register");
});

Route::middleware("auth", "verified")->group(function () {
    Route::get("/home", [ViewController::class, "profile"]);
    Route::get("/u/{username}", [ViewController::class, "profile"])->name("profile");
});
