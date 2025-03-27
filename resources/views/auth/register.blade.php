<x-guest-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <form method="POST" action="{{ route('register') }}" class="bg-white p-8 rounded-lg shadow-lg w-full">
                @csrf
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">{{ __('Créer un compte') }}</h2>
    
                <!-- Nom -->
                <div class="mb-6">
                    <x-input-label for="name" :value="__('Nom')" class="text-gray-700 font-semibold" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-user text-gray-400"></i>
                        </div>
                        <x-text-input id="name" class="block w-full pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Votre nom complet" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                </div>
    
                <!-- Adresse e-mail -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Adresse e-mail')" class="text-gray-700 font-semibold" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-envelope text-gray-400"></i>
                        </div>
                        <x-text-input id="email" class="block w-full pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="exemple@domaine.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>
    
                <!-- Statut -->
                <div class="mb-6">
                    <x-input-label for="status" :value="__('Statut')" class="text-gray-700 font-semibold" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-user-tag text-gray-400"></i>
                        </div>
                        <select id="status" name="status" class="block w-full pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="individuel">{{ __('Individuel') }}</option>
                            <option value="entreprise">{{ __('Entreprise') }}</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('status')" class="mt-2 text-red-500 text-sm" />
                </div>
    
                <!-- Mot de passe -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 font-semibold" />
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
    
                <!-- Confirmation du mot de passe -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-gray-700 font-semibold" />
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
    
                <!-- Conditions d'utilisation et Politique de confidentialité -->
                <div class="mb-6">
                    <label for="terms" class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" name="terms" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        </div>
                        <div class="ml-3 text-sm">
                            <span class="text-gray-600">
                                {!! __('J\'accepte les :terms_of_use et la :privacy_policy', [
                                    'terms_of_use' => '<a href="'.route('terms').'" class="underline text-indigo-600 hover:text-indigo-800" target="_blank">'.__('Conditions d\'utilisation').'</a>',
                                    'privacy_policy' => '<a href="'.route('privacy').'" class="underline text-indigo-600 hover:text-indigo-800" target="_blank">'.__('Politique de confidentialité').'</a>',
                                ]) !!}
                            </span>
                        </div>
                    </label>
                    <x-input-error :messages="$errors->get('terms')" class="mt-2 text-red-500 text-sm" />
                </div>
    
                <div class="flex items-center justify-between mt-8">
                    <a class="text-sm text-indigo-600 hover:text-indigo-800 flex items-center" href="{{ route('login') }}">
                        <i class="fa-solid fa-arrow-left mr-1"></i>
                        {{ __('Déjà inscrit ?') }}
                    </a>
    
                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center">
                        {{ __('S\'inscrire') }}
                        <i class="fa-solid fa-user-plus ml-2"></i>
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