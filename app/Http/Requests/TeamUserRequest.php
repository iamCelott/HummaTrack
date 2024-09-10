<?php

namespace App\Http\Requests;

use App\Enums\ProjectLevelRequirement;
use App\Enums\ProjectStatus;
use App\Enums\TeamUserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamUserRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'role' => ['required', Rule::in(TeamUserRole::Leader->value, TeamUserRole::CoLeader->value, TeamUserRole::Member->value)],
        ];
    }

    public function messages(): array
    {
        return [
            // Pesan untuk team_id
            'team_id.required' => 'Tim harus dipilih.',
            'team_id.integer' => 'ID tim harus berupa angka.',
            'team_id.exists' => 'Tim yang dipilih tidak valid. Pastikan tim terdaftar.',

            // Pesan untuk user_id
            'user_id.required' => 'Pengguna harus dipilih.',
            'user_id.integer' => 'ID pengguna harus berupa angka.',
            'user_id.exists' => 'Pengguna yang dipilih tidak valid. Pastikan pengguna terdaftar.',

            // Pesan untuk role
            'role.required' => 'Peran harus dipilih.',
            'role.in' => 'Peran yang dipilih tidak valid. Pilih peran yang sesuai: Leader, Co-Leader, atau Member.',
        ];
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'role' => $this->input('role') ?? TeamUserRole::Member->value,
        ]);
    }
}
