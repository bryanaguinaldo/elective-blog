<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

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



Route::middleware("guest")->group(function () {
    Route::get("/login", [ViewController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.auth");

    ### Sign Up
    Route::get("/signup", [ViewController::class, "register"])->name("signup");
    Route::post("/signup", [AuthController::class, "signup"])->name("register");
});

Route::middleware("auth")->group(function () {
    Route::get("/u/{username}", [ViewController::class, "profile"])->name("profile");
});
