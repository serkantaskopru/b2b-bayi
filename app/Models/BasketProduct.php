<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'basket_id',
        'product_id',
        'piece',
        'price',
        'description',
        'order_note',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function basket(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Basket::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getSubTotal(): float|int
    {
        return $this->piece * $this->price;
    }

    public function getProductSubTotal(): float|int
    {
        return $this->piece * $this->product->getPrice();
    }

    public function dealerCommission(): float|int
    {
        return $this->getSubTotal() - $this->getProductSubTotal();
    }

    public function firmCommission(): float|int
    {
        return $this->getProductSubTotal();
    }
}
