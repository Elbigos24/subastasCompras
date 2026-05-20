<?php
// ============================================================
// app/Models/product.php  — agregar relaciones
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class product extends Model
{
    use Sluggable;
    //protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'Img',
        'stock',
        'user_id',
        'slug'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(Usser::class, 'user_id');
    }

    public function subastas()
    {
        return $this->hasMany(Subasta::class, 'product_id');
    }
}
