<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidato vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h1 class="text-2xl font-bold text-center my-10 ">Candidatos vacante: {{$vacante->titulo}}</h1>
                   
                   <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                        
                            @forelse ($vacante->candidatos as $candidato )
                                <li class="p-3 flex items-center ">
                                    <div  class="flex-1 ">
                                        <p href="" class="text-xl font-medium text-gray-800">{{$candidato->user->name}}</p>
                                        <p href="" class="text-sm text-gray-600">{{$candidato->user->email}}</p>
                                         <p href="" class="text-sm font-medium text-gray-600">
                                            Dia que se postulo: <span class="font-normal"> {{$candidato->created_at->diffForHumans()}}</span>
                                        </p>

                                    </div >
                                       <a 
                                        href="{{asset('storage/cv/' . $candidato->cv)}}" 
                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                         target="_blank"
                                         rel="noopener noreferrer"
                                        >
                                        ver CV

                                       </a>
                                    <div>

                                    </div>

                                </li>
                            @empty
                                 <p class="p-3 text-center text-sm text-gray-600"> No hay candidatos aun </p>
                            @endforelse

                        </ul>
                   
                   </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
