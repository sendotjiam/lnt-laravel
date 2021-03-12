<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/view', function() {
        return view('view');
    });
    Route::middleware('admin')->group(function () {
        Route::get('/admin', function() {
            return view('admin');
        });
    });
    Route::get('/send-mail', [App\Http\Controllers\HomeController::class, 'sendMail'])->name('send.mail');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
