<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatchModel extends Model
{
    protected $table = 'catches';

    protected $fillable = [
        'fisherman_id',
        'delivery_date',
        'total_weight',
        'total_amount',
        'remarks',
        'created_by',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function fisherman()
    {
        return $this->belongsTo(Fisherman::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}