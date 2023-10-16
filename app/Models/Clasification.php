<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Clasification
 *
 * @property int $clasification_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Clasification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clasification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clasification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clasification whereClasificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clasification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clasification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clasification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Clasification extends Model
{
    //use HasFactory;
    protected $table = 'clasifications';

    protected $primaryKey = 'clasification_id';
}
