<?php

namespace App\Http\Controllers\API;

use App\Models\ExamHistory;
use App\Http\Controllers\Controller;
use App\Services\Api\ApiExamHistoryService;
use App\Services\Api\ApiExamSessionService;
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

            ApiExamSessionService::getInstance()->updateStatus($examHistorie->exam_session_id);

            return $this->apiResponse->success(new ExamHistoryResource($examHistorie), 'exam Historie  update successfully.', 201);
        } catch (\Exception $e) {
            return $this->apiResponse->serverError($e->getMessage());
        }
    }


}
