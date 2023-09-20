<x-home-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Relatório de Portarias por servidor') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow shadow-sm sm:rounded-lg">
                <div class="relative overflow shadow-md sm:rounded-lg">
                    <table class="w-full text-center text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Servidor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantidade
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Última Portaria
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cargo
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servidores as $servidor)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{$servidor->nome}}
                                    </td>
                                    <td class="px-3 py-4">
                                        {{$servidor->portarias->count() ?? 0}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $ultimaPortaria = $servidor->portarias->last();
                                        @endphp
                                        @if($servidor->portarias->count()>0 && $ultimaPortaria->visibilidade === "Pública")
                                            <a href="{{ asset('storage/portarias/' . $ultimaPortaria->arquivo) }}" class="text-blue-500 hover:text-blue-700 hover:underline">
                                                {{$ultimaPortaria->numero}}/{{$ultimaPortaria->ano}}
                                            </a>
                                        @elseif($servidor->portarias->count()>0 && $ultimaPortaria->visibilidade === "Privada")
                                            {{$ultimaPortaria->numero}}/{{$ultimaPortaria->ano}}
                                        @else
                                            Não há portarias
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$servidor->cargo}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
</x-home-layout>
