<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf            
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4 border"></div>
            <div class="mt-4">
                <h6>Endereço:</h6>
            </div>
            <div class="mt-4">
                <x-jet-label for="logradouro" value="{{ __('Logradouro') }}" />
                <x-jet-input id="logradouro" class="block mt-1 w-full" type="text" name="logradouro" :value="old('logradouro')" placeholder="Ex: Rua/Av" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="numero" value="{{ __('Numero') }}" />
                <x-jet-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero')"  required />
            </div>
            <div class="mt-4">
                <x-jet-label for="complemento" value="{{ __('Complemento') }}" />
                <x-jet-input id="complemento" class="block mt-1 w-full" type="text" name="complemento" :value="old('complemento')" placeholder="Apartamento, Quadra, Lote" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="bairro" value="{{ __('Bairro') }}" />
                <x-jet-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" required />
            </div>
            <div class="flex">
            <div class="mt-4 mr-2">
                <x-jet-label for="cidade" value="{{ __('Cidade') }}" />
                <x-jet-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" value="Caldas Novas" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <x-jet-input id="estado" class="block mt-1 w-full" type="text" name="estado" value="GO" required />
            </div>
            </div>
            <div class="mt-4 border"></div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
