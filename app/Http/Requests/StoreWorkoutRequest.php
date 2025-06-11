<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkoutRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'trainer' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date', 'after:now'],
            'slots' => ['required', 'integer', 'min:1'],
            'is_active' => ['boolean'],
        ];
    }
} 