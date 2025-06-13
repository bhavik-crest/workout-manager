<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkoutRequest extends FormRequest
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
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'required', 'string'],
            'trainer' => ['sometimes', 'required', 'string', 'max:255'],
            'date' => ['sometimes', 'required', 'date', 'after:now'],
            'slots' => ['sometimes', 'required', 'integer', 'min:1'],
            'is_active' => ['sometimes', 'required', 'boolean'],
        ];
    }
} 