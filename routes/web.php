<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'showDashboard'])->name('dashboard');

    Route::resource('admins', AdminController::class);
    Route::resource('roles', RoleController::class)->except(['destroy']);
    Route::resource('permissions', PermissionController::class)->except(['edit', 'update', 'destroy']);
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('types', TypeController::class);  

    Route::get('account', [AccountController::class, 'index'])->name('account');

    Route::post('upload/store', [UploadController::class, 'store']);
    Route::post('upload/delete', [UploadController::class, 'delete']);

    Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');
});
