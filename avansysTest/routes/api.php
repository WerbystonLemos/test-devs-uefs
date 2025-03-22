<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

Route::resource('/user', UserController::class);
Route::resource('/post', PostController::class);
Route::resource('/tag', TagController::class);
