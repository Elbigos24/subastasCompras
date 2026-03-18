<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model
{
    protected $table='subastas';
    protected $fillable=[
        'product_id',
        'start_time',
        'end_time',
        'status',
    ];
}
