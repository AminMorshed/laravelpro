<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['verify' => true]);


Route::prefix('auth/')->group(function () {
    Route::get('google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
    Route::get('google/callback', [GoogleAuthController::class, 'callback']);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/secret', function () {
    return 'secret';
})->middleware(['auth', 'password.confirm']);

Route::prefix('profile/')->middleware('auth')->group(function () {
    Route::get('', [ProfileController::class, 'index'])->name('profile');
    Route::get('twofactor', [ProfileController::class, 'manageTwoFactor'])->name('profile.2fa.manage');
    Route::post('twofactor', [ProfileController::class, 'postManageTwoFactor']);
    Route::get('twodactor/phone', [ProfileController::class, 'getPhoneVerify'])->name('profile.2fa.phone');
    Route::post('twodactor/phone', [ProfileController::class, 'postPhoneVerify']);
});


