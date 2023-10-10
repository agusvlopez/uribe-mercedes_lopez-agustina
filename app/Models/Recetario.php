<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Recetario
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Recetario extends Model
{
    //use HasFactory;

    //Indicamos el nombre de la tabla
    protected $table = "recetarios";

    //Indicamos el nombre de la clave primaria
    protected $primaryKey = "id";
}
