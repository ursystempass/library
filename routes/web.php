<?php

use App\Http\Controllers\DescController;
use App\Http\Controllers\ReturnBackController;
use App\Http\Controllers\ReturnDetailController;
use App\Http\Controllers\TypeController;
use App\Models\BookShelves;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookShelvesController;
use App\Http\Controllers\BorrowingDetailController;
use App\Http\Controllers\ProfileController;

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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::resource('settings', SettingController::class);
    Route::resource('majors', MajorController::class);
    Route::resource('classes', ClasseController::class);
    Route::resource('bookshelves', BookShelvesController::class);
    Route::resource('books', BookController::class);
    Route::get('/users/admin', [UserController::class, 'showAdminPage'])->name('users.admin');
    Route::resource('users', UserController::class);
    Route::resource('borrowings', BorrowingController::class);
    Route::resource('borrowingdetails', BorrowingDetailController::class);
    Route::put('/borrowingdetails/{id}/updateStatus', [BorrowingDetailController::class, 'updateStatus'])->name('borrowingdetails.updateStatus');
    Route::get('/borrow-scan', [BorrowingController::class, 'borrowScan'])->name('borrow.scan');
    Route::post('/scan-code', [BorrowingController::class, 'scanCode'])->name('scan.code');
    Route::resource('rebacks', ReturnBackController::class);
    Route::resource('redets', ReturnDetailController::class);
    Route::resource('types', TypeController::class);
});


Route::middleware('member')->group(function () {
    Route::resource('catalog', CatalogController::class)->names([
        'index' => 'member.catalog',
    ]);
    Route::get('/greeting', [CatalogController::class, 'greeting'])->name('catalog.greeting'); // Rute untuk halaman greeting di CatalogController
    Route::get('/book/{id}', [CatalogController::class, 'showDescription'])->name('member.desc');
    Route::get('/profile-member', [ProfileController::class, 'showMember'])->name('profile.showMember');
});

