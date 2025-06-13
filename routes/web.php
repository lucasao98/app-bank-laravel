<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperationsController;
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
    return view('login');
});

Route::post("/login", [LoginController::class, 'index']);
Route::middleware('hasUser')->get("/logout", [LoginController::class, 'logout']);

Route::prefix('signup')->group(function () {
    Route::get("/", [SignController::class, 'signup']);
    Route::post("/store", [SignController::class, 'store']);
});

Route::middleware('hasUser')->prefix('/dashboard')->group(function() {
    Route::get("/", [DashboardController::class, 'index']);
    Route::get("/bank_transfer", [DashboardController::class, 'bank_transfer']);
    Route::get("/bank_statement", [DashboardController::class, 'bank_statement']);
    Route::get("/bank_deposit", [DashboardController::class, 'bank_deposit']);
    Route::post("/deposit", [DashboardController::class, 'deposit']);
    Route::post("/transfer", [DashboardController::class, 'transfer']);
});

Route::middleware('hasUser')->prefix('/operations')->group(function() {
    Route::post("/deposit", [OperationsController::class, 'deposit']);
    Route::post("/transfer", [OperationsController::class, 'transfer']);
});


