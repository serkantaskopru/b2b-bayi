<?php

namespace App\Http\Requests\App\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'status' => $this->input('status', 0),
            'tax_include' => $this->input('tax_include', 0),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'model' => ['string'],
            'name' => ['string', 'required'],
            'status' => ['numeric', 'between:0,1'],
            'tax_include' => ['numeric', 'between:0,1'],
            'tax_rate' => ['numeric', 'between:0,9999'],
            'desi' => ['numeric', 'between:0,9999'],
            'stock' => ['numeric', 'between:0,999999'],
            'shipping_include' => ['numeric', 'between:0,1'],
            'description' => ['string'],
            'category_name' => ['string'],
            'manufacturer' => ['string'],
            'image' => ['image'],
            'image_source' => ['string'],
            'category_id' => ['numeric'],
            'price' => ['required', 'numeric', 'between:0,999999.99'],
            'buy_price' => ['numeric', 'between:0,999999.99'],
            'sell_price' => ['numeric', 'between:0,999999.99'],
            'images' => ['array'],
            'images.*' => ['image'],
            'categories' => ['array'],
            'categories.*' => ['exists:product_categories,id'],
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
            'model.string' => 'Model alanı bir metin olmalıdır.',
            'name.string' => 'İsim alanı bir metin olmalıdır.',
            'name.required' => 'İsim alanı zorunludur.',
            'status.numeric' => 'Durum alanı bir sayı olmalıdır.',
            'status.between' => 'Durum alanı 0 ile 1 arasında olmalıdır.',
            'tax_include.numeric' => 'Vergi dahil alanı bir sayı olmalıdır.',
            'tax_include.between' => 'Vergi dahil alanı 0 ile 1 arasında olmalıdır.',
            'tax_rate.numeric' => 'Vergi oranı alanı bir sayı olmalıdır.',
            'tax_rate.between' => 'Vergi oranı alanı 0 ile 9999 arasında olmalıdır.',
            'desi.numeric' => 'Desi alanı bir sayı olmalıdır.',
            'desi.between' => 'Desi alanı 0 ile 9999 arasında olmalıdır.',
            'stock.numeric' => 'Stok alanı bir sayı olmalıdır.',
            'stock.between' => 'Stok alanı 0 ile 999999 arasında olmalıdır.',
            'shipping_include.numeric' => 'Kargo dahil alanı bir sayı olmalıdır.',
            'shipping_include.between' => 'Kargo dahil alanı 0 ile 1 arasında olmalıdır.',
            'description.string' => 'Açıklama alanı bir metin olmalıdır.',
            'category_name.string' => 'Kategori adı alanı bir metin olmalıdır.',
            'manufacturer.string' => 'Üretici alanı bir metin olmalıdır.',
            'image.image' => 'Yüklenen dosya bir görsel olmalıdır.',
            'image_source.string' => 'Görsel kaynağı alanı bir metin olmalıdır.',
            'category_id.numeric' => 'Kategori ID alanı bir sayı olmalıdır.',
            'price.required' => 'Fiyat alanı zorunludur.',
            'price.numeric' => 'Fiyat alanı bir sayı olmalıdır.',
            'price.between' => 'Fiyat alanı 0 ile 999999.99 arasında olmalıdır.',
            'buy_price.numeric' => 'Alış fiyatı alanı bir sayı olmalıdır.',
            'buy_price.between' => 'Alış fiyatı alanı 0 ile 999999.99 arasında olmalıdır.',
            'sell_price.numeric' => 'Satış fiyatı alanı bir sayı olmalıdır.',
            'sell_price.between' => 'Satış fiyatı alanı 0 ile 999999.99 arasında olmalıdır.',
            'images.array' => 'Görseller alanı bir dizi olmalıdır.',
            'images.*.image' => 'Yüklenen her bir dosya bir görsel olmalıdır.',
            'categories.array' => 'Kategoriler alanı bir dizi olmalıdır.',
            'categories.*.exists' => 'Seçilen bir kategori mevcut değil.',
        ];
    }
}
