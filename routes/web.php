<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePictureController;
use App\Http\Controllers\MiscFunctionsController;
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

Route::post('/email/verification-notification', [AuthController::class, 'sendVerificationEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmailAddress'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', [ViewController::class, 'verifyEmailAddress'])->middleware('auth')->name('verification.notice');

Route::middleware("guest")->group(function () {
    Route::get("/login", [ViewController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.auth");

    ### Sign Up
    Route::get("/signup", [ViewController::class, "register"])->name("signup");
    Route::post("/signup", [AuthController::class, "signup"])->name("register");
});

Route::middleware("auth", "verified")->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get("/", [ViewController::class, "home"])->name('home');
    Route::get("/u/{username}", [ViewController::class, "profile"])->name("profile");

    Route::get('/about', [ViewController::class, "about"])->name("about");

    Route::get("/settings", [ViewController::class, "settings"])->name("settings");
    Route::post("/settings/update/password", [MiscFunctionsController::class, "changePassword"])->name("settings.update_password");
    Route::post("/settings/update/information", [MiscFunctionsController::class, "changeInformation"])->name("settings.update_information");
    Route::post("/settings/update/bio", [MiscFunctionsController::class, "changeBio"])->name("settings.update_bio");

    Route::post("/post", [ProfileController::class, "store"])->name("post.store");
    Route::get("/post/{id}", [ProfileController::class, "show"])->name("post.show");
    Route::post("/edit/post", [ProfileController::class, "edit"])->name("post.edit");
    Route::post("/update/post/{id}", [ProfileController::class, "update"])->name("post.update");
    Route::post("/delete/post", [ProfileController::class, "destroy"])->name("post.destroy");


    // BEGIN: Change Thumbnail Resource Requests
    Route::group(['prefix' => 'thumbnail'], function () {
        Route::post('store', [ChangeThumbnailController::class, 'store'])->name('thumbnail.store'); // CREATE
        Route::post('show', [ChangeThumbnailController::class, 'show'])->name('thumbnail.show'); // READ
        Route::post('update', [ChangeThumbnailController::class, 'update'])->name('thumbnail.update'); // UPDATE
        Route::post('destroy', [ChangeThumbnailController::class, 'destroy'])->name('thumbnail.destroy'); // DELETE
    });

    // BEGIN: Change Picture Resource Requests
    Route::group(['prefix' => 'image'], function () {
        Route::post('store', [ChangePictureController::class, 'store'])->name('image.store'); // CREATE
        Route::post('show', [ChangePictureController::class, 'show'])->name('image.show'); // READ
        Route::post('update', [ChangePictureController::class, 'update'])->name('image.update'); // UPDATE
        Route::post('destroy', [ChangePictureController::class, 'destroy'])->name('image.destroy'); // DELETE
    });
});
