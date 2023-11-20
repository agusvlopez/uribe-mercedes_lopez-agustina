<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Recetario
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property string|null $cover
 * @property string|null $cover_description
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
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recetario whereCoverDescription($value)
 * @mixin \Eloquent
 */
class Recetario extends Model
{
    //use HasFactory;

    //Indicamos el nombre de la tabla
    protected $table = "recetarios";

    //Indicamos el nombre de la clave primaria
    protected $primaryKey = "id";

    protected $fillable = ['title', 'description', 'price', 'cover', 'cover_description'];

    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric'

    ];

    public static $errorMessages = [
        'title.required' => 'El titulo no puede estar vacío.',
        'description.required' => 'La descripción no puede estar vacía.',
        'price.required' => 'El precio no puede estar vacío.',
        'price.numeric' => 'El precio debe ser numérico.'
    ];

        /**
    * Esta funcion devuelve las primeras 10 palabras de un parrafo
    * @param int $cantidad Esta es la cantidad de palabras a reducir (opcional)
    * @return string La cantidad de palabras solicitadas con ... al final
    */
    public function recortar_descripcion(int $cantidad = 30):string
    {
        $texto = $this->description;

        $array = explode(" ",$texto);
        if(count($array)<= $cantidad) {
            $resultado = $texto;
        }else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array)."...";
        }
        return $resultado;

    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_tiene_recetarios',
           'user_id',
           'recetario_id'
        );
    }
}
