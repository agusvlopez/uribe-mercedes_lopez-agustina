<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Entrada_Blog
 *
 * @property int $blog_id
 * * @property int $clasification_id
 * @property string $title
 * @property string $content
 * @property string $author
 * @property string|null $cover
 * @property string|null $cover_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereUpdatedAt($value)
 * @property-read \App\Models\Clasification $clasification
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereClasificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada_Blog whereCoverDescription($value)
 * @mixin \Eloquent
 */
class Entrada_Blog extends Model
{
    //use HasFactory;

     //Indicamos el nombre de la tabla
     protected $table = "entradas_blog";

     //Indicamos el nombre de la clave primaria
     protected $primaryKey = "blog_id";

    protected $fillable = ['clasification_id','title', 'content', 'author', 'updated_at', 'cover', 'cover_description'];

    public static $rules = [
        'title' => 'required|min:2',
        'content' => 'required',
        'clasification_id' => 'required|    exists:clasifications',
    ];

    public static $errorMessages = [
        'title.required' => 'El titulo no puede estar vacío.',
        'title.min' => 'El título debe tener al menos :min caracteres',
        'content.required' => 'El contenido de la entrada no puede estar vacío.',
        'clasification_id.required' => 'La clasificación de la entrada no puede estar vacía.',
        'clasification_id.exists' => 'El valor de la clasificación no es válido.',
    ];

    //Relaciones

    public function clasification(): BelongsTo
    {
        return $this->belongsTo(Clasification::class, 'clasification_id', 'clasification_id');
    }

    /**
    * Cambiar el formato de fecha al mostrarlo
    */
    public function getUpdatedAtAttribute($value)
    {
         return Carbon::parse($value)->format('d/m/Y');
    }


    /**
    * Esta funcion devuelve las primeras 10 palabras de un parrafo
    * @param int $cantidad Esta es la cantidad de palabras a reducir (opcional)
    * @return string La cantidad de palabras solicitadas con ... al final
    */
    public function recortar_descripcion(int $cantidad = 30):string {
        $texto = $this->content;

        $array = explode(" ",$texto);
        if(count($array)<= $cantidad) {
            $resultado = $texto;
        }else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array)."...";
        }
        return $resultado;

       }


    public function consejos(): BelongsToMany
    {
        return $this->belongsToMany(Consejo::class, 'blogs_tiene_consejos',
        'blog_id',
        'consejo_id',
        'blog_id',
        'consejo_id'
        );
    }
}
