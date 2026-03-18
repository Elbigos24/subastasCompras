<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model
{
    protected $table='pujas';
    protected $fillable=[
        'subasta_id',
        'user_id',
        'amount',
        'day_hour'
    ];
}
