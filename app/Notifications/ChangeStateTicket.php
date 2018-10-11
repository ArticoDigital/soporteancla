<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ChangeStateTicket extends Notification
{
    use Queueable;
    private $data;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @param $data
     * @param $user
     */
    public function __construct($data, $user)
    {
        //
        $this->data = $data;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Ticket Nº ' . $this->data->id . ' ha cambaido su estado ')
            ->line($this->user->name . ' ha cambiado el estado de la solicitud #' . $this->data->id .
                ' a " ' . $this->data->ticketState->name . ' "')
            ->action('Ver ticket', route('ticket', $this->data->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
