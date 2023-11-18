<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

include '/LaravelProjects/cord/routes/auth.php';

Route::get('/',[DashboardController::class, 'index'])->name('index');

Route::group(['prefix'=>'dashboard/'], function(){

    Route::get('/',[DashboardController::class, 'index'])->name('index');
    
    Route::get('terms',[DashboardController::class, 'terms'])->name('terms');

    // Route::group(['as'=>'cord.','middleware'=>['auth']], function(){

    //     Route::get('show/{cord}',[CordController::class, 'show'])->name('show');
        
    //     Route::get('edit/{cord}',[CordController::class, 'edit'])->name('edit');
        
    //     Route::put('update/{cord}',[CordController::class, 'update'])->name('update');
    // });
    // Route::post('cords/{cord}/comments', [CommentController::class, 'store'])->name('cords.comments.store');
});


Route::post('/create',[CordController::class, 'store'])->name('cord.store');

Route::delete('/delete/{cord}',[CordController::class, 'destroy'])->name('cord.destroy');


// resource routing
//first param is the model
//use except to exclude undefined methods so laravel will not create those
//if we dont want to apply auth on show, exclude frm the first route and define new route of its own
Route::resource('cord', CordController::class)->except(['index','create'])->middleware('auth');

// Route::resource('cord', CordController::class)->only(['show']);

Route::resource('cords.comments', CommentController::class)->middleware('auth');

Route::resource('users', UserController::class)->only(['show','edit','update'])->middleware('auth');

Route::get('profile',[UserController::class, 'profile'])->middleware('auth')->name('users.profile');

Route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('/cord/{id}',[LikeController::class,'like'])->middleware('auth')->name('cord.like');


// Route::get('/users/{id}',[UserController::class, 'show']);

