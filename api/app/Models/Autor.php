<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OpenApi\Annotations as OA;

/**
 * Class Autor
 *
 * @OA\Schema(
 *     schema="Autor",
 *     required={"nombre", "apellido", "email", "nacionalidad"},
 *     @OA\Property(property="id", type="integer", format="int64", readOnly=true, example=1),
 *     @OA\Property(property="nombre", type="string", example="Miguel"),
 *     @OA\Property(property="apellido", type="string", example="de Cervantes"),
 *     @OA\Property(property="email", type="string", format="email", example="cervantes@example.com"),
 *     @OA\Property(property="nacionalidad", type="string", example="Española"),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z")
 * )
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Autor extends Model
{
    use HasFactory;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'apellido', 'email', 'nacionalidad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function biografia()
    {
        return $this->hasOne(\App\Models\Biografia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function obras()
    {
        return $this->hasMany(\App\Models\Libro::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class);
    }

}
