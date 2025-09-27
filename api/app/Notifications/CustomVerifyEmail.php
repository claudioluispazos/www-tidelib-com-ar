<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class CustomVerifyEmail extends Notification
{
    use Queueable;

    protected $verificationCode;

    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {        
        // Crear el HTML para el código de verificación con estilo
        $codeHtml = new HtmlString(
            '<div style="text-align: center; margin: 30px 0;">
                <div style="font-size: 36px; font-weight: bold; letter-spacing: 8px; background-color: #f5f5f5; padding: 20px; border-radius: 8px; display: inline-block;">
                    ' . $this->verificationCode . '
                </div>
            </div>'
        );
        
        return (new MailMessage)
            ->subject('Confirma tu cuenta en Tidelib')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Gracias por registrarte en Tidelib. Estamos emocionados de tenerte con nosotros.')
            ->line('Para activar tu cuenta, ingresa el siguiente código de verificación:')
            ->line($codeHtml)
            ->line('Este código expirará en 24 horas.')
            ->line('Si no has creado una cuenta, puedes ignorar este mensaje.');
    }
}
