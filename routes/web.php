<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/podcast', function () {
    return view('podcast');
});
Route::get('/books', function () {
    return view('books');
});
Route::get('/join', function () {
    return view('join');
});

