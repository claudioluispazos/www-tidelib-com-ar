<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;
use Illuminate\Support\Facades\Storage;

/**
 * Class Libro
 *
 * @property $id
 * @property $titulo
 * @property $isbn
 * @property $idioma
 * @property $precio
 * @property $imagen_portada
 * @property $autor_id
 * @property $genero_id
 * @property $editorial_id
 * @property $sinopsis
 * @property $created_at
 * @property $updated_at
 *
 * @property Autor $autor
 * @property Editorial $editorial
 * @property Genero $genero
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * 
 * @OA\Schema(
 *     schema="Libro",
 *     required={"titulo", "autor_id", "editorial_id", "genero_id"},
 *     @OA\Property(property="id", type="integer", format="int64", readOnly=true, example=1),
 *     @OA\Property(property="titulo", type="string", example="El Quijote"),
 *     @OA\Property(property="isbn", type="string", nullable=true, example="978-3-16-148410-0"),
 *     @OA\Property(property="idioma", type="string", nullable=true, example="Español"),
 *     @OA\Property(property="precio", type="number", format="float", nullable=true, example=29.99),
 *     @OA\Property(property="imagen_portada", type="string", nullable=true, example="libros/quijote.jpg"),
 *     @OA\Property(property="archivo_ebook", type="string", nullable=true, example="libros/ebooks/quijote.epub"),
 *     @OA\Property(property="sinopsis", type="string", nullable=true, example="Una historia sobre un caballero andante..."),
 *     @OA\Property(property="autor_id", type="integer", example=1),
 *     @OA\Property(property="genero_id", type="integer", example=1),
 *     @OA\Property(property="editorial_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="autor", ref="#/components/schemas/Autor"),
 *     @OA\Property(property="editorial", ref="#/components/schemas/Editorial"),
 *     @OA\Property(property="genero", ref="#/components/schemas/Genero")
 * )
 */
class Libro extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['titulo', 'isbn', 'idioma', 'precio', 'imagen_portada', 'archivo_ebook', 'autor_id', 'genero_id', 'editorial_id', 'sinopsis'];

    // Accesor para formatear la URL de la imagen de portada
    public function getImagenPortadaAttribute($value)
    {
        if (!$value) return null;
        
        // Si ya es una URL completa, devolverla tal como está
        if (str_starts_with($value, 'http')) {
            return $value;
        }
        
        // Si es una ruta relativa, convertirla a URL completa
        $baseUrl = config('app.url');
        return $baseUrl . '/storage/' . ltrim($value, '/');
    }

    // Accesor para formatear la URL del archivo del ebook
    public function getArchivoEbookAttribute($value)
    {
        return $value ? Storage::url($value) : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autor()
    {
        return $this->belongsTo(\App\Models\Autor::class, 'autor_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editorial()
    {
        return $this->belongsTo(\App\Models\Editorial::class, 'editorial_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genero()
    {
        return $this->belongsTo(\App\Models\Genero::class, 'genero_id', 'id');
    }
    
}
