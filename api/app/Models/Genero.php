<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * Class Genero
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * 
 * @OA\Schema(
 *     schema="Genero",
 *     required={"nombre"},
 *     @OA\Property(property="id", type="integer", format="int64", readOnly=true, example=1),
 *     @OA\Property(property="nombre", type="string", example="Novela"),
 *     @OA\Property(property="descripcion", type="string", nullable=true, example="Género literario de ficción que narra acciones representadas como si fueran reales"),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z")
 * )
 */
class Genero extends Model
{
    use HasFactory;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libros()
    {
        return $this->hasMany(\App\Models\Libro::class);
    }
}
