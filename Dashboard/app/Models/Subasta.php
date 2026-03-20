<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model
{
    protected $table = 'subastas';
    protected $fillable = [
        'product_id', 'start_time', 'end_time', 'status',
    ];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function pujas()
    {
        return $this->hasMany(Puja::class, 'subasta_id');
    }
}
