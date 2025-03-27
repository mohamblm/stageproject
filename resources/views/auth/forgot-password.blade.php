<x-guest-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <form method="POST" action="{{ route('password.email') }}" class="bg-white p-8 rounded-lg shadow-lg w-full">
                @csrf
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">{{ __('Réinitialisation du mot de passe') }}</h2>
                
                <div class="mb-6 text-sm text-gray-600 bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-circle-info text-blue-500"></i>
                        </div>
                        <div class="ml-3">
                            {{ __('Mot de passe oublié ? Pas de problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons un lien de réinitialisation qui vous permettra d\'en choisir un nouveau.') }}
                        </div>
                    </div>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

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
                                    placeholder="exemple@domaine.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <div class="flex flex-col space-y-4">
                    <x-primary-button class="w-full flex justify-center items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fa-solid fa-paper-plane mr-2"></i>
                        {{ __('Envoyer le lien de réinitialisation') }}
                    </x-primary-button>
                    
                    <a href="{{ route('login') }}" class="text-center text-sm text-indigo-600 hover:text-indigo-800 mt-4 flex items-center justify-center">
                        <i class="fa-solid fa-arrow-left mr-1"></i>
                        {{ __('Retour à la connexion') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>