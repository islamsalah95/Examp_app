<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dash\DashLoginController;

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


Route::middleware('guest')->group(function () {
    Route::get('/', function () {return view('welcome');})->name('welcome');
    // Authentication routes for admin login
    Route::get( 'login', [DashLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [DashLoginController::class, 'validateLogin'])->name('login');
});
Route::post('logout', [DashLoginController::class, 'logout'])->name('logout')->middleware('auth:admin');

require __DIR__.'/dash.php';
