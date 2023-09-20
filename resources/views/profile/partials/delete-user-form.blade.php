<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Deletar Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Depois que seu perfil for excluído, todos os seus dados serão excluídos permanentemente. Antes de excluir seu perfil, baixe todos os dados ou informações que deseja reter.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Deletar perfil') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Você está querendo deletar o seu perfil?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Depois que seu perfil for excluído, todos os seus dados serão excluídos permanentemente. Digite sua senha para confirmar que deseja excluir permanentemente seu perfil.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Senha') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Deletar perfil') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
