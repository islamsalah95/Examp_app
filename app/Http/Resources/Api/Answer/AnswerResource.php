<?php
namespace App\Http\Resources\Api\Answer;


use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
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
            "answer_text" => $this->answer_text,
            "description" => $this->description,
            "is_correct" => $this->is_correct,
            "question_id" => $this->question_id,
            "img" => $this->getFirstMediaUrl('answers'),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
