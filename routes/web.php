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
    Route::get('/', [AuthController::class, "login"])->name("auth.login.get")->middleware(["logged"]);
    Route::post('/', [\App\Http\Controllers\Api\AuthController::class, "login"])->name("auth.login.post")->middleware(["logged"]);
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
    Route::get('/users/update/{user_id}', [AdminController::class, 'updateUser'])->name('app.admin.update')->middleware(['auth', 'admin']);
    Route::post('/users/update/{user_id}', [\App\Http\Controllers\Api\AdminController::class, 'updateUser'])->name('app.admin.update-post')->middleware(['auth', 'admin']);
    Route::post('/users/delete/{user_id}', [\App\Http\Controllers\Api\AdminController::class, 'deleteUser'])->name('app.admin.delete-post')->middleware(['auth', 'admin']);
    Route::get('/users', [AdminController::class, 'users'])->name('app.admin.users')->middleware(['auth', 'admin']);
    Route::get('/add-user', [AdminController::class, 'addUser'])->name('app.admin.users.add')->middleware(['auth', 'admin']);
    Route::post('/add-user', [\App\Http\Controllers\Api\AdminController::class, 'storeUser'])->name('app.admin.users.add-post')->middleware(['auth', 'admin']);
});

Route::prefix('common')->group(function () {
    Route::get('/', [CommonController::class, 'index'])->name('app.common.index')->middleware(['auth', 'common']);
    Route::get('/product', [CommonController::class, 'products'])->name('app.common.product')->middleware(['auth', 'common', 'product']);
    Route::get('/brand', [CommonController::class, 'brands'])->name('app.common.brand')->middleware(['auth', 'common', 'brand']);
    Route::get('/category', [CommonController::class, 'categories'])->name('app.common.category')->middleware(['auth', 'common', 'category']);
});
