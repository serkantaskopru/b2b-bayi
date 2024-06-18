<?php

namespace App\Http\Requests\App\Basket;

use App\Rules\ProductPriceMatch;
use App\Rules\ProductStockAvailable;
use App\Rules\StockAvailable;
use Illuminate\Foundation\Http\FormRequest;

class CreateBasketRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'piece' => [
                'required',
                'min:1',
                new ProductStockAvailable($this->product_id),
            ],
            'price' => [
                'required',
                'numeric',
                new ProductPriceMatch($this->product_id),
            ],
            'description' => ['string'],
            'order_note' => ['string'],
            'images' => ['array'],
            'images.*' => ['image'],
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
            'product_id.required' => 'Ürün kodu zorunludur',
            'product_id.exists' => 'Ürün bulunamadı.',
            'piece.required' => 'Ürün adeti girilmesi zorunludur.',
            'piece.min' => 'Ürün adeti en az 1 olmalıdır.',
            'description.string' => 'Açıklama alanı yazı türünde olmalıdır.',
            'order_note.string' => 'Sipariş notu alanı yazı türünde olmalıdır.',
            'images.array' => 'Görseller alanı bir dizi olmalıdır.',
            'images.*.image' => 'Yüklenen her bir dosya bir görsel olmalıdır.',
            'piece.stock_available' => 'Ürün stokta yeterli miktarda yoktur.',
            'price.required' => 'Fiyat girilmesi zorunludur.',
            'price.numeric' => 'Fiyat alanı sayısal bir değer olmalıdır.',
            'price.price_match' => 'Ürün fiyatı, belirtilen fiyattan düşük olamaz.',
        ];
    }
}
