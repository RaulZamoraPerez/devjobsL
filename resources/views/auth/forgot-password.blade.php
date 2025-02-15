<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu password  coloca tu email y enviaremos un enlace para que crees uno nuevo') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}" novalidate>
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex  justify-between my-5">
                
                <x-link 
                 :enlace="route('login')"
                >
                  Iniciar sesion
                </x-link>

                <x-link 
                   :enlace="route('register')"
                >
                  Crear cuenta
                </x-link>
               
            </div>
            <x-button class="w-full justify-center">
                {{ __('Enviar instrucciones') }}
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>
