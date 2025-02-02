<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use App\Models\ExamSession;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiExamSessionService;
use App\Http\Requests\Api\StoreApiExamSessionRequest;
use App\Http\Resources\Api\Questshion\QuestionResource;

class ApiExamSessionController extends Controller
{


    public function index()
    {
        try {
            $examSessions = ExamSession::with('examHistories')->where('user_id', auth()->user()->id)->paginate(self::PAGINATE);
            return $this->apiResponse->success($examSessions, 'Exams fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
    }



    public function store(StoreApiExamSessionRequest $request)
    {
        return ApiExamSessionService::getInstance()->handle($request->validated(), $this->apiResponse);
    }


    public function show(ExamSession $examSession)
    {
        $questions = [];

        // Loop over each exam in the session and fetch questions related to that exam
        foreach ($examSession->exams as $exam) {
            // Fetch questions for the current exam
            $examQuestions = Question::where('exam_id', $exam)
                ->take($examSession->question_count) // Limit the number of questions fetched
                ->get();
            // Convert the questions into resources and add to the questions array
            $questions[] = QuestionResource::collection($examQuestions);
        }

        return $this->apiResponse->success($questions, 'questions fetched successfully');
    }
}
