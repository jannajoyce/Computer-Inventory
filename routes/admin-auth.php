<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

});

Route::prefix('admin')->middleware('auth:admin')->group(function () {


    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
});


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/analytics', [AnalyticsController::class, 'index_admin'])->name('admin.analytics.index');

//    Route::get('/admin/dashboard', function () {
//        return view('admin.dashboard');})->name('admin.dashboard');

});

//admin dashboard
Route::middleware(['auth:admin'])->group(function () {

    Route::get('admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/dashboard/items', [ItemController::class, 'admin_dropdown'])->name('admin.dropdown');
    Route::get('admin/dashboard/search', [ItemController::class, 'admin_search'])->name('admin.search');


});
