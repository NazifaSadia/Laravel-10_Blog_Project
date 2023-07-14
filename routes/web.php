<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'homepage']);

Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

//Route::get('/post',[HomeController::class, 'post'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/post_page',[AdminController::class, 'post_page']);
Route::post('/add_post',[AdminController::class, 'add_post']);
Route::get('/show_post',[AdminController::class, 'show_post'])->name('post.show');
Route::get('/edit_post/{id}',[AdminController::class, 'edit'])->name('post.edit');
Route::post('/update/{id}',[AdminController::class, 'update'])->name('post.update');
Route::get('/destroy/{id}',[AdminController::class, 'destroy'])->name('post.destroy');

// Frontend Routes
Route::get('/post_details/{id}',[HomeController::class, 'post_details'])->name('post.details');
// For User

 // Routes for Campus Management
Route::group([ 'prefix' => '/userpost' ], function(){
    Route::get('/create',[HomeController::class, 'create'])->name('userpost.create')->middleware('auth');
    Route::post('/store',[HomeController::class, 'store'])->name('userpost.store')->middleware('auth');
    Route::get('/my_post',[HomeController::class, 'my_post'])->name('userpost.my_post')->middleware('auth');
    Route::get('/edit/{id}',[HomeController::class, 'edit'])->name('userpost.edit')->middleware('auth');
    Route::post('/update/{id}',[HomeController::class, 'update'])->name('userpost.update')->middleware('auth');
    Route::get('/destroy/{id}',[HomeController::class, 'destroy'])->name('userpost.destroy')->middleware('auth');
        
});