<?php

namespace App\Http\Requests\App\Setting;

use App\Rules\ProductPriceMatch;
use App\Rules\ProductStockAvailable;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        if(!empty($this->input('act')) && $this->input('act') == 'opencart'){
            $this->merge([
                'opencart_products' => $this->input('opencart_products', 0),
                'opencart_product_options' => $this->input('opencart_product_options', 0),
                'opencart_categories' => $this->input('opencart_categories', 0),
                'opencart_send_notification' => $this->input('opencart_send_notification', 0),
                'opencart_send_sms' => $this->input('opencart_send_sms', 0),
                'opencart_send_mail' => $this->input('opencart_send_mail', 0),
                'opencart_order_stock_update' => $this->input('opencart_order_stock_update', 0),
                'opencart_order_send_sms' => $this->input('opencart_order_send_sms', 0),
                'opencart_order_send_email' => $this->input('opencart_order_send_email', 0),
                'opencart_transfer_type' => $this->input('opencart_transfer_type', 1),
            ]);
        }
        if(!empty($this->input('act')) && $this->input('act') == 'notification'){
            $this->merge([
                'order_send_admin_notification' => $this->input('order_send_admin_notification', 0),
                'order_send_personnel_notification' => $this->input('order_send_personnel_notification', 0)
            ]);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'netgsm_username' => 'nullable|string|max:255',
            'netgsm_password' => 'nullable|string|max:255',
            'yurtici_username' => 'nullable|string|max:255',
            'yurtici_password' => 'nullable|string|max:255',
            'yurtici_tahsilat_username' => 'nullable|string|max:255',
            'yurtici_tahsilat_password' => 'nullable|string|max:255',
            'ptt_username' => 'nullable|string|max:255',
            'ptt_password' => 'nullable|string|max:255',
            'bizimhesap_api_key' => 'nullable|string|max:255',
            'opencart_url' => 'nullable|url',
            'opencart_username' => 'nullable|string|max:255',
            'opencart_password' => 'nullable|string|max:255',
            'paytr_merchant_id' => 'nullable|string|max:255',
            'paytr_merchant_key' => 'nullable|string|max:255',
            'paytr_merchant_salt' => 'nullable|string|max:255',
            'bank_account_info' => 'nullable|string',
            'opencart_products' => 'boolean',
            'opencart_product_options' => 'boolean',
            'opencart_categories' => 'boolean',
            'opencart_transfer_type' => 'in:1,2',
            'opencart_send_notification' => 'boolean',
            'opencart_send_sms' => 'boolean',
            'opencart_send_mail' => 'boolean',
            'opencart_order_stock_update' => 'boolean',
            'opencart_order_send_sms' => 'boolean',
            'opencart_order_send_email' => 'boolean',
            'order_send_admin_notification' => 'boolean',
            'order_send_personnel_notification' => 'boolean',
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
            'netgsm_username.max' => 'Net Gsm Kullanıcı adı en fazla 255 karakter olmalıdır.',
            'netgsm_password.max' => 'Net Gsm Şifre en fazla 255 karakter olmalıdır.',
            'yurtici_username.max' => 'Yurtiçi Kargo Kullanıcı Adı en fazla 255 karakter olmalıdır.',
            'yurtici_password.max' => 'Yurtiçi Kargo Kullanıcı Şifre en fazla 255 karakter olmalıdır.',
            'yurtici_tahsilat_username.max' => 'Yurtiçi Kargo Tahsilatlı Kullanıcı Adı en fazla 255 karakter olmalıdır.',
            'yurtici_tahsilat_password.max' => 'Yurtiçi Kargo Tahsilatlı Kullanıcı Şifre en fazla 255 karakter olmalıdır.',
            'ptt_username.max' => 'PTT Kargo Müşteri Numarası en fazla 255 karakter olmalıdır.',
            'ptt_password.max' => 'PTT Kargo Kullanıcı Şifre en fazla 255 karakter olmalıdır.',
            'bizimhesap_api_key.max' => 'Bizimhesap Api Anahtarı en fazla 255 karakter olmalıdır.',
            'opencart_url.url' => 'API URL geçerli bir URL olmalıdır.',
            'opencart_username.max' => 'Opencart Kullanıcı adı en fazla 255 karakter olmalıdır.',
            'opencart_password.max' => 'Opencart Şifre en fazla 255 karakter olmalıdır.',
            'paytr_merchant_id.max' => 'PayTR Mağaza No en fazla 255 karakter olmalıdır.',
            'paytr_merchant_key.max' => 'PayTR Mağaza Parola en fazla 255 karakter olmalıdır.',
            'paytr_merchant_salt.max' => 'PayTR Mağaza Gizli Anahtar en fazla 255 karakter olmalıdır.',
            'bank_account_info.string' => 'Banka Hesap Bilgileri geçerli bir metin olmalıdır.',
            'opencart_products.boolean' => 'Ürünleri aktar geçerli bir değer olmalıdır.',
            'opencart_product_options.boolean' => 'Ürün Seçeneklerini aktar geçerli bir değer olmalıdır.',
            'opencart_categories.boolean' => 'Kategorileri aktar geçerli bir değer olmalıdır.',
            'opencart_transfer_type.in' => 'Opencart transfer tipi sadece 1 veya 2 olabilir.',
            'opencart_send_notification.boolean' => 'Bildirim Gönder geçerli bir değer olmalıdır.',
            'opencart_send_sms.boolean' => 'SMS Gönder geçerli bir değer olmalıdır.',
            'opencart_send_mail.boolean' => 'Email Gönder geçerli bir değer olmalıdır.',
            'opencart_order_stock_update.boolean' => 'Ürün stoğunu opencartta eşzamanlı düş geçerli bir değer olmalıdır.',
            'opencart_order_send_sms.boolean' => 'Sipariş SMS Gönder geçerli bir değer olmalıdır.',
            'opencart_order_send_email.boolean' => 'Sipariş Email Gönder geçerli bir değer olmalıdır.',
            'order_send_admin_notification.boolean' => 'Sipariş Yönetici bildirim alanı geçerli bir değer olmalıdır.',
            'order_send_personnel_notification.boolean' => 'Sipariş Personel bildirim alanı geçerli bir değer olmalıdır.',
        ];
    }

}
