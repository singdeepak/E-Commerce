<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    
Route::get('/', [HomeController::class, 'index']);
Route::get('redirect', [HomeController::class, 'redirect']);
Route::get('view/category', [AdminController::class, 'viewCategory'])->name('view.category');
Route::get('create/category', [AdminController::class, 'createCategory'])->name('create.category');
Route::post('store/category', [AdminController::class, 'storeCategory'])->name('store.category');
Route::get('update/{id}/category', [AdminController::class, 'editCategory'])->name('edit.category');
Route::put('update/{id}/category', [AdminController::class, 'updateCategory'])->name('update.category');
Route::delete('destroy/{id}/category', [AdminController::class, 'destroyCategory'])->name('destroy.category');
