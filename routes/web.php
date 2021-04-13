<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipantController;
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
Route::get('/app', function () {
    return view('layouts.app');
});
Route::get('/', [BaseController::class, 'home'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('logout', [BaseController::class, 'logout'])->name('logout');
Route::get('online', [ParticipantController::class, 'onlineUsers'])->name('onlineUsers');

// Route group dengan role participant
Route::middleware(['role:participant'])->group(function () {
    Route::get('/success', [BaseController::class, 'success'])->name('success');
});

// Route group dengan role super-administrator
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super-administrator']], function () {
    Route::get('/kelas', function () {
        return 'Kelas';
    });
    Route::prefix('kandidat')->group(function () {
        Route::get('/', [CandidateController::class, 'index'])->name('kandidat');
        Route::post('/', [CandidateController::class, 'store'])->name('storeKandidat');
        Route::get('/add', [CandidateController::class, 'create'])->name('addKandidat');
        Route::delete('/', [CandidateController::class, 'deleteAll'])->name('deleteAll');
        Route::delete('{id}', [CandidateController::class, 'destroy'])->name('deleteKandidat');
        Route::get('edit/{id}', [CandidateController::class, 'edit'])->name('editKandidat');
        Route::put('edit/{id}', [CandidateController::class, 'update'])->name('putKandidat');
    });
});
