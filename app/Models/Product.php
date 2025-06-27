<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens, HasFactory;
    protected $guarded = ['id'];

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}


