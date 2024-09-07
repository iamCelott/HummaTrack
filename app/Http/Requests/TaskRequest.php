<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|unique:tasks,name',
            'kanban_id' => ['required', 'integer', 'exists:kanbans,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'status' => ['required', 'in:to_do,in_progress,done'],
            'description' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'Nama tugas wajib diisi.',
        'name.unique' => 'Nama tugas sudah ada, silakan pilih nama lain.',

        'kanban_id.required' => 'Kanban ID wajib diisi.',
        'kanban_id.integer' => 'Kanban ID harus berupa angka.',
        'kanban_id.exists' => 'Kanban ID yang dipilih tidak valid.',

        'user_id.required' => 'User ID wajib diisi.',
        'user_id.integer' => 'User ID harus berupa angka.',
        'user_id.exists' => 'User ID yang dipilih tidak valid.',

        'status.required' => 'Status tugas wajib diisi.',
        'status.in' => 'Status tugas tidak valid. Pilih salah satu dari: to_do, in_progress, atau done.',

        'description.string' => 'Deskripsi harus berupa teks.',
        'description.max' => 'Deskripsi tidak boleh lebih dari 255 karakter.',
    ];
}

}
