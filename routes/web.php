<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//use App\Http\Controllers\Sample\IndexController;
//use App\Http\Controllers\Tweet\IndexController;
use App\Http\Controllers\Tweet\CreateController;
// use App\Http\Controllers\Tweet\Update\IndexController;
use App\Http\Controllers\Tweet\Update\PutController;
use App\Http\Controllers\Tweet\DeleteController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class,'show']);

Route::middleware('auth')->group(function () {
    Route::post('/tweet/create',CreateController::class)->name('tweet.create');
    Route::get('/tweet/update/{tweetId}', App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index')->where('tweetId', '[0-9]+');
    Route::put('/tweet/update/{tweetId}', PutController::class)->name('tweet.update.put')->where('tweetId', '[0-9]+');

    Route::delete('/tweet/delete/{tweetId}', DeleteController::class)->name('tweet.delete');
});

Route::get('/sample/{id}', [\App\Http\Controllers\Sample\IndexController::class,'showId']);

Route::get('/tweet',\App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');


