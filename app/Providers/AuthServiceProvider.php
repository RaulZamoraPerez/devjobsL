<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
              ->subject("Verificar cuenta")
              ->line('Tu cuenta ya esta casi lista, solo debes precionar el enlace a continuacion')//liena de texto
              ->action('Confirmar cuenta', $url)//action = boton y con url
              ->line('sino creaste esta cuenta puedes ignorar este mensaje');

        });
    }
}

/*
Y aquí tenemos un metodo llamado    boot
Y ese metodo se manda a llamar automa cuando el usuario precione el
 botón o trate de iniciar sesión  y pndremos la clase de
  verifiedEmail  y te importa su clase y usas el metodo de 
  toMailUsing y le pones un callback una función  y esa función 
  toma  2 parametros $notifiable y la url $url  y nos intersa 
  la url y retornamos ew MailMessage  y aquí puedes personalizar 
  el email  y el subject  osea el asunto pudes ponerle vetificar
   cunata 

*/