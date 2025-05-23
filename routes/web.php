<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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


Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');
    // Route::get('/users', function () {
    // return view('pages.users.index');
    // })->name('users');
    Route::resource('users', UserController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
});


// Route::get('/', function () {
//     return view('pages.auth.login');
// })->name('login');
// Route::get('/', function () {
//     return view('pages.auth.register');
// })->name('register');
// Route::get('/users', function () {
//     return view('pages.users.index');
// });
