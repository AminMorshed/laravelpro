<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\User\PermissionController as UserPermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',function (){
return view('admin.index');
});


Route::resource('users',UserController::class)->except(['show']);
Route::get('users/{user}/permissions',[UserPermissionController::class , 'create'])->name('users.permissions');
Route::post('users/{user}/permissions',[UserPermissionController::class , 'store'])->name('users.permissions.store');
Route::resource('permissions',PermissionController::class)->except(['show']);
Route::resource('roles',RoleController::class)->except(['show']);
Route::resource('products' , ProductController::class)->except(['show']);
