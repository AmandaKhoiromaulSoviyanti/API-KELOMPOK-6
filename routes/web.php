<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

// route untuk login
Route::get('/login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [Auth\LoginController::class, 'login']);

// route untuk register
Route::get('/register', [Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [Auth\RegisterController::class, 'register']);

// route untuk Reset kata sandi
Route::get('/password/reset', [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [Auth\ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('expenses', [ExpenseController::class, 'index'])->name('expenses.index'); // Menampilkan daftar catatan pengeluaran
Route::get('expenses/create', [ExpenseController::class, 'create'])->name('expenses.create'); // Menampilkan formulir tambah catatan pengeluaran
Route::post('expenses', [ExpenseController::class, 'store'])->name('expenses.store'); // Menyimpan catatan pengeluaran baru
Route::get('expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show');// Menampilkan detail catatan pengeluaran
Route::get('expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit'); // Menampilkan formulir edit catatan pengeluaran
Route::put('expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update'); // Menyimpan perubahan pada catatan pengeluaran
Route::delete('expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy'); // Menghapus catatan pengeluaran

Route::post('expenses/filter', [ExpenseController::class, 'filterByDate'])->name('expenses.filter');

Auth::routes();

Route::get('/home', [ExpenseController::class, 'index'])->name('home');
