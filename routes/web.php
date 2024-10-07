<?php

use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});
Route::resources([
    'posts' => PostController::class,
    'videos' => VideoController::class,
]);
Route::post('/post-comments/store', [PostController::class, 'commentStore'])->name('post_comments.store');
Route::delete('/post-comments/destroy/{id}', [PostController::class, 'commentDestroy'])->name('post_comments.destroy');
Route::post('/video-comments/store', [VideoController::class, 'commentStore'])->name('video_comments.store');
Route::delete('/video-comments/destroy/{id}', [VideoController::class, 'commentDestroy'])->name('video_comments.destroy');
