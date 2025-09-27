<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class CustomResetPassword extends Notification
{
    use Queueable;

    protected $resetCode;

    public function __construct($resetCode)
    {
        $this->resetCode = $resetCode;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
       
        // Crear el HTML para el código de restablecimiento con estilo
        $codeHtml = new HtmlString(
            '<div style="text-align: center; margin: 30px 0;">
                <div style="font-size: 36px; font-weight: bold; letter-spacing: 8px; background-color: #f5f5f5; padding: 20px; border-radius: 8px; display: inline-block;">
                    ' . $this->resetCode . '
                </div>
            </div>'
        );
        
        return (new MailMessage)
            ->subject('Restablecimiento de contraseña - Tidelib')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Recibimos una solicitud para restablecer la contraseña de tu cuenta.')
            ->line('Usa el siguiente código para restablecer tu contraseña:')
            ->line($codeHtml)
            ->line('Este código expirará en 60 minutos.')
            ->line('Si no solicitaste restablecer tu contraseña, puedes ignorar este mensaje.');
    }
}
