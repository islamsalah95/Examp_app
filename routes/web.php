<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;
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


Route::get('migrateee', function () {
    try {
        // Artisan::call('storage:link', [
        //     '--php artisan db:seed' => true,
        // ]);

        // Artisan::call('migrate', [
        //     '--force' => true,
        // ]);
        
        Artisan::call('db:seed'); 
        
    return response()->json(['message' => 'Migration ran successfully.']);
    } catch (QueryException $e) {
        return response()->json(['error' => 'Migration failed: ' . $e->getMessage()], 500);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
    }
});


Route::middleware('guest')->group(function () {
    Route::get('/', function () {return view('welcome');})->name('welcome');
    // Authentication routes for admin login
    Route::get( 'login', [DashLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [DashLoginController::class, 'validateLogin'])->name('login');
});
Route::post('logout', [DashLoginController::class, 'logout'])->name('logout')->middleware('auth:admin');

require __DIR__.'/dash.php';
