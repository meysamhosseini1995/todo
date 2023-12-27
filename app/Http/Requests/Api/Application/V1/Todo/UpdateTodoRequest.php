<?php

namespace App\Http\Requests\Api\Application\V1\Todo;

use App\Models\Todo;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //    public function authorize(): bool
    //    {
    //        return $this->user()->can('update',Todo::query()->findOrFail($this->route('todo')));
    //    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'todo_body' => ['required', 'max:512'],
            'is_completed' => ['required', 'bool'],
        ];
    }
}
