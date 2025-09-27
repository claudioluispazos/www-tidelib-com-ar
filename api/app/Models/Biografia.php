<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;
use AlAminFirdows\LaravelEditorJs\LaravelEditorJs;

/**
 * Class Biografia
 * 
 * @OA\Schema(
 *     schema="Biografia",
 *     @OA\Property(property="id", type="integer", format="int64", readOnly=true, example=1),
 *     @OA\Property(property="contenido", type="string", example="Miguel de Cervantes fue un novelista, poeta y dramaturgo español."),
 *     @OA\Property(property="fecha_nacimiento", type="string", format="date", nullable=true, example="1547-09-29"),
 *     @OA\Property(property="fecha_fallecimiento", type="string", format="date", nullable=true, example="1616-04-22"),
 *     @OA\Property(property="lugar_nacimiento", type="string", nullable=true, example="Alcalá de Henares, España"),
 *     @OA\Property(property="autor_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z")
 * )
 */
class Biografia extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contenido', 
        'fecha_nacimiento', 
        'fecha_fallecimiento', 
        'lugar_nacimiento', 
        'autor_id'
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autor()
    {
        return $this->belongsTo(\App\Models\Autor::class);
    }

    public function getTextoAttribute_()
    {
        return (new LaravelEditorJs)->render($this->attributes['texto']);
    }
}
