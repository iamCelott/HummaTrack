<?php

namespace App\Http\Requests;

use App\Enums\UserLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->route('user'))],
            'phone_number' => ['required', 'string', 'max:15', Rule::unique('users', 'phone_number')->ignore($this->route('user'))],
            'password' => 'required|string|min:8|confirmed',
            'level' => ['required', Rule::in([UserLevel::Junior->value, UserLevel::Mid->value, UserLevel::Senior->value, UserLevel::Specialist->value])],
            'team_id' => 'required|exists:teams,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama pengguna wajib diisi.',
            'name.string' => 'Nama pengguna harus berupa teks.',
            'name.max' => 'Nama pengguna tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'phone_number.required' => 'Nomor telepon wajib diisi.',
            'phone_number.unique' => 'Nomor telepon ini sudah terdaftar.',
            'phone_number.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'level.required' => 'Level pengguna wajib dipilih.',
            'level.in' => 'Level yang dipilih tidak valid.',
            'team_id.required' => 'Tim wajib dipilih.',
            'team_id.exists' => 'Tim yang dipilih tidak valid.',
        ];
    }
}