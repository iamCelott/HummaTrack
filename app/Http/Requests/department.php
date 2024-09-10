<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class department extends FormRequest
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
            'photo_profile' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255',Rule::unique('departments', 'name')->ignore($this->route('department'))],
            'address' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:20',],
            'latitude' => ['nullable', 'regex:/^\d{1,2}(\.\d{1,8})?$/'],
            'longitude' => ['nullable', 'regex:/^\d{1,3}(\.\d{1,8})?$/'],
        ];
    }
}
