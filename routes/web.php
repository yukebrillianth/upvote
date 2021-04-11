<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Menonaktifkan register
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// Base
Route::get('/', [BaseController::class, 'home']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('logout', [BaseController::class, 'logout'])->name('logout');

// Route group dengan role participant
Route::middleware(['role:participant'])->group(function () {
    Route::get('/success', [BaseController::class, 'success'])->name('success');
});

// Route group dengan role super-administrator
Route::group(['prefix' => 'dashboard', 'middleware' => ['role:super-administrator']], function () {
    Route::get('/kelas', function () {
        return 'Kelas';
    });
});
