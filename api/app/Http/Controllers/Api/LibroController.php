<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;   
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(name="Libros", description="Operaciones relacionadas con libros")
 */
class LibroController extends Controller
{
    public function __construct()
    {
        // Aplicar middleware solo a métodos específicos
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * @OA\Get(
     *     path="/api/libros",
     *     tags={"Libros"},
     *     summary="Obtener todos los libros (público)",
     *     @OA\Parameter(name="page", in="query", required=false, description="Número de página", @OA\Schema(type="integer")),
     *     @OA\Parameter(name="per_page", in="query", required=false, description="Cantidad de libros por página", @OA\Schema(type="integer")),
     *     @OA\Parameter(name="search", in="query", required=false, description="Término de búsqueda", @OA\Schema(type="string")),
     *     @OA\Response(response=200, description="Lista de libros", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Libro")))
     * )
     */
    public function index(Request $request)
    {
        $query = Libro::with(['autor', 'editorial', 'genero']);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('titulo', 'like', "%{$search}%")
                  ->orWhereHas('autor', function ($q) use ($search) {
                      $q->where('nombre', 'like', "%{$search}%");
                  });
        }

        $perPage = $request->get('per_page', 15); // Default to 15 items per page
        $libros = $query->paginate($perPage);

        return response()->json([
            'status' => 'success',
            'message' => 'Libros recuperados correctamente',
            'data' => $libros
        ], Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/api/libros/{id}",
     *     tags={"Libros"},
     *     summary="Obtener un libro por ID (público)",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del libro", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detalles del libro", @OA\JsonContent(ref="#/components/schemas/Libro")),
     *     @OA\Response(response=404, description="Libro no encontrado")
     * )
     */
    public function show($id)
    {
        try {
            $libro = Libro::with(['autor', 'editorial', 'genero'])->findOrFail($id);
            
            // Incrementar contador de vistas
            //$libro->increment('vistas');
            
            return response()->json([
                'status' => 'success',
                'message' => 'Libro recuperado correctamente',
                'data' => $libro
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Libro no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/libros",
     *     tags={"Libros"},
     *     summary="Publicar un libro (requiere autenticación). Acepta multipart para portada y ebook.",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"titulo","autor_id","genero_id","editorial_id"},
     *                 @OA\Property(property="titulo", type="string"),
     *                 @OA\Property(property="isbn", type="string"),
     *                 @OA\Property(property="idioma", type="string"),
     *                 @OA\Property(property="precio", type="number", format="float"),
     *                 @OA\Property(property="sinopsis", type="string"),
     *                 @OA\Property(property="autor_id", type="integer"),
     *                 @OA\Property(property="genero_id", type="integer"),
     *                 @OA\Property(property="editorial_id", type="integer"),
     *                 @OA\Property(property="imagen_portada", type="string", format="binary"),
     *                 @OA\Property(property="archivo_ebook", type="string", format="binary")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=201, description="Libro creado", @OA\JsonContent(ref="#/components/schemas/Libro")),
     *     @OA\Response(response=403, description="No autorizado para este autor"),
     *     @OA\Response(response=422, description="Datos de entrada inválidos")
     * )
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autors,id',
            'editorial_id' => 'required|exists:editorials,id',
            'genero_id' => 'required|exists:generos,id',
            'isbn' => 'nullable|string|max:255',
            'idioma' => 'nullable|string|max:255',
            'precio' => 'nullable|numeric',
            'sinopsis' => 'nullable|string',
            'imagen_portada' => 'nullable|file|image|max:5120',
            'archivo_ebook' => 'nullable|file|mimes:pdf,epub|max:51200',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        // Verificar que el usuario autenticado pueda publicar para ese autor
        $user = $request->user();
        $autor = Autor::find($request->autor_id);
        if (!$autor || !$autor->users()->where('users.id', $user->id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No autorizado para publicar para este autor',
            ], Response::HTTP_FORBIDDEN);
        }

        $data = $request->only([
            'titulo','isbn','idioma','precio','sinopsis','autor_id','genero_id','editorial_id'
        ]);

        // Manejar archivos
        if ($request->hasFile('imagen_portada')) {
            $path = $request->file('imagen_portada')->store('libros/portadas', 'public');
            $data['imagen_portada'] = $path;
        }
        if ($request->hasFile('archivo_ebook')) {
            $ebookPath = $request->file('archivo_ebook')->store('libros/ebooks', 'public');
            $data['archivo_ebook'] = $ebookPath;
        }

        $libro = Libro::create($data);
        $libro->load(['autor', 'editorial', 'genero']);

        return response()->json([
            'status' => 'success',
            'message' => 'Libro creado correctamente',
            'data' => $libro
        ], Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/api/libros/por-autor/{autorId}",
     *     tags={"Libros"},
     *     summary="Listar libros por autor (público)",
     *     @OA\Parameter(name="autorId", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="page", in="query", @OA\Schema(type="integer")),
     *     @OA\Parameter(name="per_page", in="query", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Lista de libros", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Libro")))
     * )
     */
    public function listByAutor(Request $request, $autorId)
    {
        $perPage = $request->get('per_page', 15);
        $libros = Libro::with(['autor','editorial','genero'])
            ->where('autor_id', $autorId)
            ->paginate($perPage);

        return response()->json([
            'status' => 'success',
            'message' => 'Libros del autor recuperados correctamente',
            'data' => $libros,
        ], Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/api/mis-libros",
     *     tags={"Libros"},
     *     summary="Listar libros del autor asociado al usuario autenticado",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="page", in="query", @OA\Schema(type="integer")),
     *     @OA\Parameter(name="per_page", in="query", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Lista de libros", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Libro")))
     * )
     */
    public function myBooks(Request $request)
    {
        $user = $request->user();
        $autor = $user->autors()->first();
        if (!$autor) {
            return response()->json([
                'status' => 'success',
                'message' => 'El usuario no tiene autor asociado',
                'data' => [ 'items' => [] ],
            ], Response::HTTP_OK);
        }

        $perPage = $request->get('per_page', 15);
        $libros = Libro::with(['autor','editorial','genero'])
            ->where('autor_id', $autor->id)
            ->paginate($perPage);

        return response()->json([
            'status' => 'success',
            'message' => 'Libros del usuario recuperados correctamente',
            'data' => $libros,
        ], Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *     path="/api/libros/{id}",
     *     tags={"Libros"},
     *     summary="Actualizar un libro (requiere autenticación)",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del libro", @OA\Schema(type="integer")),
     *     @OA\RequestBody(@OA\JsonContent(ref="#/components/schemas/Libro")),
     *     @OA\Response(response=200, description="Libro actualizado"),
     *     @OA\Response(response=404, description="Libro no encontrado"),
     *     @OA\Response(response=422, description="Datos de entrada inválidos")
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $libro = Libro::findOrFail($id);
            
            // Validación (debería implementarse en un FormRequest separado)
            $validator = \Validator::make($request->all(), [
                'titulo' => 'sometimes|required|string|max:255',
                'autor_id' => 'sometimes|required|exists:autores,id',
                'editorial_id' => 'sometimes|required|exists:editoriales,id',
                'genero_id' => 'sometimes|required|exists:generos,id',
                // Añadir más reglas según sea necesario
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $libro->update($request->all());
            $libro->load(['autor', 'editorial', 'genero']);

            return response()->json([
                'status' => 'success',
                'message' => 'Libro actualizado correctamente',
                'data' => $libro
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Libro no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/libros/{id}",
     *     tags={"Libros"},
     *     summary="Eliminar un libro (requiere autenticación)",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID del libro", @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Libro eliminado"),
     *     @OA\Response(response=404, description="Libro no encontrado")
     * )
     */
    public function destroy($id)
    {
        try {
            $libro = Libro::findOrFail($id);
            $libro->delete();
            
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Libro no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }
    }
}