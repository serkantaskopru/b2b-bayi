<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'date',
        'dealer_id',
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_mail',
        'customer_address',
        'gift_message',
        'invoice_send',
        'send_sms_to_customer',
        'is_abroad',
        'cargo_firm',
        'payment_method',
        'dealer_commission',
        'company_commission',
        'total',
        'status',
        'delivery_date',
        'cancel_date',
        'cargo_barcode',
    ];

    public function dealer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Dealer::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function getCargoFirmName(): string
    {
        return match ($this->cargo_firm){
            0 => 'Yurtiçi Kargo',
            1 => 'Ptt Kargo',
        };
    }
    public function getPaymentMethodName(): string
    {
        return match ($this->payment_method){
            0 => 'Kapıda Ödeme',
            1 => 'Kredi Kartı',
            2 => 'Bayi Hesabına',
            3 => 'Firma Hesabına',
        };
    }
}
