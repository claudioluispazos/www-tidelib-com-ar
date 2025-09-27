<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\CustomResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;
use OpenApi\Annotations as OA;
use App\Notifications\CustomVerifyEmail;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;

/**
 * @OA\Schema(
 *     schema="User",
 *     required={"name", "email", "password"},
 *     @OA\Property(property="id", type="integer", format="int64", readOnly=true, example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *     @OA\Property(property="email_verified_at", type="string", format="date-time", nullable=true, example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true, example="2023-01-01T00:00:00Z")
 * )
 */
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isSuperAdmin()
    {
        return $this->tipo_usuario==1;
    }

    public function isAutor()
    {
        return count($this->autors)>0;
    }

    public function isAdmin()
    {
        return count($this->autors)>1;
    }

    public function tipo_usuario()
    {
        switch (count($this->autors)){
            case 0:
                return "Usuario";
            case 1:
                return "Autor";
            default:
                return "Administrador";
        }
    }

    /**
     * Generate and save a verification code for the user
     *
     * @return string
     */
    public function generateVerificationCode()
    {
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->verification_code = $code;
        $this->verification_code_expires_at = Carbon::now()->addHours(24);
        $this->save();
        
        return $code;
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $code = $this->generateVerificationCode();
        $this->notify(new CustomVerifyEmail($code));
    }

    /**
     * Generate and save a password reset code for the user
     *
     * @return string
     */
    public function generatePasswordResetCode()
    {
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->password_reset_code = $code;
        $this->password_reset_code_expires_at = Carbon::now()->addHours(1);
        $this->save();
        
        return $code;
    }

    /**
     * Send the password reset code notification.
     *
     * @param  string  $code
     * @return void
     */
    public function sendPasswordResetCodeNotification()
    {
        $code = $this->generatePasswordResetCode();
        $this->notify(new CustomResetPassword($code));
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function autors(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Autor::class);
    }
}
