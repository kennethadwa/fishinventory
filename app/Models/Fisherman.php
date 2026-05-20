<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fisherman extends Model
{
    protected $fillable = [
        'full_name',
        'contact_number',
        'address',
        'boat_name',
        'notes',
        'status',
    ];

    public function catches()
{
    return $this->hasMany(CatchModel::class, 'fisherman_id');
}
}
