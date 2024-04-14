<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(
    function () {
        // comment post
        Route::post('/post/{id}/comments', [PostCommentsController::class, 'store'])->name('comment');
        // Route::put('/post/{id}/comments', [PostCommentsController::class, 'store'])->name('comment.update   ');
        Route::delete('/post/{post}/comments/{comment}', [PostCommentsController::class, 'destroy'])->name('comment.delete');
    }
);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware(['admin', 'verified'])->name('dashboard');

Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('admin')->group(
    function () {
        //admin posts
        Route::resource('/admin/posts', AdminPostController::class);
        //admin posts
        Route::resource('/admin/categories', AdminCategoriesController::class);
        // admin contact messages
        Route::get('/admin/messages', [AdminMessageController::class, 'index'])->name('messages');
        Route::delete('/admin/messages/{id}', [AdminMessageController::class, 'destroy'])->name('messages.delete');

    }
);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
