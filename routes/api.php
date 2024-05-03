<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

// Rute untuk menampilkan daftar catatan pengeluaran
Route::get('expenses', [ExpenseController::class, 'index']);

// Rute untuk menampilkan detail catatan pengeluaran
Route::get('expenses/{id}', [ExpenseController::class, 'show']);

// Rute untuk membuat catatan pengeluaran baru
Route::post('expenses', [ExpenseController::class, 'store']);

// Rute untuk mengupdate catatan pengeluaran
Route::put('expenses/{id}', [ExpenseController::class, 'update']);

// Rute untuk menghapus catatan pengeluaran
Route::delete('expenses/{id}', [ExpenseController::class, 'destroy']);

// Rute untuk filter catatan pengeluaran berdasarkan tanggal
Route::post('expenses/filter', [ExpenseController::class, 'filterByDate']);
