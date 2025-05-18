<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasApiTokens;

    protected $guarded = ['id'];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $thos->hasMany(OrderItem::class);
    }
}
