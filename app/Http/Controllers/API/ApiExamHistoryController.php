<?php

namespace App\Http\Controllers\API;

use App\Models\ExamHistory;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiExamHistoryService;
use App\Http\Requests\Api\UpdateApiExamHistoryRequest;
use App\Http\Resources\Api\ExamHistory\ExamHistoryResource;

class ApiExamHistoryController extends Controller
{


    public function index($examSessionId)
    {

        try {
            $examHistories = ExamHistory::where('exam_session_id', $examSessionId)->paginate(self::PAGINATE);
            $examHistories = ExamHistoryResource::collection($examHistories);
            return $this->apiResponse->success($examHistories, 'exam Histories fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
    }

    public function getTotalDegreeExamHistories($examSessionId)
    {
        try {
            $result = ApiExamHistoryService::getInstance()->getTotalDegreeExamHistories($examSessionId);
            return $this->apiResponse->success($result, 'result Histories fetched successfully');
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
    }

    public function update(ExamHistory $examHistorie, UpdateApiExamHistoryRequest $request)
    {
        try {
            $examHistorie->update($request->validated());

            return $this->apiResponse->success(new ExamHistoryResource($examHistorie), 'exam Historie  update successfully.', 201);
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
    }

    // public function store(StoreApiExamSessionRequest $request)
    // {
    //     return StoreApiExamSessionService::getInstance()->handle($request->validated(), $this->apiResponse);
    // }


    // public function show(ExamSession $examSession)
    // {
    //     $questions = [];

    //     // Loop over each exam in the session and fetch questions related to that exam
    //     foreach ($examSession->exams as $exam) {
    //         // Fetch questions for the current exam
    //         $examQuestions = Question::where('exam_id', $exam)
    //             ->take($examSession->question_count) // Limit the number of questions fetched
    //             ->get();
    //         // Convert the questions into resources and add to the questions array
    //         $questions[] = QuestionResource::collection($examQuestions);
    //     }

    //     return $this->apiResponse->success($questions, 'questions fetched successfully');
    // }
}
