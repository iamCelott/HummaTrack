<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('teams', 'name')->ignore($this->route('user'))],
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tim wajib diisi.',
            'name.string' => 'Nama tim harus berupa teks.',
            'name.max' => 'Nama tim tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama tim ini sudah terdaftar, silakan gunakan nama yang lain.',
            'description.string' => 'Deskripsi harus berupa teks.',
        ];
    }
}
