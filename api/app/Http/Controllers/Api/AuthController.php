<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(name="Autenticación", description="Operaciones de autenticación")
 */
class AuthController extends Controller
{
    public function __construct()
    {
        // Aplicar middleware solo a métodos específicos
        $this->middleware('auth:sanctum')->only(['logout']);
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Autenticación"},
     *     summary="Iniciar sesión (público)",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login exitoso",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="Login exitoso"),
     *             @OA\Property(property="user", ref="#/components/schemas/User"),
     *             @OA\Property(property="token", type="string", example="1|abcdefghijklmnopqrstuvwxyz")
     *         )
     *     ),
     *     @OA\Response(response=401, description="Credenciales inválidas")
     * )
     */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Error de validación', $validator->errors(), 422);
            }

            if (!Auth::attempt($request->only('email', 'password'))) {
                return $this->sendError('Credenciales inválidas', [], 401);
            }

            $user = Auth::user();

            // Check if the user's email is verified
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return $this->sendError('Por favor, verifica tu email antes de iniciar sesión.', [], 403);
            }

            $token = $user->createToken('api-token')->plainTextToken;
            
            return $this->sendResponse([
                'user' => $user,
                'token' => $token
            ], 'Inicio de sesión exitoso');
        } catch (\Exception $e) {
            Log::error('Error en login: ' . $e->getMessage());
            return $this->sendError('Ocurrió un error en el servidor', ['error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     tags={"Autenticación"},
     *     summary="Cerrar sesión (requiere autenticación)",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Cierre de sesión exitoso",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Cierre de sesión exitoso"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No autenticado"
     *     )
     * )
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->sendResponse([], 'Cierre de sesión exitoso');
        } catch (\Exception $e) {
            Log::error('Error en logout: ' . $e->getMessage());
            return $this->sendError('Ocurrió un error en el servidor', ['error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/auth/register",
     *     tags={"Autenticación"},
     *     summary="Registrar un nuevo usuario (público)",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password", "password_confirmation"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password123"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="password123")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Usuario registrado correctamente"),
     *     @OA\Response(response=422, description="Datos de registro inválidos")
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',      // al menos una letra minúscula
                'regex:/[A-Z]/',      // al menos una letra mayúscula
                'regex:/[0-9]/',      // al menos un número
                'regex:/[@$!%*#?&]/', // al menos un caracter especial
            ],
        ], [
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos una letra minúscula, una letra mayúscula, un número y un caracter especial (@$!%*#?&).'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Enviar email de verificación (solo una vez)
            $user->sendEmailVerificationNotification();
            
            // No disparamos el evento Registered, ya que también envía un correo de verificación
            // event(new Registered($user));

            return $this->sendResponse([], 'Usuario registrado exitosamente. Por favor, verifica tu email para iniciar sesión.', 201);
        } catch (\Exception $e) {
            Log::error('Error en registro: ' . $e->getMessage());
            return $this->sendError('Ocurrió un error al registrar el usuario', ['error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/auth/forgot-password",
     *     tags={"Autenticación"},
     *     summary="Solicitar restablecimiento de contraseña (público)",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Código de restablecimiento enviado"),
     *     @OA\Response(response=422, description="Email no encontrado")
     * )
     */
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();
        $user->sendPasswordResetCodeNotification();

        return $this->sendResponse([], 'Se ha enviado un código para restablecer la contraseña a tu email');
    }

    /**
     * @OA\Post(
     *     path="/api/auth/reset-password",
     *     tags={"Autenticación"},
     *     summary="Restablecer contraseña con código (público)",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "code", "password", "password_confirmation"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="code", type="string", example="123456"),
     *             @OA\Property(property="password", type="string", format="password", example="newpassword123"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="newpassword123")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Contraseña restablecida correctamente"),
     *     @OA\Response(response=422, description="Datos inválidos")
     * )
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string|size:6',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',      // al menos una letra minúscula
                'regex:/[A-Z]/',      // al menos una letra mayúscula
                'regex:/[0-9]/',      // al menos un número
                'regex:/[@$!%*#?&]/', // al menos un caracter especial
            ],
        ], [
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos una letra minúscula, una letra mayúscula, un número y un caracter especial (@$!%*#?&).'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user->password_reset_code || 
            $user->password_reset_code !== $request->code || 
            now()->gt($user->password_reset_code_expires_at)) {
            return $this->sendError('Código de restablecimiento inválido o expirado', [], 400);
        }

        $user->password = Hash::make($request->password);
        $user->password_reset_code = null;
        $user->password_reset_code_expires_at = null;
        $user->save();

        return $this->sendResponse([], 'Contraseña restablecida correctamente');
    }

    /**
     * @OA\Post(
     *     path="/api/auth/email/verify",
     *     tags={"Autenticación"},
     *     summary="Verificar email con código (público)",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "code"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="code", type="string", example="123456")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Email verificado correctamente"),
     *     @OA\Response(response=400, description="Código inválido o expirado")
     * )
     */
    public function verifyEmailWithCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user->hasVerifiedEmail()) {
            return $this->sendResponse([], 'Email ya verificado');
        }

        if (!$user->verification_code || 
            $user->verification_code !== $request->code || 
            now()->gt($user->verification_code_expires_at)) {
            return $this->sendError('Código de verificación inválido o expirado', [], 400);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
            
            // Clear the verification code
            $user->verification_code = null;
            $user->verification_code_expires_at = null;
            $user->save();
        }

        return $this->sendResponse([], 'Email verificado correctamente');
    }

    /**
     * @OA\Post(
     *     path="/api/auth/email/verification-notification",
     *     tags={"Autenticación"},
     *     summary="Reenviar email de verificación (público)",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Email de verificación enviado"),
     *     @OA\Response(response=404, description="Usuario no encontrado"),
     *     @OA\Response(response=400, description="Email ya verificado")
     * )
     */
    public function resendVerificationEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación', $validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user->hasVerifiedEmail()) {
            return $this->sendError('El email ya ha sido verificado.', [], 400);
        }

        // This will generate a new code and send the notification
        $user->sendEmailVerificationNotification();

        return $this->sendResponse([], 'Email de verificación reenviado exitosamente.');
    }

    /**
     * Enviar respuesta de éxito
     *
     * @param mixed $data
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($data, $message, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Enviar respuesta de error
     *
     * @param string $message
     * @param array $errors
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendError($message, $errors = [], $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $errors
        ], $code);
    }
}
