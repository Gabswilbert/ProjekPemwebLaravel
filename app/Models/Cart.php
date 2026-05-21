<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id', 
        'product_name',
        'price',
        'quantity',
        'store_name'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
