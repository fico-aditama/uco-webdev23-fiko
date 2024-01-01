<?php

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

Route::controller(\App\Http\Controllers\ArticleController::class)->group(function () {
    // Route::get('/articles', 'list')->name('article.list');

    // Route::get('/articles/create',  'create')->name('article.create');
    // Route::post('/articles/create', 'create');
    Route::match(['get', 'post'], '/articles/create', 'create')->name('article.create');

    Route::get('/articles', 'list')->name('article.list');
    Route::get('/articles/{slug}', 'single')->name('article.single');

    Route::match(['get', 'post'], '/articles/{id}/edit', 'edit')->name('article.edit');
    Route::post('/articles/{id}/delete','delete')->name('article.delete');

    Route::post('/articles/{id}/comment', 'comment')->name('article.comment');
});

Route::controller(\App\Http\Controllers\ArticleCategoryController::class)->group(function () {
    Route::get('/article_categories', 'list')->name('article_category.list');
    Route::match(['get', 'post'], '/article_categories/create', 'create')->name('article_category.create');
    Route::match(['get', 'post'], '/article_categories/{id}/edit', 'edit')->name('article_category.edit');
    Route::post('/article_categories/{id}/delete','delete')->name('article_category.delete');
});
