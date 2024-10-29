<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/dashboard',"post");
Route::view('/create','create-post')->name("create");
Route::resource('post',PostController::class);

Route::view('/','auth.signup')->name("signup");
Route::view("/login","auth.Login")->name("login");
Route::post("/login",[AuthController::class,'Login']);
Route::post('/',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->name("logout");
