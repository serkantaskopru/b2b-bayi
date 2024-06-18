<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Product;

class ProductPriceMatch implements Rule
{
    protected $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function passes($attribute, $value)
    {

        $product = Product::find($this->productId);
        \Log::alert("Value: " . $value);
        \Log::alert("Product Price: " . $product->getPrice());
        if ($product) {
            return (float)$value >= (float)$product->getPrice();
        }

        return false;
    }

    public function message()
    {
        return 'Adet satış fiyatı ürün birim fiyatından düşük olamaz.';
    }
}
