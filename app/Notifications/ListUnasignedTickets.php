<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Log;

class ListUnasignedTickets extends Notification
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
        $tabletickets="<table style='width:100%'>
        <tr>
          <th>Ticket</th>
          <th>Nombre cliente</th>
          <th>Enlace</th>
        </tr>";
        foreach($this->data as $value) {
          $tabletickets.="<tr>
                            <td>".$value->id."</td>
                            <td>".$value->name."</td>
                            <td>".$value->id."</td>
                          </tr>";
        }
        $tabletickets.="</table>";
        return (new MailMessage)
            ->subject('Soporte Ancla - Tickets no asignados')
            ->line('Se han detectado los siguientes tickets sin asignación de soporte, por favor asignelos o cambie el estado de los mismos')
            ->formatLine($tabletickets);
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
