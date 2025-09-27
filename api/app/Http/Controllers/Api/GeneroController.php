<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(name="Géneros", description="Operaciones relacionadas con géneros")
 */
class GeneroController extends Controller
{
    public function __construct()
    {
        // Aplicar middleware solo a métodos específicos
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * @OA\Get(
     *     path="/api/generos",
     *     tags={"Géneros"},
     *     summary="Obtener todos los géneros (público)",
     *     @OA\Parameter(name="page", in="query", required=false, description="Número de página", @OA\Schema(type="integer")),
     *     @OA\Parameter(name="per_page", in="query", required=false, description="Cantidad de géneros por página", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Lista de géneros", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Genero")))
     * )
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 15);
        $generos = Genero::paginate($perPage);

        return response()->json([
            'status' => 'success',
            'message' => 'Géneros recuperados correctamente',
            'data' => $generos
        ], Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/api/generos/{id}",
     *     tags={"Géneros"},
     *     summary="Obtener un género por ID (público)",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del género", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detalles del género", @OA\JsonContent(ref="#/components/schemas/Genero")),
     *     @OA\Response(response=404, description="Género no encontrado")
     * )
     */
    public function show($id)
    {
        try {
            $genero = Genero::findOrFail($id);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Género recuperado correctamente',
                'data' => $genero
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Género no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/generos",
     *     tags={"Géneros"},
     *     summary="Crear un nuevo género (requiere autenticación)",
     *     security={{"sanctum": {}}},
     *     @OA\RequestBody(@OA\JsonContent(ref="#/components/schemas/Genero")),
     *     @OA\Response(response=201, description="Género creado", @OA\JsonContent(ref="#/components/schemas/Genero")),
     *     @OA\Response(response=422, description="Datos de entrada inválidos")
     * )
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:generos',
            'descripcion' => 'sometimes|required|string'
            // Añadir más reglas según sea necesario
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $genero = Genero::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Género creado correctamente',
            'data' => $genero
        ], Response::HTTP_CREATED);
    }

    /**
     * @OA\Put(
     *     path="/api/generos/{id}",
     *     tags={"Géneros"},
     *     summary="Actualizar un género (requiere autenticación)",
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del género", @OA\Schema(type="integer")),
     *     @OA\RequestBody(@OA\JsonContent(ref="#/components/schemas/Genero")),
     *     @OA\Response(response=200, description="Género actualizado"),
     *     @OA\Response(response=404, description="Género no encontrado"),
     *     @OA\Response(response=422, description="Datos de entrada inválidos")
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $genero = Genero::findOrFail($id);
            
            $validator = \Validator::make($request->all(), [
                'nombre' => 'sometimes|required|string|max:255|unique:generos,nombre,' . $id,
                'descripcion' => 'sometimes|required|string'
                // Añadir más reglas según sea necesario
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $genero->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Género actualizado correctamente',
                'data' => $genero
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Género no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/generos/{id}",
     *     tags={"Géneros"},
     *     summary="Eliminar un género (requiere autenticación)",
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del género", @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Género eliminado"),
     *     @OA\Response(response=404, description="Género no encontrado"),
     *     @OA\Response(response=409, description="No se puede eliminar, tiene libros asociados")
     * )
     */
    public function destroy($id)
    {
        try {
            $genero = Genero::findOrFail($id);
            
            // Verificar si tiene libros asociados
            if ($genero->libros()->count() > 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se puede eliminar el género porque tiene libros asociados'
                ], Response::HTTP_CONFLICT);
            }
            
            $genero->delete();
            
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Género no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }
    }
}