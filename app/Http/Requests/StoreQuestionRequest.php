<?php

namespace App\Http\Requests;

use App\Rules\Year;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'chapter_id'=>['required','exists:chapters,id'],

            'question_text' => ['required', 'string'], 
            'description' => ['required', 'string'], 
            'summary' => ['required', 'string'], 
            
            'answer_a' => ['required', 'string'], 
            'answer_b' => ['required', 'string'], 
            'answer_c' => ['required', 'string'], 
            'answer_d' => ['required', 'string'], 
            'answer_e' => ['required', 'string'], 
            
            'correct_answer' => ['required', 'string', 'in:answer_a,answer_b,answer_c,answer_d,answer_e'],

            // 'img' => ['nullable', 'image', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,tiff,tif,ico', 'max:9000'],
            'img'     => 'required|max:5000',

            'free_trial' => ['required', 'in:1,0'], 
            'year' => ['required', 'digits:4', 'integer', new Year()],

        ];
    }
}
