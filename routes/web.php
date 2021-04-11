<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BaseController::class, 'index']);

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::middleware(['role:participant'])->group(function () {
    Route::get('/dashboard', [BaseController::class, 'dashboard'])->name('dashboard');
    Route::get('/success', [BaseController::class, 'success'])->name('success');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['role:super-administrator']], function () {
    Route::get('/', function () {
        return 'Dashboard';
    })->name('dashboard');
    Route::get('/kelas', function () {
        return 'Kelas';
    });
});
Route::get('logout', [BaseController::class, 'logout'])->name('logout');
