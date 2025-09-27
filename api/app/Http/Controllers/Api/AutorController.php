<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(name="Autores", description="Operaciones para gestión de autores y onboarding")
 */
class AutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * @OA\Post(
     *     path="/api/autores/become",
     *     tags={"Autores"},
     *     summary="Convertir usuario autenticado en autor",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nombre","apellido","email","nacionalidad"},
     *             @OA\Property(property="nombre", type="string", example="Miguel"),
     *             @OA\Property(property="apellido", type="string", example="de Cervantes"),
     *             @OA\Property(property="email", type="string", format="email", example="cervantes@example.com"),
     *             @OA\Property(property="nacionalidad", type="string", example="Española")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Autor creado y asociado al usuario", @OA\JsonContent(ref="#/components/schemas/Autor")),
     *     @OA\Response(response=200, description="Ya era autor, devuelve autor asociado", @OA\JsonContent(ref="#/components/schemas/Autor")),
     *     @OA\Response(response=422, description="Datos inválidos")
     * )
     */
    public function become(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nacionalidad' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de validación',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Si ya tiene al menos un autor, devolver el primero
        if ($user->autors()->exists()) {
            $autor = $user->autors()->first();
            return response()->json([
                'status' => 'success',
                'message' => 'El usuario ya es autor',
                'data' => $autor,
            ], Response::HTTP_OK);
        }

        // Crear autor y asociarlo al usuario
        $autor = null;
        DB::transaction(function () use ($request, $user, &$autor) {
            $autor = Autor::create($request->only(['nombre','apellido','email','nacionalidad']));
            $user->autors()->attach($autor->id);
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Autor creado y asociado correctamente',
            'data' => $autor,
        ], Response::HTTP_CREATED);
    }

}

