<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    public function mount(Vacante $vacante)//
    {
       $this->vacante = $vacante;//la vacante del route model binding se lo asigno a la propiedad vacante
    }

    public function postularme()
    {
       $datos =$this->validate(); 
       
       //almacenar CV en el disco duro
       $cv= $this->cv->store('public/cv');
       $datos['cv']= str_replace('public/cv/','',$cv);


       //Crear el candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id'=> auth()->user()->id, 
            'cv' => $datos['cv'],
        //no necesita la vacaate  pq ya lo defini en la relacion, ya sabe cual es el id y se lo pone el id de la vacante
        ]);

       //crear notificacion  e enviar el correo
    
        
    
         $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));//metodo para notificar al user

      //mostrar el usuario un mensaje de exito
      session()->flash('mensaje', 'Se envio correctamente informacion, mucha suerte');
      return redirect()->back();

    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
