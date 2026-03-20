<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable = [
        'user_id', 'amount',
    ];

    public function user()
    {
        return $this->belongsTo(Usser::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(CompraItem::class, 'compra_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'compra_id');
    }
}
