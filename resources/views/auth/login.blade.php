<x-guest-layout>
    <!-- Session Status -->
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-lg shadow-lg w-full">
                @csrf
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">{{ __('Connexion') }}</h2>

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Adresse e-mail')" class="text-gray-700 font-semibold" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-envelope text-gray-400"></i>
                        </div>
                        <x-text-input id="email" class="block w-full pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    placeholder="exemple@domaine.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 font-semibold" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                        <x-text-input id="password" 
                                    class="block w-full pl-10 pr-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="current-password" />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePasswordVisibility('password')">
                            <i id="password-icon" class="fa-solid fa-eye text-gray-400 hover:text-gray-600"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                    </label>
                </div>

                <div class="mb-6">
                    <x-primary-button class="w-full flex justify-center items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fa-solid fa-sign-in-alt mr-2"></i>
                        {{ __('Se connecter') }}
                    </x-primary-button>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between mt-4 space-y-3 sm:space-y-0">
                    <a class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center" href="{{ route('register') }}">
                        <i class="fa-solid fa-user-plus mr-1"></i>
                        {{ __("Vous n'avez pas de compte ?") }}
                    </a>
                    
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center" href="{{ route('password.request') }}">
                            <i class="fa-solid fa-key mr-1"></i>
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Script for password visibility toggle -->
    <script>
        function togglePasswordVisibility(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const passwordIcon = document.getElementById(`${fieldId}-icon`);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
</x-guest-layout>