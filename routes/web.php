<?php

use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\Admin\TagAdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['prefix' => 'admin', ], function () {
    Route::group(['prefix' => 'posts',], function () {
        Route::get('/', [PostAdminController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostAdminController::class, 'create'])->name('admin.post.create');
        Route::post('/', [PostAdminController::class, 'store'])->name('admin.post.store');
        Route::get('/edit/{post}', [PostAdminController::class, 'edit'])->name('admin.post.edit');
        Route::patch('/{post}', [PostAdminController::class, 'update'])->name('admin.post.update');
        Route::delete('/{post}', [PostAdminController::class, 'destroy'])->name('admin.post.destroy');

    });
    Route::group(['prefix' => 'tags',], function () {
        Route::get('/', [TagAdminController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [TagAdminController::class, 'create'])->name('admin.tag.create');
        Route::post('/', [TagAdminController::class, 'store'])->name('admin.tag.store');
        Route::get('/edit/{tag}', [TagAdminController::class, 'edit'])->name('admin.tag.edit');
        Route::patch('/{tag}', [TagAdminController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag}', [TagAdminController::class, 'destroy'])->name('admin.tag.destroy');

    });
});

Route::group(['prefix' => 'posts',], function () {
    Route::get('/{post}/show', [PostController::class, 'show'])->name('post.show');

});
Route::group(['prefix' => 'comments',], function () {
    Route::post('/', [CommentController::class, 'store'])->name('comment.store');

});
Auth::routes();

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('home');