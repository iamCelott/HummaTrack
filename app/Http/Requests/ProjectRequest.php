<?php

namespace App\Http\Requests;

use App\Enums\ProjectLevelRequirement;
use App\Enums\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('projects', 'name')->ignore($this->route('project'))],
            'start_date' => 'required|date',
            'level_requirement' => ['required', Rule::in([ProjectLevelRequirement::Junior->value, ProjectLevelRequirement::Mid->value, ProjectLevelRequirement::Senior->value, ProjectLevelRequirement::Specialist->value])],
            'status' => ['required', Rule::in(ProjectStatus::NotStarted->value, ProjectStatus::InProgress->value, ProjectStatus::Completed->value, ProjectStatus::OnHold->value)],
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama proyek harus diisi.',
            'name.string' => 'Nama proyek harus berupa teks.',
            'name.max' => 'Nama proyek tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama proyek ini sudah digunakan. Silakan pilih nama lain.',
            'start_date.required' => 'Tanggal mulai harus diisi.',
            'start_date.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'level_requirement.required' => 'Tingkatan yang diperlukan harus dipilih.',
            'level_requirement.in' => 'Tingkatan yang dipilih tidak valid. Harus salah satu dari: junior, mid, senior, atau specialist.',
            'status.required' => 'Status proyek harus dipilih.',
            'status.in' => 'Status proyek yang dipilih tidak valid. Harus salah satu dari: belum dimulai, sedang berlangsung, selesai, atau ditunda.',
            'description.string' => 'Deskripsi proyek harus berupa teks.',
        ];
    }
}
