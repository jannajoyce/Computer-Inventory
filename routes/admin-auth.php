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

//Admin Inventories
Route::middleware(['auth:admin'])->group(function () {
    Route::get('admin/inventories', [ItemController::class, 'showAllInventories'])->name('admin.inventories');
    Route::get('admin/inventories/dropdown', [ItemController::class, 'adminInventories_dropdown'])->name('adminInventories.dropdown');
    Route::get('admin/inventories/search', [ItemController::class, 'adminInventories_search'])->name('adminInventories.search');
    Route::get('admin/inventories/print', [ItemController::class, 'adminInventories_print'])->name('adminInventories.print');
    Route::get('admin/{item}/edit', [ItemController::class, 'edit'])->name('admin.edit');
    Route::put('admin/{item}', [ItemController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{item}', [ItemController::class, 'destroy'])->name('admin.destroy');
});

//Users
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'usersIndex'])->name('admin.users');
    Route::get('admin/users/dropdown', [ItemController::class, 'adminUsers_dropdown'])->name('adminUsers.dropdown');
    Route::get('admin/users/search', [ItemController::class, 'adminUsers_search'])->name('adminUsers.search');
});

//Activities
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/activities', [UserController::class, 'activities'])->name('admin.activities');
});


