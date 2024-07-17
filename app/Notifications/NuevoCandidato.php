<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];//database pq igual se guarde en bd
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // $url = url('/candidatos/' . $this->id_vacante);
        $url = url('/notificaciones/');
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante')
                    ->line('La vacantes es ' . $this->nombre_vacante)//nombre de la vacante
                    ->action('Ver notificaciones ', $url)
                    ->line('Gracias por usar nuestra aplicacion 😉');
    }

    //alamcena las notificaciones en la base de datos
    public function toDatabase($notifiable)
    {
       return [//se convierte en objto y se almancenan en la bd
               
        // aqui puedes agregar  toda la info que quieras alamcenar 
        //en la notificacion para que despues el usuario la pueda leer
        //por que esa notificacion la va a poder ver el reculutador
        'id_vacante' => $this->id_vacante,
        'nombre_vacante' => $this->nombre_vacante,
        'usuario_id' => $this->usuario_id,//usuario que postulo
       ];
    }
 
}
