<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
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

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// Create additional Routes below
Route::get('/login', [AuthController::class, 'create'])->name('login'); // Named route for login
Route::post('/login', [AuthController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/clients/add', [ClientController::class, 'create'])->name('clients.add');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
});
