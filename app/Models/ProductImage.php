<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $image_path
 */
class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
      'product_id',
      'image_path'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getSrc(): string
    {
        if(str_starts_with($this->image_path, 'http'))
            return $this->image_path;

        return '/storage/' . $this->image_path;
    }
}
