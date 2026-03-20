<?php
// ============================================================
// app/Models/Puja.php
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model
{
    protected $table = 'pujass';
    protected $fillable = [
        'user_id', 'subasta_id', 'amount', 'price', 'date_hour',
    ];

    public function user()
    {
        return $this->belongsTo(Usser::class, 'user_id');
    }

    public function subasta()
    {
        return $this->belongsTo(Subasta::class, 'subasta_id');
    }
}
