<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});
Route::post('/users/add', [UserController::class, 'addUser']);
Route::view('/users/create', 'users.addUser');

Route::get('/departments', [MasterController::class, 'departments']);
Route::get('/designations', [MasterController::class, 'designations']);
Route::get('/user-types', [MasterController::class, 'userTypes']);

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Reset Password routes
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// // Example protected route
// Route::middleware('auth')->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
