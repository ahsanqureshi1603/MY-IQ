<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\QuestionsController;
use App\Models\Subject;

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
    return view('/pages/home');
});

Route::get('/gmat', function () {
    return view('/pages/gmatPage');
});

Route::get('/practice', function () {
    return view('practice');
});

Route::get('/dummy_test', function () {
    return view('dummy_test');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $verbalSubjectQuestions = Subject::where('category', 'verbal')
        ->get()
        ->toArray();

    $mathSubjectQuestions = Subject::where('category', 'math')
        ->get()
        ->toArray();

    return view('practice', compact('verbalSubjectQuestions', 'mathSubjectQuestions'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/practice-dashboard', [TestsController::class, 'prePracticeTestStart']);

    Route::get('/pre-test-start/{testType}', [TestsController::class, 'preTestStart']);
    Route::post('/start-test', [TestsController::class, 'firstQuestion']);
    Route::post('/next-question/{testType}', [TestsController::class, 'submitAndNextQuestion']);
    Route::get('/pause-test/{testType}/{testId}', [TestsController::class, 'goToPause']);
    Route::get('/unpause-test/{testId}', [TestsController::class, 'goToUnPause']);
    Route::get('/test/{testType}/{testId}', [TestsController::class, 'getCurrentQuestionOfTest']);
    Route::get('/end-exam/{testType}/{testId}', [TestsController::class, 'endTest']);
    Route::get('/pause-exam/{testType}/{testId}', [TestsController::class, 'pauseTest']);

    Route::get('/admin/questions', [QuestionsController::class, 'index'])->name('list');
    Route::get('/admin/add-question', [QuestionsController::class, 'add']);
    Route::post('/admin/add-question', [QuestionsController::class, 'create']);
    Route::get('/admin/edit-question/{question}', [QuestionsController::class, 'edit']);
    Route::post('/admin/edit-question/{question}', [QuestionsController::class, 'update']);
    Route::post('/admin/delete-question/{question}', [QuestionsController::class, 'delete']);

    Route::post('/start-practice-test', [TestsController::class, 'firstPracticeQuestion']);
});
Route::post('/update-timer/{testType}', [TestsController::class, 'updateTestTimer']);
Route::post('/submit-practice-test', [TestsController::class, 'submitPracticeTestResponse']);

Route::get('/test-reports', [TestsReportController::class, 'testReports']);
