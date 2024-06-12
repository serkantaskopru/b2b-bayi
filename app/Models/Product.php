<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $tax_include
 * @property mixed $price
 * @property mixed $tax_rate
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'model',
        'name',
        'status',
        'tax_include',
        'tax_rate',
        'desi',
        'stock',
        'shipping_include',
        'description',
        'category_name',
        'manufacturer',
        'image',
        'image_source',
        'category_id',
        'price',
        'buy_price',
        'sell_price',
    ];

    public function getPrice(){
        if($this->tax_include)
            return $this->price;

        return $this->price * (100 / $this->tax_rate);
    }
}
