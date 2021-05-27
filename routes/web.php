<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\Auth\TwitterController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'], ['middleware' => ['auth', 'active_user']])->name('home');

Auth::routes(['verify' => true]);

Route::get('/newsletter', [App\Http\Controllers\NewsletterController::class, 'index']);

Route::post('/newsletter',[App\Http\Controllers\NewsletterController::class, 'store']);

Route::get('/emplois/{id}/{author}', [App\Http\Controllers\JobsController::class, 'show']);

Route::get('/emplois/{category}', [App\Http\Controllers\JobsController::class, 'show_cat']);

Route::get('/search/{key}', [App\Http\Controllers\JobsController::class, 'show_key'])->name('search_mot');

Route::get('/offres-emploi', [App\Http\Controllers\JobsAllController::class, 'index']);

Route::get('/actualites', [App\Http\Controllers\NewsController::class, 'show_all'])->name('actualites');

Route::post('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

Route::post('/search-news', [App\Http\Controllers\SearchNewsController::class, 'index'])->name('search_news');

Route::post('/search-cat', [App\Http\Controllers\SearchNewsController::class, 'search_cat'])->name('search_cat');

Route::get('/article/{id}', [App\Http\Controllers\NewsController::class, 'show'])->name('news');

Route::get('/v/{city}', [App\Http\Controllers\JobsController::class, 'show_city'])->name('order_city');

Route::post('/teletravail', [App\Http\Controllers\SearchController::class, 'order_tel'])->name('order_tel');

Route::post('/devis', [App\Http\Controllers\DevisController::class, 'index'])->name('devis');

Route::name('language')->get('language/{lang}', [App\Http\Controllers\HomeController::class, 'language']);

Route::get('/conseil-carriere/article/{id}/{slug?}', [App\Http\Controllers\CareerController::class, 'show'])->name('career');

Route::group(['middleware' => ['auth', 'active_user']], function() {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);

    Route::post('/cv', [App\Http\Controllers\ProfileController::class, 'update_cv'])->middleware('verified');

    Route::get('/emplois/like/{id}/{author}', [App\Http\Controllers\JobsController::class, 'likes'])->middleware('verified');

    Route::post('/emplois/apply/{id}/{author}', [App\Http\Controllers\JobsController::class, 'apply'])->middleware('verified');

    Route::post('/profile-picture', [App\Http\Controllers\ProfileController::class, 'update_avatar'])->middleware('verified');

    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update_profil'])->middleware('verified');

    Route::post('/profile-visibility', [App\Http\Controllers\ProfileController::class, 'update_show'])->middleware('verified');

    Route::post('/profile-notif', [App\Http\Controllers\ProfileController::class, 'update_notif'])->middleware('verified');

    Route::get('/profile-remove', [App\Http\Controllers\ProfileController::class, 'remove_account'])->middleware('verified');

    Route::get('/profile-cv-remove', [App\Http\Controllers\ProfileController::class, 'remove_cv'])->middleware('verified');

    Route::get('/emplois/like/{id}/{author}', [App\Http\Controllers\JobsController::class, 'likes'])->middleware('verified');

    Route::post('/emplois/apply/{id}/{author}', [App\Http\Controllers\JobsController::class, 'apply'])->middleware('verified');

    Route::get('/administration', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('verified');

    Route::get('/administration/news/create', [App\Http\Controllers\AdminController::class, 'news_create'])->name('news_create')->middleware('verified');

    Route::post('/administration/news/create', [App\Http\Controllers\AdminController::class, 'news_create_post'])->name('news_create_post')->middleware('verified');

    Route::get('/administration/news/validate/{id}', [App\Http\Controllers\AdminController::class, 'news_validate'])->name('news_validate')->middleware('verified');

    Route::get('/administration/news/draft/{id}', [App\Http\Controllers\AdminController::class, 'news_invalidate'])->name('news_invalidate')->middleware('verified');

    Route::get('/administration/news/update/{id}', [App\Http\Controllers\AdminController::class, 'news_update'])->name('news_update')->middleware('verified');

    Route::post('/administration/news/update/confirm/{id}', [App\Http\Controllers\AdminController::class, 'news_update_post'])->name('news_update_post')->middleware('verified');

    Route::get('/administration/news/delete/{id}', [App\Http\Controllers\AdminController::class, 'news_delete'])->name('news_delete')->middleware('verified');

    Route::get('/article/like/{news_id}/{user_id}', [App\Http\Controllers\NewsController::class, 'likes'])->name('like_news')->middleware('verified');

    Route::post('/article/comment/{news_id}', [App\Http\Controllers\NewsController::class, 'post_comment'])->name('post_comment')->middleware('verified');  

    Route::get('/recruter', [App\Http\Controllers\RecruterController::class, 'index'])->middleware('verified');

    Route::get('/recruter/emplois/create', [App\Http\Controllers\RecruterController::class, 'show'])->middleware('verified');

    Route::post('/recruter/emplois/post/create', [App\Http\Controllers\RecruterController::class, 'create'])->middleware('verified');

    Route::get('/recruter/emplois/delete/{id}', [App\Http\Controllers\RecruterController::class, 'remove_jobs'])->middleware('verified');

    Route::get('/recruter/emplois/validate/{id}', [App\Http\Controllers\RecruterController::class, 'validate_jobs'])->middleware('verified');

    Route::get('/recruter/emplois/invalidate/{id}', [App\Http\Controllers\RecruterController::class, 'invalidate_jobs'])->middleware('verified');

    Route::get('/recruter/emplois/update/{id}', [App\Http\Controllers\RecruterController::class, 'update_jobs'])->middleware('verified');

    Route::post('/recruter/emplois/update/confirm/{id}', [App\Http\Controllers\RecruterController::class, 'update_jobs_post'])->name('update_jobs_post')->middleware('verified');

    Route::get('/recruter/credits/delete/{id}', [App\Http\Controllers\RecruterController::class, 'remove_credits'])->middleware('verified');

    Route::get('/recruter/credits/create/10/{token}', [App\Http\Controllers\TransactionsController::class, 'add_credits_10'])->middleware('verified');

    Route::get('/recruter/credits/create/26/{token}', [App\Http\Controllers\TransactionsController::class, 'add_credits_26'])->middleware('verified');

    Route::get('/recruter/credits/error', [App\Http\Controllers\TransactionsController::class, 'error_credits'])->middleware('verified');

    Route::get('/recruter/apply/delete/{id}', [App\Http\Controllers\RecruterController::class, 'remove_apply'])->middleware('verified');

    Route::get('/recruter/apply/validate/{id}', [App\Http\Controllers\RecruterController::class, 'validate_apply'])->middleware('verified');

    Route::get('/recruter/apply/refused/{id}', [App\Http\Controllers\RecruterController::class, 'refused_apply'])->middleware('verified');

    Route::get('/administration/users/validate/{id}', [App\Http\Controllers\AdminController::class, 'users_validate'])->name('users_validate')->middleware('verified');

    Route::get('/administration/users/invalidate/{id}', [App\Http\Controllers\AdminController::class, 'users_invalidate'])->name('users_invalidate')->middleware('verified');

    Route::get('/administration/users/delete/{id}', [App\Http\Controllers\AdminController::class, 'remove_users'])->name('remove_users')->middleware('verified');

    Route::get('/administration/devis/delete/{id}', [App\Http\Controllers\DevisController::class, 'delete_devis'])->name('delete_devis')->middleware('verified');

    Route::get('/administration/devis/reply/{id}', [App\Http\Controllers\DevisController::class, 'reply_devis'])->name('reply_devis')->middleware('verified');

    Route::get('/administration/contact/delete/{id}', [App\Http\Controllers\ContactController::class, 'delete_contact'])->name('delete_contact')->middleware('verified');

    Route::get('/administration/contact/resolved/{id}', [App\Http\Controllers\ContactController::class, 'resolved_contact'])->name('resolved_contact')->middleware('verified');

    Route::post('/administration/contact/reply/{id}', [App\Http\Controllers\ContactController::class, 'reply_contact'])->name('reply_contact')->middleware('verified');

    Route::post('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact')->middleware('verified');

    Route::post('/contact/reply/{id}', [App\Http\Controllers\ProfileController::class, 'reply_contact_user'])->name('reply_contact_user')->middleware('verified');

    Route::get('/contact/resolved/{id}', [App\Http\Controllers\ProfileController::class, 'resolved_contact_user'])->name('resolved_contact_user')->middleware('verified');

    Route::get('/administration/career/create', [App\Http\Controllers\AdminController::class, 'career_create'])->name('career_create')->middleware('verified');

    Route::post('/administration/career/create', [App\Http\Controllers\AdminController::class, 'career_create_post'])->name('career_create_post')->middleware('verified');
});

// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Github
Route::get('auth/github', [GitHubController::class, 'redirectToGitHub']);
Route::get('auth/github/callback', [GitHubController::class, 'handleGitHubCallback']);

// Facebook
Route::get('auth/twitter', [TwitterController::class, 'redirectToTwitter']);
Route::get('auth/twitter/callback', [TwitterController::class, 'handleTwitterCallback']);