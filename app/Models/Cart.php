<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
        'user_id',
        'product_variant_id'
    ];

    public function product_variant(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
    }
}
