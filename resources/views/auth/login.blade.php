<x-guest-layout>
    <div style="background-image: url('/images/fondo-login-antiguo.jpg'); 
            background-size: 100% 100%;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;">

        <div id="login-tarjeta" style="background-color: white;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    box-shadow: 0 2px 4px rgb(255, 255, 255);
                    padding: 20px;
                    width: 300px;
                    text-align: center;
                    margin-top: -150px;
                    ">

            <div style="background-color: rgb(255, 255, 255); display: flex; justify-content: center; align-items: center; border-radius: 50%; width: 150px; height: 150px; margin: 0 auto;">

                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRANQHM3Jmrcy_4i47dgOn0Yoii5kKpGL3gplML9PTApg&s" alt="" style="max-width: 100%; max-height: 100%; border-radius: 50%;" />
                
            </div>

            <x-jet-validation-errors class="mb-4" />

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

        </div>

    </div>
</x-guest-layout>
