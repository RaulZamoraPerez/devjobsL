<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

   use WithFileUploads;

    protected $rules=[//por convecnion llamalo $rules
        'titulo'=>'required|string',
        'salario'=>'required',
        'categoria'=>'required',
        'empresa'=>'required',
        'ultimo_dia'=>'required',
        'descripcion'=>'required',
        'imagen'=>'required|image|max:1024'
    ];

    public function crearVacante()
    {
       $datos= $this->validate();//validate es  aplicar estas reglas de arriba 

       //almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');//store es para almacenar en una ruta en disco
       $datos['imagen']= str_replace('public/vacantes/', "", $imagen);//remplaza 
      


       //cerar la vacante 
       Vacante::create([
        'titulo'=> $datos['titulo'],
        'salario_id' =>  $datos['salario'],
        'categoria_id'=> $datos['categoria'],
        'empresa'=> $datos['empresa'],
        'ultimo_dia'=> $datos['ultimo_dia'],
        'descripcion'=> $datos['descripcion'],
        'imagen'=> $datos['imagen'],
        'user_id'=> auth()->user()->id,
       ]);


       //crear un mensaje
         session()->flash('mensaje', 'la vacante se publico correctamente');

       //rdireccionar al usuario
       return redirect()->route('vacantes.index');
    }

    public function render()
    {
        //consular la BD
        $salarios = Salario::all();//traer todos los registros
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios'=>$salarios,
            'categorias'=>$categorias
        ]);
    }
}
