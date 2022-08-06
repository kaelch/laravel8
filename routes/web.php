<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/newsletter', [\App\Http\Controllers\NewsletterController::class, 'index']);
Route::post('/newsletter', [\App\Http\Controllers\NewsletterController::class, 'send']);
