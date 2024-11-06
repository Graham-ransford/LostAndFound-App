<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/dashboard',"post");
Route::view('/create','create-post')->name("create");
Route::get('/my-post',[PostController::class,'MyPost'])->name('MyPost');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::delete('/post/delete/{post}', [PostController::class, 'destroy2'])->name('post.destroy2');
Route::get('/search', [PostController::class, 'search'])->name('post.search');
Route::resource('post',PostController::class);
// Route::view('/my-post','my-post')->name("MyPost");
Route::view('/','auth.signup')->name("signup");
Route::view("/login","auth.Login")->name("login");
Route::post("/login",[AuthController::class,'Login']);
Route::post('/',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->name("logout");
