<form  class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-label for="titulo" :value="__('Titulo vacante')" />

        <x-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" .
            :value="old('titulo')"
           placeholder="titulo vacante"
        />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message">
        @enderror
    </div>
    <div>
        <x-label for="salario" :value="__('Salario Mensual')" />
             <select 
                wire:model="salario" 
                id="salario"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
            >
            <option value="">--seleccione --</option>
            @foreach ( $salarios as $salario )
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
             </select>
             @error('salario')
             <livewire:mostrar-alerta :message="$message">
         @enderror
      
    </div>
    <div>
        <x-label for="categoria" :value="__('Categoria')" />
            <select 
                wire:model="categoria" 
                id="categoria"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
            >
            <option value="">--seleccione --</option>
             @foreach ( $categorias as $categoria )
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
             @endforeach
            </select>

            @error('categoria')
            <livewire:mostrar-alerta :message="$message">
        @enderror
      
    </div>
    <div>
        <x-label for="empresa" :value="__('Empresa')" />
        <x-input 
        id="empresa" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="empresa" 
        :value="old('empresa')"
       placeholder="Empresa ej. Netflix, Uber, Shopify"
    />      
            @error('empresa')
            <livewire:mostrar-alerta :message="$message">
        @enderror
      
    </div>
    <div>
        <x-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
        <x-input 
        id="ultimo_dia" 
        class="block mt-1 w-full" 
        type="date" 
        wire:model="ultimo_dia" .
        :value="old('ultimo_dia')"
       
    />      
     @error('ultimo_dia')
             <livewire:mostrar-alerta :message="$message">
         @enderror
      
    </div>
    <div>
        <x-label for="descripcion" :value="__('Descripcion del puesto')" />
        
        <textarea
        wire:model="descripcion" 
        placeholder="descripcion general del puesto, experiencia"
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72"
         ></textarea>

         @error('descripcion')
         <livewire:mostrar-alerta :message="$message">
     @enderror
      
    </div>
    <div>
        <x-label for="imagen" :value="__('Imagen')" />
        <x-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen_nueva" 
            accept="image/*"
        />

          <div class="my-5 w-80">
                <x-label for="imagen" :value="__('Imagen actual')" />

                <img src="{{asset('storage/vacantes/' . $imagen)}}" alt="{{'imagen vacante '. $titulo}}">
          </div>

        <div class="my-5 w-80">
            @if($imagen_nueva)
               Imagen Nueva:
               <img src="{{$imagen_nueva->temporaryUrl()}}" alt="">
            @endif 
         </div> 

        @error('imagen_nueva')
        <livewire:mostrar-alerta :message="$message">
    @enderror
    </div>
    <x-button>
        Guardar cambios
    </x-button>

</form>