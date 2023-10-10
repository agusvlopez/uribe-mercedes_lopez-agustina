<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entrada_Blog
 *
 * @property int $blog_id
 * @property string $title
 * @property string $content
 * @property string $author
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
 * @mixin \Eloquent
 */
class Entrada_Blog extends Model
{
    //use HasFactory;

     //Indicamos el nombre de la tabla
     protected $table = "entradas_blog";

     //Indicamos el nombre de la clave primaria
     protected $primaryKey = "blog_id";
}
