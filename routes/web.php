<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Route;

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


Route::get('/admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login'); 
Route::post('/login', [AuthController::class, 'login'])->name('auth.login'); 

Route::group(['middleware' => ['authenticate']], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('user', UserController::class);
    Route::get('/get-districts/{province_code}', function ($province_code) {
        return response()->json(District::where('province_code', $province_code)->get());
    });
    
    Route::get('/get-wards/{district_code}', function ($district_code) {
        return response()->json(Ward::where('district_code', $district_code)->get());
    });
});

