<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dealer_group_id',
        'name',
        'balance',
        'payment_date',
        'tax_office',
        'tax_number',
        'iban',
        'identity_number',
        'notes',
        'address',
        'email',
        'status',
        'phone',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DealerGroup::class, 'dealer_group_id');
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getDiscountPercentage(): int{
        if(!empty($this->group))
            return (int)$this->group->discount;
        return 0;
    }

    public function updateBalance($amount): void
    {
        $this->balance += $amount;
        $this->save();
    }
}
