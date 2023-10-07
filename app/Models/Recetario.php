<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recetario extends Model
{
    //use HasFactory;

    //Indicamos el nombre de la tabla
    protected string $table = "recetarios";

    //Indicamos el nombre de la clave primaria
    protected string $primaryKey = "id";
}
