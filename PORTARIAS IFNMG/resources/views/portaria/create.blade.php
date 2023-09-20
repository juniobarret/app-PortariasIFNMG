<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar portaria') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('portaria.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="m-4 grid grid-cols-2 gap-6 max-md:flex flex-col">
                        <div>
                            <div class="m-4 flex">
                                <div>
                                    <x-text-input type="text" name="numero" placeholder="Número da portaria"
                                        :value="old('numero')" required />
                                    <x-input-error :messages="$errors->get('numero')" class="mt-2" />
                                </div>
                                <div>
                                    <span class="m-4 text-4xl">/</span>
                                </div>
                                <div>
                                    <x-text-input type="text" name="ano" placeholder="Ano da portaria"
                                        :value="old('ano')" required />
                                    <x-input-error :messages="$errors->get('ano')" class="mt-2" />
                                </div>
                            </div>
                            <div class="m-4">
                                <select name="visibilidade" required
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" disabled selected>Visibilidade</option>
                                    <option value="Privada">Privada</option>
                                    <option value="Pública">Pública</option>
                                </select>
                            </div>
                            <div class="m-4">
                                <textarea name="descricao" rows="3"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    placeholder="Descrição da portaria" required></textarea>
                                <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                            </div>
                        </div>
                        <div>
                            <div class="m-4 flex">
                                <input class="mr-2" type="radio" name="validade" id="temporaria" value="Temporaria"
                                    checked>
                                <x-input-label for="temporaria"><span>Permanente</span></x-input-label>
                                <input class="ml-8 mr-2" type="radio" name="validade" id="permanente"
                                    value="Permanente">
                                <x-input-label for="permanente"><span>Temporária</span></x-input-label>
                            </div>
                            <div class="m-4 flex">
                                <x-input-label class="mr-1">
                                    Publicação:
                                </x-input-label>
                                <x-text-input type="date" name="publicacao" id="publicacao" required />
                            </div>
                            <div id="div_validade" class="m-4 flex hidden">
                                <x-input-label class="mr-4">
                                    Validade:
                                </x-input-label>
                                <x-text-input type="date" name="data_validade" id="data_validade" />
                            </div>
                            <div class="m-4">
                                <x-input-label>
                                    Arquivo da portaria:
                                </x-input-label>
                                <x-text-input
                                    class="block w-full text-sm text-gray-900 border border-black-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    type="file" name="arquivo" id="arquivo" required />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="m-4 grid grid-cols-2 gap-6 max-md:flex flex-col">
                        <div>
                            <div class="m-4">
                                <x-input-label for="servidores">
                                    <p>Servidores:</p>
                                    <p>Selecione vários servidores pressionando a tecla "crtl". </p>
                                </x-input-label>
                                <select name="servidores[]" multiple
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach ($servidores as $servidor)
                                        <option value="{{ $servidor->id }}">{{ $servidor->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="m-4">
                                <textarea name="integrantes_nao_servidores" rows="3"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    placeholder="Integrantes da portaria que não são servidores"></textarea>
                                <x-input-error :messages="$errors->get('integrantes_nao_servidores')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="flex w-full justify-center">
                            <div class="mb-4 mr-4">
                                <a href="{{ route('portaria.index') }}"
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
<script>
    document.getElementById('permanente').addEventListener('click', function() {
        document.getElementById('div_validade').setAttribute('class', 'm-4 flex');
    });
    document.getElementById('temporaria').addEventListener('click', function() {
        document.getElementById('div_validade').setAttribute('class', 'm-4 flex hidden');
        document.getElementById('data_validade').value = '';
    });
</script>
