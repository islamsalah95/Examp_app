<?php
namespace App\Http\Resources\Api\ExamHistory;


use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Answer\AnswerResource;
use App\Http\Resources\Api\Questshion\QuestionResource;

class ExamHistoryResource  extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            'question'=>  new QuestionResource($this->examQuestion),
            'answer'=> $this->examAnswer ? new AnswerResource($this->examAnswer) :  null ,
        ];
    }
}
