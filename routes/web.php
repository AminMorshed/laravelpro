<?php

use App\Http\Controllers\Auth\GoogleAuthController;
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

Route::prefix('auth/')->group(function (){
    Route::get('google',[GoogleAuthController::class , 'redirect'])->name('auth.google');
    Route::get('google/callback',[GoogleAuthController::class , 'callback']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/secret', function (){
   return 'secret';
})->middleware(['auth' , 'password.confirm']);
