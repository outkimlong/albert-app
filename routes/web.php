<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;  

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
    Route::resource('quizzes', QuizController::class);

    Route::get('quizzes/{quiz}/questions/create', [QuestionController::class, 'create'])
        ->name('questions.create');

    Route::post('quizzes/{quiz}/questions', [QuestionController::class, 'store'])
        ->name('questions.store');

    Route::get('questions/{question}/edit', [QuestionController::class, 'edit'])
        ->name('questions.edit');

    Route::put('questions/{question}', [QuestionController::class, 'update'])
        ->name('questions.update');

    Route::delete('questions/{question}', [QuestionController::class, 'destroy'])
        ->name('questions.destroy');
});

require __DIR__.'/auth.php';
