<?php
namespace App\Http\Requests\Api;


use Illuminate\Foundation\Http\FormRequest;

class StoreApiExamSessionRequest extends FormRequest
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
            'mood_id' => ['required', 'integer', 'exists:moods,id'],
            'subject_id' => ['required', 'integer', 'exists:subjects,id'],
            'chapters' => ['required', 'array'], // JSON array
            'chapters.*' => ['integer', 'exists:chapters,id'], // Each item must be an existing chapter ID
            'exams' => ['required', 'array'], // JSON array
            'exams.*' => ['integer', 'exists:exams,id'], // Each exam must exist
            'question_count' => ['required', 'integer', 'min:1'], // Must be at least 1 question
        ];
    }
}
