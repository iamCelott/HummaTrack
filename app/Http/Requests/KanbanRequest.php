<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KanbanRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('kanbans', 'name')->ignore($this->route('kanban'))],
            'project_id' => 'required|exists:projects,id',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama kanban wajib diisi.',
            'name.unique' => 'Nama kanban sudah digunakan, silakan pilih nama lain.',
            'name.max' => 'Nama kanban tidak boleh lebih dari 255 karakter.',
            'project_id.required' => 'Proyek wajib diisi.',
            'project_id.exists' => 'Proyek tidak valid.',
            'description.string' => 'Deskripsi harus berupa teks.',
        ];
    }
}
