<?php
// ============================================================
// app/Models/product.php  — agregar relaciones
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name', 'description', 'price', 'Img', 'stock', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(Usser::class, 'user_id');
    }

    public function subastas()
    {
        return $this->hasMany(Subasta::class, 'product_id');
    }
}
