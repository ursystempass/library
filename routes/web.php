<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookShelvesController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MajorController;
use App\Models\BookShelves;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('settings', SettingController::class);
    Route::resource('majors', MajorController::class);
    Route::resource('classes', ClasseController::class);
    Route::resource('bookshelves', BookShelvesController::class);
    Route::resource('books', BookController::class);
});


Route::resource('catalog', CatalogController::class)->names([
    'index' => 'member.catalog',
]);

Route::resource('users', UserController::class);
Route::resource('borrowings', BorrowingController::class);
