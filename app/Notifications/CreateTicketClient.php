<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreateTicketClient extends Notification
{
    use Queueable;
    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->data->name . ' Se ha registrado un nuevo ticket número ' . $this->data->id )
            ->line('Gracias por contactarnos. ')
            ->line(' Hemos recibido su solicitud y en un plazo de 24 horas hábiles daremos respuesta al requerimiento número '
                . $this->data->id .
                ' Tenga presente que los horarios de atención son de lunes a viernes de 8am a 6pm y los sábados de 9am a 12m. 
                Cajas Fuertes Ancla actuará como un medio facilitador en temas de conciliación entre clientes y transportadoras de valores, 
                sin que éste sea su obligación. Somos un ente colaborador y mediador.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
