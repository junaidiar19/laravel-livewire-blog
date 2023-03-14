<?php

use App\Http\Livewire\ArticleShow;
use App\Http\Livewire\ExploreIndex;
use App\Http\Livewire\HomeIndex;
use App\Http\Livewire\User\ArticleIndex as UserArticleIndex;
use App\Http\Livewire\User\ArticleWriteContent;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
  Route::get('/users/article', UserArticleIndex::class)->name('users.article');

  Route::get('/users/article/{id}/write', ArticleWriteContent::class)->name('users.article.write');
});

// Blog
Route::get('/articles', ExploreIndex::class)->name('articles.index');
Route::get('/article/{slug}', ArticleShow::class)->name('articles.show');