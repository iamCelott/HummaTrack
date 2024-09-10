<?php

namespace App\Http\Requests;

use App\Enums\ProjectLevelRequirement;
use App\Enums\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamProjectRequest extends FormRequest
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
            'team_id' => ['required', 'integer', 'exists:teams,id'],
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'descsription' => ['nullable', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            // Pesan untuk team_id
            'team_id.required' => 'Tim harus dipilih.',
            'team_id.integer' => 'ID tim harus berupa angka.',
            'team_id.exists' => 'Tim yang dipilih tidak valid. Pastikan tim terdaftar.',

            // Pesan untuk project_id
            'project_id.required' => 'Proyek harus dipilih.',
            'project_id.integer' => 'ID proyek harus berupa angka.',
            'project_id.exists' => 'Proyek yang dipilih tidak valid. Pastikan proyek terdaftar.',

            // Pesan untuk description
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 255 karakter.',
        ];
    }
}
