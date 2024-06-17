<?php

namespace App\Http\Requests\App\Personnel;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonnelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'password' => ['required', 'confirmed', 'min:6'],
            'email' => ['required', 'unique:users,email'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.string' => 'İsim alanı bir metin olmalıdır.',
            'name.required' => 'İsim alanı zorunludur.',
        ];
    }
}
