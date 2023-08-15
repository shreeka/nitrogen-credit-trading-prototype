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
    return view('creditgenerate.estimation');
});

Route::get('/getbalance',[EligibilityController::class,'getBalance'])->name('getBalance');

Route::get('/estimatecredit', function () {
    return view('creditgenerate.estimation');
});

Route::get('/creditgeneration', function () {
    return view('creditgenerate.generation');
});

Route::get('/marketplace', function () {
    return view('creditpurchase.marketplace');
});
