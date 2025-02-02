<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePricingPlanRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'period_count' => 'required|integer|min:1',
            'period_type' => 'required|in:weeks,months',
            'status' => 'required|in:soon,active',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'free_trial' => 'required|boolean',
            'subject_id'=>'required|numeric|exists:subjects,id'
        ];
    }
}
