<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiExamController;
use App\Http\Controllers\API\ApiMoodController;
use App\Http\Controllers\API\ApiChapterController;
use App\Http\Controllers\API\ApiSubjectController;
use App\Http\Controllers\API\ApiExamHistoryController;
use App\Http\Controllers\API\ApiExamSessionController;
use App\Http\Controllers\API\ApiSubscriptionSubjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//1 topics =>subjects
//3 chapters
//2 years //or free
//4 amount quest
//5 questshions
// confurm to questshions 

Route::middleware(['auth:sanctum'])->group(function () {

Route::get('moods', [ApiMoodController::class, 'index']);

Route::get('subjects', [ApiSubjectController::class, 'index']);

Route::get('chapters/{subject}', [ApiChapterController::class, 'index']);

Route::get('exams/{chapter}', [ApiExamController::class, 'index']);

Route::get( 'exam-sessions', [ApiExamSessionController::class, 'index']);
Route::post('exam-sessions', [ApiExamSessionController::class, 'store']);

Route::get('exam-Histories/{examSessionId}', [ApiExamHistoryController::class, 'index']);
Route::get('exam-Histories/result/{examSessionId}', [ApiExamHistoryController::class, 'getTotalDegreeExamHistories']);
Route::put('exam-Histories/examHistorie/{examHistorie}', [ApiExamHistoryController::class, 'update']);

Route::get('subscriptions/subjects', [ApiSubscriptionSubjectController::class, 'index']);

});

require __DIR__ . '/auth.php';




