<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'parent_id' => 'required|exists:parents,id',
            'content' => ['nullable', 'string', 'max:255'],
        ];

    }

    public function messages()
    {
        return [
            'task_id.required' => 'Task harus dipilih.',
            'task_id.exists' => 'Task yang dipilih tidak valid.',
            'user_id.required' => 'User harus dipilih.',
            'user_id.exists' => 'User yang dipilih tidak valid.',
            'parent_id.required' => 'Parent harus dipilih.',
            'parent_id.exists' => 'Parent yang dipilih tidak valid.',
            'content.string' => 'Konten harus berupa teks.',
            'content.max' => 'Konten tidak boleh lebih dari 255 karakter.',
        ];
    }

}
