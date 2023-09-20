<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar servidor') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('servidor.update', $servidor) }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="text" hidden name="avatar" value="https://via.placeholder.com/200x200.png/007711?text=people+nesciunt">
                    <div class="m-4 grid grid-cols-6 gap-6 justify-evenly">
                        <div class="self-center">
                            <a href="">
                                <img class="rounded-full"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar">
                            </a>
                        </div>
                        <div class="col-span-2 self-top">
                            <div class="mb-4">
                                <x-text-input type="text" name="nome" placeholder="Nome" value="{{$servidor->nome}}" required/>
                                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-text-input type="text" name="matricula" placeholder="Matrícula"
                                value="{{$servidor->matricula}}" required/>
                                <x-input-error :messages="$errors->get('matricula')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <select name="cargo" required
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" disabled selected>Cargo</option>
                                    <option value="Coordenador">Coordenador</option>
                                    <option value="Diretor">Diretor</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Técnico Administrativo">Técnico Administrativo</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                 <p>Você exersse alguma subfunção?</p>
                                 
                                <select name="Subcargo" required
                                    
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" disabled selected>Não exerço</option>
                                    <option value="CoordenadorCur">Coordenador de Curso</option>
                                    <option value="CoordenadorEns">Coordenador de Ensino</option>
                                    <option value="CoordenadorExt">Coordenador de Extensão</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-span-3 self-top">
                            <div class="mb-4">
                                <x-text-input type="email" name="email" placeholder="E-mail" value="{{$servidor->email}}" disabled/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-text-input type="text" name="telefone" placeholder="Telefone" value="{{$servidor->telefone}}" required/>
                                <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <textarea name="endereco" rows="3"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    placeholder="Endereço" required>{{$servidor->endereco ?? ""}}</textarea>
                                <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="flex w-full justify-center">
                            <div class="mb-4 mr-4">
                                <a href="{{ route('servidor.index') }}"
                                    class="inline-flex items-center px-4 py-2 
                                        bg-red-600 border border-transparent 
                                        rounded-md font-semibold text-xs 
                                        text-white uppercase tracking-widest 
                                        hover:bg-red-500 active:bg-red-700 
                                        focus:outline-none focus:ring-2 
                                        focus:ring-red-500 focus:ring-offset-2 
                                        transition ease-in-out duration-150">

                                    Cancelar
                                </a>
                            </div>
                            <div class="mb-4">
                                <x-primary-button>Salvar</x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
