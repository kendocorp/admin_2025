<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CognitoUserController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CognitoUserBatchController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('cognito_users', CognitoUserController::class);
Route::get('cognito_users/export/excel', [CognitoUserController::class, 'exportExcel'])->name('cognito_users.export.excel');
Route::resource('entities', EntityController::class);
Route::resource('cognito_user_batches', CognitoUserBatchController::class);

require __DIR__.'/auth.php';
