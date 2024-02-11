<?php

use App\Enums\UserRoleEnum;
use App\Http\Middleware\EnsureUserRole;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(\App\Http\Controllers\ArticleController::class)
    ->middleware(['auth', 'has_article_category'])
    ->group(function () {
        // Route::get('/articles', 'list')->name('article.list');

        // Route::get('/articles/create',  'create')->name('article.create');
        // Route::post('/articles/create', 'create');
        Route::match(['get', 'post'], '/articles/create', 'create')
            ->name('article.create')
            ->middleware('role:' . UserRoleEnum::Administrator->value . ',' . UserRoleEnum::Author->value);
        Route::get('/articles', 'list')->name('article.list');
        Route::get('/articles/{slug}', 'single')->name('article.single');

        Route::match(['get', 'post'], '/articles/{id}/edit', 'edit')
            ->name('article.edit')
            ->middleware('role:' . UserRoleEnum::Administrator->value . ',' . UserRoleEnum::Author->value);
        Route::post('/articles/{id}/delete', 'delete')
            ->name('article.delete')
            ->middleware('role:' . UserRoleEnum::Administrator->value . ',' . UserRoleEnum::Author->value);
        Route::post('/articles/{id}/comment', 'comment')->name('article.comment');
    });

Route::controller(\App\Http\Controllers\ArticleCategoryController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/article_categories', 'list')->name('article_category.list');
        Route::match(['get', 'post'], '/article_categories/create', 'create')
            ->name('article_category.create')
            ->middleware(['auth', 'can:isAdmin']);
        Route::match(['get', 'post'], '/article_categories/{id}/edit', 'edit')
            ->name('article_category.edit')
            ->middleware(['auth', 'can:isAdmin']);
        Route::post('/article_categories/{id}/delete', 'delete')->name('article_category.delete');
    });

Route::controller(\App\Http\Controllers\UserController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/users', 'list')->name('user.list');
        Route::match(['get', 'post'], '/users/create', 'create')->name('user.create');
        Route::match(['get', 'post'], '/users/{id}/edit', 'edit')->name('user.edit');
        Route::post('/users/{id}/delete', 'delete')->name('user.delete');
    });

Route::match(['get', 'post'], '/login', [\App\Http\Controllers\LoginController::class, 'form'])
    ->middleware('guest')
    ->name('login');

Route::match(['get', 'post'], '/login/email', [\App\Http\Controllers\LoginController::class, 'formEmail'])
    ->middleware('guest')
    ->name('login.email');

Route::match(['get', 'post'], '/login/phone', [\App\Http\Controllers\LoginController::class, 'formPhone'])
    ->middleware('guest')
    ->name('login.phone');
// Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])
//     ->name('login')
//     ->middleware('guest');

Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::controller(\App\Http\Controllers\NotificationController::class)
    ->middleware(
        '
auth',
    )
    ->group(function () {
        Route::get('/notification', 'list')->name('notification.list');
        Route::get('/notification/{id}/read', 'read')->name('notification.read');
    });
