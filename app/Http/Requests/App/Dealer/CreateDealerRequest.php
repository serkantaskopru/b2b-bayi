<?php

namespace App\Http\Requests\App\Dealer;

use Illuminate\Foundation\Http\FormRequest;

class CreateDealerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dealer_group_id' => ['numeric','exists:dealer_groups,id'],
            'name' => ['string', 'required'],
            'tax_office' => ['string'],
            'iban' => ['string'],
            'tax_number' => ['numeric'],
            'identity_number' => ['numeric'],
            'notes' => ['string'],
            'address' => ['string'],
            'email' => ['string'],
            'phone' => ['string'],
            'payment_date' => ['date'],
            'status' => ['numeric','between:0,9'],
            'username' => ['required', 'unique:users,id'],
            'password' => ['required', 'confirmed', 'min:6'],
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
