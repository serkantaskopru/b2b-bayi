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
        'earning',
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
}
