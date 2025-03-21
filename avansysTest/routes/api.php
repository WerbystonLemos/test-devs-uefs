<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::resource('/user', UserController::class);
Route::resource('/post', PostController::class);
