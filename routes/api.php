<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SweetController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sweets', [SweetController::class,'index'])->name('getSweets');
Route::get('/customers', [CustomerController::class,'index'])->name('getCutomers');

Route::post('/sweets', [SweetController::class, 'store'])->name('postSweet');
Route::post('/customers', [CustomerController::class, 'store'])->name('postCustomer');

