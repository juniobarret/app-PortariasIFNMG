<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portarias') }}
        </h2>
    </x-slot>

    <x-alert />

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end">

        
        <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="space-x-4">
            <label for="subcargoFilter" class="text-gray-700">Filtrar por Subcargo:</label>
            <select id="subcargoFilter" class="border rounded-md px-2 py-1">
                <option value="">Todos</option>
                <option value="CoordenadorExt">CoordenadorExt</option>
                <!-- Adicione outras opções de Subcargos aqui conforme necessário -->
            </select>
        </div>
        <div class="space-x-4">
            <label for="servidorFilter" class="text-gray-700">Filtrar por Servidor:</label>
            <select id="servidorFilter" class="border rounded-md px-2 py-1">
                <option value="">Todos</option>
                <!-- Adicione opções de Servidores aqui conforme necessário -->
            </select>
        </div>
    </div>
</div>




            <a href="{{ route('portaria.create') }}">
                <x-primary-button type="">Novo</x-primary-button>
            </a>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow shadow-sm sm:rounded-lg">
                <div class="relative overflow shadow-md sm:rounded-lg">
                    <table class="w-full text-center text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Número
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descrição
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data de Validade
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Arquivo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Não servidores
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Servidores
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Subcargo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Opções
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portarias as $portaria)
                                <tr class="bg-white border-b dark:bg-green-900 dark:border-white-900 dark:text-white">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $portaria->numero }}/{{ $portaria->ano }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $portaria->descricao }}
                                    </td>
                                    <td class="px-3 py-4">

                                        {{ $portaria->data_validade ? $portaria->data_validade->format('d/m/Y') : 'Permanente' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ asset('storage/portarias/' . $portaria->arquivo) }}" target="blank">
                                            Arquivo
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $portaria->integrantes_nao_servidores }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @foreach ($portaria->servidores as $servidor)
                                            <span>{{ $servidor->nome }}{{ $loop->last ? '' : ', ' }}</span>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4">
                                        @foreach ($portaria->servidores as $servidor)
                                            <span>{{ $servidor->Subcargo }}{{ $loop->last ? '' : ', ' }}</span>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- <div class="mb-4">
                                            <a clas href="{{ route('portaria.edit', $portaria->id) }}">
                                                <x-secondary-button type="">Editar</x-secondary-button>
                                            </a>
                                        </div> --}}
                                        <div>
                                            <form action="{{ route('portaria.destroy', $portaria->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit">Excluir</x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
