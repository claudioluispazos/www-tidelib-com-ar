<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * Class Editorial
 *
 * @property $id
 * @property $razon_social
 * @property $denominacion_social
 * @property $cuit
 * @property $email
 * @property $direccion
 * @property $sitio_web
 * @property $facebook
 * @property $instagram
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @OA\Schema(
 *     schema="Editorial",
 *     required={"razon_social"},
 *     @OA\Property(property="id", type="integer", format="int64", readOnly=true, example=1),
 *     @OA\Property(property="razon_social", type="string", example="Grupo Planeta"),
 *     @OA\Property(property="denominacion_social", type="string", nullable=true, example="Editorial Planeta S.A."),
 *     @OA\Property(property="cuit", type="string", nullable=true, example="30-12345678-9"),
 *     @OA\Property(property="email", type="string", format="email", nullable=true, example="contacto@planeta.es"),
 *     @OA\Property(property="direccion", type="string", nullable=true, example="Calle Falsa 123"),
 *     @OA\Property(property="sitio_web", type="string", nullable=true, example="https://www.planetadelibros.com"),
 *     @OA\Property(property="facebook", type="string", nullable=true, example="https://facebook.com/planetadelibros"),
 *     @OA\Property(property="instagram", type="string", nullable=true, example="https://instagram.com/planetadelibros"),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z")
 * )
 */
class Editorial extends Model
{
    use HasFactory;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['razon_social', 'denominacion_social', 'cuit', 'email', 'direccion', 'sitio_web', 'facebook', 'instagram'];


}
