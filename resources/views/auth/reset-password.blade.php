<x-guest-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <form method="POST" action="{{ route('password.store') }}" class="bg-white p-8 rounded-lg shadow-lg w-full">
                @csrf
                
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">{{ __('Réinitialisation du mot de passe') }}</h2>

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
                                    :value="old('email', $request->email)" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    placeholder="exemple@domaine.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Nouveau mot de passe')" class="text-gray-700 font-semibold" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                        <x-text-input id="password" class="block w-full pl-10 pr-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePasswordVisibility('password')">
                            <i id="password-icon" class="fa-solid fa-eye text-gray-400 hover:text-gray-600"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    <p class="mt-1 text-sm text-gray-500">Le mot de passe doit contenir au moins 8 caractères.</p>
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" class="text-gray-700 font-semibold" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                        <x-text-input id="password_confirmation" class="block w-full pl-10 pr-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePasswordVisibility('password_confirmation')">
                            <i id="password_confirmation-icon" class="fa-solid fa-eye text-gray-400 hover:text-gray-600"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fa-solid fa-arrow-left mr-1"></i>
                        {{ __('Retour à la connexion') }}
                    </a>
                    
                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center">
                        {{ __('Réinitialiser le mot de passe') }}
                        <i class="fa-solid fa-arrow-right ml-2"></i>
                    </x-primary-button>
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