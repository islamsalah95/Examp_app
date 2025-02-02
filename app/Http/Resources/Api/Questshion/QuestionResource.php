<?php
namespace App\Http\Resources\Api\Questshion;


use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Answer\AnswerResource;

class QuestionResource extends JsonResource
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
            "question_text" => $this->question_text,
            "description" => $this->description,
            "summary" => $this->summary,
            "answers" =>  AnswerResource::collection($this->answers),
            "img" => $this->getFirstMediaUrl('questions'),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
