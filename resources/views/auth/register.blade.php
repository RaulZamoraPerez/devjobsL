<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

              <!-- roles  -->
              <div class="mt-4">
                <x-label for="rol" :value="__('¿Que tipo de cuenta deseas en devjobs?')" />
                <select 
                    name="rol" 
                    id="rol"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    >
                     <option value="">-- selecciona un rol --</option>
                     <option value="1">Developer - Obtener empleo</option>
                     <option value="2">Reclutador - Publicar empleos</option>
                </select>   
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Repetir Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex  justify-between my-5">
                
                <x-link 
                 :enlace="route('login')"
                >
                  Iniciar sesion
                </x-link>

                <x-link 
                   :enlace="route('password.request')"
                >
                  Olvidaste tu cuenta
                </x-link>
               
            </div>
            <x-button class="w-full justify-center">
                {{ __('Crear cuenta') }}
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>
