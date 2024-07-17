<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;//un readNotifications es un metodo que trae todas las notificaciones no leidas
        
        //limpiar notificaciones
        auth()->user()->unreadNotifications->markAsRead();//markerAsRead es un metodo que marca todas las notificaciones como leidas
       return view('notificaciones.index',[
           'notificaciones' => $notificaciones,
       ]);
    }
}
