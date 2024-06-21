<?php

namespace App\Http\Requests\App\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'payment_method' => ['required', 'between:0,3'], // Custom Rule Must Be Type
            'cargo_firm' => ['required', 'between:0,1'], // Custom Rule Must Be Type
            'customer_name' => ['string','required'],
            'customer_mail' => ['email','required'],
            'customer_phone' => ['string','required'],
            'customer_address' => ['string','required','max:1024'],
            'gift_message' => ['string','max:1024'],
            'is_abroad' => ['numeric','between:0,1'],
            'invoice_send' => ['numeric','between:0,1'],
            'city' => ['exists:geozone_cities,id'],
            'county' => ['exists:geozone_counties,id'],
            'district' => ['exists:geozone_districts,id'],
            'neighbourhood' => ['exists:geozone_neighbourhoods,id'],
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
            'payment_method.required' => 'Ödeme yöntemi alanı gereklidir.',
            'payment_method.between' => 'Geçersiz ödeme yöntemi seçildi. Lütfen geçerli bir yöntem seçin: kapida_odeme, kredi_karti, hesabima_havale, firmaya_havale.',

            'cargo_firm.required' => 'Kargo firması alanı gereklidir.',
            'cargo_firm.between' => 'Geçersiz kargo firması seçildi. Lütfen geçerli bir firma seçin: yurtici, ptt.',

            'customer_name.required' => 'Müşteri adı alanı gereklidir.',
            'customer_name.string' => 'Müşteri adı yalnızca harflerden oluşmalıdır.',

            'customer_mail.required' => 'Müşteri e-posta alanı gereklidir.',
            'customer_mail.email' => 'Geçerli bir e-posta adresi giriniz.',

            'customer_phone.required' => 'Müşteri telefon numarası alanı gereklidir.',
            'customer_phone.string' => 'Müşteri telefon numarası geçerli bir formatta olmalıdır.',

            'customer_address.required' => 'Müşteri adresi alanı gereklidir.',
            'customer_address.string' => 'Müşteri adresi geçerli bir formatta olmalıdır.',
            'customer_address.max' => 'Müşteri adresi en fazla 1024 karakter olabilir.',

            'gift_message.string' => 'Hediye mesajı geçerli bir formatta olmalıdır.',
            'gift_message.max' => 'Hediye mesajı en fazla 1024 karakter olabilir.',

            'is_abroad.numeric' => 'Yurtdışı alanı yalnızca sayı olmalıdır.',
            'is_abroad.between' => 'Yurtdışı alanı 0 veya 1 olmalıdır.',

            'invoice_send.numeric' => 'Fatura gönderim alanı yalnızca sayı olmalıdır.',
            'invoice_send.between' => 'Fatura gönderim alanı 0 veya 1 olmalıdır.',

            'city.exists' => 'Seçilen şehir geçersiz.',
            'county.exists' => 'Seçilen ilçe geçersiz.',
            'district.exists' => 'Seçilen mahalle geçersiz.',
            'neighbourhood.exists' => 'Seçilen semt geçersiz.',
        ];
    }
}
