<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <!-- <x-jet-authentication-card-logo /> -->

            {{-- <img src="http://www.industrial32puno.edu.pe/wp-content/uploads/2022/10/cropped-LOGO-I32-22.png" alt="" srcset=""> --}}
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRANQHM3Jmrcy_4i47dgOn0Yoii5kKpGL3gplML9PTApg&s" alt="" srcset="">

        </x-slot>

        <!-- <x-jet-validation-errors class="mb-4" /> -->

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                <!-- {{ session('status') }} -->
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <!-- <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span> -->
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your passwords?') }}
                    </a> -->
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
