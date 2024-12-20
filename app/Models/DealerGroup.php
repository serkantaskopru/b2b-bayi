<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerGroup extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'discount'
    ];

    public function dealers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Dealer::class, 'dealer_group_id');
    }
}
