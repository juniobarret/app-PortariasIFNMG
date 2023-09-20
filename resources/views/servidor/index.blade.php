<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servidores') }}
        </h2>
    </x-slot>

    <x-alert />

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end">

            <a href="{{ route('servidor.create') }}">
                <x-primary-button type="">Novo</x-primary-button>
            </a>
        </div>
    </div>
    @foreach ($servidores as $servidor)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="m-4 grid grid-cols-6 gap-6 justify-evenly">
                        <div>
                            <img class="rounded-full"
                                src="https://media.istockphoto.com/id/1220827245/pt/vetorial/anonymous-gender-neutral-face-avatar-incognito-head-silhouette.jpg?s=170667a&w=0&k=20&c=cAvwYBnkW__nN5xC5M5751Mx-640Fw5twxb3CEOcDks="
                                alt="avatar">
                        </div>
                        <div class="col-span-2 self-center">
                            <div class="mb-4">
                                <span class="font-bold">Nome:</span> <span
                                    class="font-bold">{{ $servidor->nome }}</span>
                            </div>
                            <div class="mb-4">
                                <span class="font-bold">Matrícula:</span> <span>{{ $servidor->matricula }}</span>
                            </div>
                            <div class="mb-4">
                                <span class="font-bold">Cargo:</span> <span>{{ $servidor->cargo }}</span>
                            </div>
                            <div class="mb-4">
                                <span class="font-bold">Subcargo:</span> <span>{{ $servidor->Subcargo }}</span>
                            </div>
                        </div>
                        <div class="col-span-2 self-center">
                            <div class="mb-4">
                                <span class="font-bold">E-mail:</span> <span>{{ $servidor->email }}</span>
                            </div>
                            <div class="mb-4">
                                <span class="font-bold">Telefone:</span> <span>{{ $servidor->telefone }}</span>
                            </div>
                            <div class="mb-4">
                                <span class="font-bold">Endereço:</span> <span>{{ $servidor->endereco }}</span>
                            </div>
                        </div>
                        <div class="self-center justify-self-center">
                            <div class="mb-4">
                                <a href="{{ route('servidor.edit', $servidor) }}">
                                    <x-secondary-button type="">Editar</x-secondary-button>
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('servidor.destroy', $servidor) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>Excluir</x-danger-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
