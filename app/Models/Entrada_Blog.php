<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada_Blog extends Model
{
    //use HasFactory;

     //Indicamos el nombre de la tabla
     protected string $table = "entradas_blog";

     //Indicamos el nombre de la clave primaria
     protected string $primaryKey = "blog_id";
}
