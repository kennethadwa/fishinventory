<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishType extends Model
{
    protected $fillable = [
        'fish_name',
        'default_buy_price',
        'default_sell_price',
        'description',
    ];
}