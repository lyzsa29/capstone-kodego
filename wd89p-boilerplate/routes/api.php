<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\InquiryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::apiResource('/inquiry', InquiryController::class);
Route::apiResource('/inquiries', InquiryController::class);
Route::apiResource('/all', UsersController::class);

Route::get('/get', [InquiryController::class, 'show']);

Route::post('/inquiry', [InquiryController::class, 'store']);
Route::get('/api/inquiries', [InquiryController::class, 'index']);


Route::post('/register-user', [UsersController::class, 'register']);
Route::post('/login-user', [UsersController::class, 'login']);