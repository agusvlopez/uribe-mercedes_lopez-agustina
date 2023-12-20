<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $primaryKey = 'compra_id';

    protected $fillable = [
        'user_id',
        'recetario_id',
        'recetario_title',
        'recetario_price',
        'cantidad',
    ];

    public function recetario()
    {
        return $this->belongsTo(Recetario::class, 'recetario_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
