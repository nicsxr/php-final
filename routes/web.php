<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('quiz', 'App\Http\Controllers\QuizController');
    Route::resource('question', 'App\Http\Controllers\QuestionController');
    Route::get('/question/create/{quiz_id}', [QuestionController::class, 'create'])->name('question.create');

    Route::get('/quizstart/{id}', [QuizController::class, 'quiz'])->name('quiz.quiz');
    Route::post('/question/check', [QuizController::class, 'questionCheck'])->name('quiz.questionCheck');
});


require __DIR__.'/auth.php';
