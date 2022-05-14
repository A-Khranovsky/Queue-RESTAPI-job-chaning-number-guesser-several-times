<?php

use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

Route::get('/app/logs', [HomeController::class, 'show']);
Route::get('/app/logs/clear', [HomeController::class, 'clear']);
Route::get('/app/start', [HomeController::class,'start']);
Route::get('/app/total', [HomeController::class,'total']);
