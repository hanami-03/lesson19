<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::post('/home', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profiles.show');// プロフィール画面へのルート
    Route::post('/follows/{user}', [FollowController::class, 'store'])->name('follows.store'); // フォロー
    Route::delete('/follows/{user}', [FollowController::class, 'destroy'])->name('follows.destroy'); // フォロー解除
    Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profiles.show'); // プロフィール画面へのルート
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search'); // 検索画面へのルート
    Route::get('/profiles/{user}/edit', [ProfileController::class, 'edit'])->name('profiles.edit'); // 編集画面へのルート
    Route::put('/profiles/{user}', [ProfileController::class, 'update'])->name('profiles.update'); // プロフィール更新のルート
});
