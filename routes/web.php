<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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


//admin
Route::get('/admin',[AdminController::class,'adminLoginForm']);
Route::post('/admin/login',[AdminController::class,'adminPostLogin'])->name('admin.post.login');



Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
});
