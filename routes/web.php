<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes(['verify' => true]);

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware('verified');

Route::get('/newsletter', [App\Http\Controllers\NewsletterController::class, 'index']);

Route::post('/newsletter',[App\Http\Controllers\NewsletterController::class, 'store']);

Route::post('/cv', [App\Http\Controllers\ProfileController::class, 'update_cv'])->middleware('verified');

Route::post('/profile-picture', [App\Http\Controllers\ProfileController::class, 'update_avatar'])->middleware('verified');

Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update_profil'])->middleware('verified');

Route::post('/profile-visibility', [App\Http\Controllers\ProfileController::class, 'update_show'])->middleware('verified');

Route::post('/profile-notif', [App\Http\Controllers\ProfileController::class, 'update_notif'])->middleware('verified');

Route::get('/profile-remove', [App\Http\Controllers\ProfileController::class, 'remove_account'])->middleware('verified');

Route::get('/profile-cv-remove', [App\Http\Controllers\ProfileController::class, 'remove_cv'])->middleware('verified');

Route::get('/jobs/{id}/{author}', [App\Http\Controllers\JobsController::class, 'show']);

Route::get('/jobs/like/{id}/{author}', [App\Http\Controllers\JobsController::class, 'likes'])->middleware('verified');

Route::post('/jobs/apply/{id}/{author}', [App\Http\Controllers\JobsController::class, 'apply'])->middleware('verified');

Route::get('/jobs/{category}', [App\Http\Controllers\JobsController::class, 'show_cat']);

Route::get('/recruter', [App\Http\Controllers\RecruterController::class, 'index']);

Route::group(['middleware' => ['auth', 'active_user']], function() {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    // ... Any other routes that are accessed only by non-blocked user
});