<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
});

Route::get('/kategorie', function () {
    return view('kategorie');
});

Route::get('/quiz/bajki', function () {
    return view('bajki');
});

Route::get('/quiz/kraj', function () {
    return view('kraj');
});

Route::get('/quiz/marki', function () {
    return view('marki');
});