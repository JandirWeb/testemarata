<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/" class="navbar-brand">
                <img src="/img/logo-marata.png" alt="logo">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Confirme sua senha para continuar.') }}
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Confirmar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
