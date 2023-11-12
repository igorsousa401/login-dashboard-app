<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\CommonController;

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

Route::prefix('login')->group(function () {
    Route::get('/', [AuthController::class, "login"])->name("auth.login.get");
    Route::post('/', [\App\Http\Controllers\Api\AuthController::class, "login"])->name("auth.login.post");
});

Route::prefix('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, "logout"])->name("auth.logout")->middleware(['auth']);
});

Route::prefix('register')->group(function () {
    Route::get('/', [AuthController::class, "registerAdmin"])->name("auth.register.get");
    Route::post('/', [\App\Http\Controllers\Api\AuthController::class, "registerAdmin"])->name("auth.register.post");
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('app.admin.index')->middleware(['auth', 'admin']);
    Route::get('/users', [AdminController::class, 'users'])->name('app.admin.users')->middleware(['auth', 'admin']);
});

Route::prefix('common')->group(function () {
    Route::get('/', [CommonController::class, 'index'])->name('common.index')->middleware(['auth', 'common']);
    Route::get('/product', [CommonController::class, 'product'])->name('common.product')->middleware(['auth', 'common']);
    Route::get('/brand', [CommonController::class, 'brand'])->name('common.brand')->middleware(['auth', 'common']);
    Route::get('/category', [CommonController::class, 'category'])->name('common.category')->middleware(['auth', 'common']);
});
