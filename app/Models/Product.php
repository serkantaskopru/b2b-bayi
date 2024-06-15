<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property bool $tax_include
 * @property double $price
 * @property integer $tax_rate
 * @property string $image
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

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'category_products');
    }

    public function getPrice(): float|int
    {
        if($this->tax_include)
            return $this->price;

        return $this->price * (100 / $this->tax_rate);
    }

    public function getImage(): string
    {
        return '/storage/' . $this->image;
    }
}
