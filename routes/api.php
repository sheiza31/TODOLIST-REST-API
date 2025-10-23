<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TasksController;

Route::middleware('auth:sanctum')->group(function () {
Route::post('logout',[AuthController::class, 'LogoutUser']);
Route::resource('tasks', TasksController::class);
});
Route::post('register',[AuthController::class, 'RegisterUser']);
Route::post('login',[AuthController::class, 'LoginUser']);


