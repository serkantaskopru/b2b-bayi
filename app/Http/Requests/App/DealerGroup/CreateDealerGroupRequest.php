<?php

namespace App\Http\Requests\App\DealerGroup;

use Illuminate\Foundation\Http\FormRequest;

class CreateDealerGroupRequest extends FormRequest
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
            'discount' => ['numeric', 'required', 'between:0,100'],
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
            'discount.numeric' => 'İndirim alanı sayısal olmalıdır.',
            'discount.required' => 'İndirim alanı zorunludur, boş bırakılacaksa 0 yazmalısınız.',
            'discount.between' => 'İndirim oranı 0 ila 100 arasında olabilir ',
        ];
    }
}
