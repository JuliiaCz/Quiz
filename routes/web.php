<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\CheckPlayerName;

Route::get('/', function () {
    return view('start');
});

Route::middleware([CheckPlayerName::class])->group(function () {
    Route::get('/kategorie', [QuizController::class, 'kategorie']);
    Route::get('/quiz/bajki', [QuizController::class, 'bajki']);
    Route::get('/quiz/kraj', [QuizController::class, 'kraj']);
    Route::get('/quiz/marki', [QuizController::class, 'marki']);
    Route::post('/quiz/bajki/odpowiedz', [QuizController::class, 'sprawdzBajke']);
    Route::post('/quiz/bajki/nastepne', [QuizController::class, 'nastepnaBajka']);
    Route::post('/quiz/bajki/nowa', [QuizController::class, 'nowaGraBajki']);
});

Route::post('/gracz', [QuizController::class, 'zapiszGracza']);