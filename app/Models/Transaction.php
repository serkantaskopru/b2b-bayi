<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'amount', 'description'];

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public static function createAndApply($order_id, $amount, $description)
    {
        $transaction = self::create([
            'order_id' => $order_id,
            'amount' => $amount,
            'description' => $description
        ]);

        $transaction->order->dealer->updateBalance($amount);

        return $transaction;
    }
}
