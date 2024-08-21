<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnalyticsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/index', function () {
//    return view('index');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';


Route::middleware('auth')->group(function () {

//    Route::get('item', [ItemController::class, 'index'])->name('dashboard.admin');

    Route::get('item', [ItemController::class, 'user_items'])->name('dashboard');

    Route::get('item/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('item', [ItemController::class, 'store'])->name('item.store');
    Route::get('item/{item}', [ItemController::class, 'show'])->name('item.show');
 //   Route::get('items/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
 //   Route::put('item/{item}', [ItemController::class, 'update'])->name('item.update');
 //   Route::delete('item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');

    Route::get('/search', [ItemController::class, 'search'])->name('search');
    //Route::delete('/items/bulk-delete', [ItemController::class, 'bulkDelete'])->name('items.bulkDelete');


//    Route::get('/logout', function () {
//        return view('auth.login'); });

    Route::get('/analytics', [AnalyticsController::class, 'index']);
    Route::get('/analytics', [AnalyticsController::class, 'index_user'])->name('analytics.user');

    Route::get('/items', [ItemController::class, 'dropdown'])->name('dropdown');
    Route::get('/print-inventory', [ItemController::class, 'print'])->name('printInventory.index');
    });



