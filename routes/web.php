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
    return view('home');
});

Auth::routes(['verify' => true]);

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware('verified');

Route::get('/newsletter', [App\Http\Controllers\NewsletterController::class, 'index']);

Route::post('/newsletter',[App\Http\Controllers\NewsletterController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');