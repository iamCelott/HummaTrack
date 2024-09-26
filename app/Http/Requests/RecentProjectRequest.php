<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecentProjectRequest extends FormRequest
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
            'project_id' => 'required|exists:projects,id',
        ];
    }

    public function messages(): array
    {
        return [
            'project_id.required' => 'ID proyek harus disertakan.',
            'project_id.exists' => 'Proyek yang dipilih tidak valid atau tidak ditemukan.',
        ];
    }
}
