<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
})->name('landing.page');

Route::get('/login', function () {
    return view('authentication');
})->name('login');

Route::get('/assessment', function () {
    return view('assessment');
})->name('assessment');

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin_panel');
    })->name('admin.panel');
});
