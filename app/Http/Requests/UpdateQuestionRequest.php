<?php

namespace App\Http\Requests;

use App\Rules\Year;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'exam_id'=>['required','exists:exams,id'],
            'question_text' => ['required', 'string'], 
            'description' => ['required', 'string'], 
            'summary' => ['required', 'string'], 
            'answer_a' => ['required', 'string'], 
            'answer_b' => ['required', 'string'], 
            'answer_c' => ['required', 'string'], 
            'answer_d' => ['required', 'string'], 
            'answer_e' => ['required', 'string'], 
            'img'     => 'nullable|max:5000',

        ];
    }
}
