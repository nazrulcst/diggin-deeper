<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CacheController;

//create user using artisan command
Route::get('/create-user-with-artisan-command', function () {
    Artisan::call('user:create');
});

Route::get('/',function(){
    return view('welcome');
});

Route::get('posts',[PostController::class,'index'])->name('post.posts');
Route::get('posts/create',[PostController::class,'create'])->name('post.create');
Route::post('posts/store',[PostController::class,'store'])->name('post.store');
Route::get('posts/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::put('posts/update/{id}',[PostController::class,'update'])->name('post.update');
Route::delete('posts/destroy/{id}',[PostController::class,'destroy'])->name('post.destroy');