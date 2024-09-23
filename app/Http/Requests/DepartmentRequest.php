<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class DepartmentRequest extends FormRequest
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
                'name' => ['required', 'string', Rule::unique('departments', 'name')->ignore($this->route('department'))],
                'description' => 'nullable|string',
            ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama divisi wajib diisi.',
            'name.unique' => 'Nama divisi sudah digunakan, silakan pilih nama lain.',
            'description.string' => 'Deskripsi harus berupa teks.',
        ];
    }
}
