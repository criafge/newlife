<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);

Route::resource('applications', ApplicationController::class);

Route::get('results', SearchController::class)->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', App\Http\Controllers\admin\IndexController::class)->name('admin');

Route::get('change/{application}/{status}', App\Http\Controllers\admin\ChangeStatusController::class)->name('change');

Route::post('create/comment/{application}', [CommentController::class, 'create'])->name('create-comment');
