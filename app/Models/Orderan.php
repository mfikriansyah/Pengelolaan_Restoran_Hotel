<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderan extends Model
{
    use HasFactory;
    // public function hidangan()
    // {
    //     return $this->hasMany(Hidangan::class, 'hidangan_id', 'id');
    // }
    public function latestOrder()
    {
        return $this->hasOne(Order::class, 'hidangan_id', 'id')->latestOfMany();
    }
}
