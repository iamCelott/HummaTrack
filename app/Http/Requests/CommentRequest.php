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
            'reply_to' => 'required|exists:comments,id',
            'content' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'task_id.required' => 'Task harus dipilih.',
            'task_id.exists' => 'Task yang dipilih tidak valid.',
            'user_id.required' => 'User harus dipilih.',
            'user_id.exists' => 'User yang dipilih tidak valid.',
            'reply_to.required' => 'Komentar yang direply harus dipilih.',
            'reply_to.exists' => 'Komentar yang direply tidak valid.',
            'content.required' => 'Konten tidak boleh kosong.',
            'content.string' => 'Konten harus berupa teks.',
            'content.max' => 'Konten tidak boleh lebih dari 255 karakter.',
        ];
    }
}
