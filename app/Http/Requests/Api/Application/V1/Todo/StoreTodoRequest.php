<?php

namespace App\Http\Requests\Api\Application\V1\Todo;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTodoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'todo_body' => ['required','max:512'],
            'is_completed' => ['required', 'bool'],
        ];
    }
}
