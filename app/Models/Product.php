<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens;
    protected $guarded = ['id'];

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}


