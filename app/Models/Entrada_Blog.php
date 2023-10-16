<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'author' => 'required'
    ];

    public static $errorMessages = [
        'title.required' => 'El titulo no puede estar vacío.',
        'title.min' => 'El título debe tener al menos :min caracteres',
        'content.required' => 'El contenido de la entrada no puede estar vacío.',
        'author.required' => 'El autor/a no puede estar vacío.'
    ];

    //Relaciones

    public function clasification(): BelongsTo
    {
        return $this->belongsTo(Clasification::class, 'clasification_id', 'clasification_id');
    }


}
