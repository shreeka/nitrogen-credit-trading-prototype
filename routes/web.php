<?php

use App\Http\Controllers\EligibilityController;
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
    return view('home');
});

Route::get('/generatecredit', function () {
    return view('creditgenerate.dashboard');
});

Route::get('/eligibilitytool', function () {
    return view('creditgenerate.eligibility');
});

Route::get('/getbalance',[EligibilityController::class,'getBalance'])->name('getBalance');

