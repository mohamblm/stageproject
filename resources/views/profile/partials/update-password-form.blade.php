<section class="max-w-md mx-auto">
    <header class="mb-6">
        <h2 class="text-xl font-medium text-gray-900">
            {{ __('Changer le mot de passe') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" class="mb-2 block text-sm font-medium text-gray-700" />
            <div class="relative">
                <x-text-input 
                    id="update_password_current_password" 
                    name="current_password" 
                    type="password" 
                    class="pr-10 block w-full rounded-md border-gray-300 shadow-sm" 
                    placeholder="mot de passe"
                    autocomplete="current-password" 
                />
                <button type="button" onclick="togglePasswordVisibility('update_password_current_password')" class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" class="mb-2 block text-sm font-medium text-gray-700" />
            <div class="relative">
                <x-text-input 
                    id="update_password_password" 
                    name="password" 
                    type="password" 
                    class="pr-10 block w-full rounded-md border-gray-300 shadow-sm" 
                    placeholder="mot de passe"
                    autocomplete="new-password" 
                />
                <button type="button" onclick="togglePasswordVisibility('update_password_password')" class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmez le mot de passe')" class="mb-2 block text-sm font-medium text-gray-700" />
            <div class="relative">
                <x-text-input 
                    id="update_password_password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    class="pr-10 block w-full rounded-md border-gray-300 shadow-sm" 
                    placeholder="Confirmez le mot de passe"
                    autocomplete="new-password" 
                />
                <button type="button" onclick="togglePasswordVisibility('update_password_password_confirmation')" class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full py-2 px-4 bg-cyan-600 hover:bg-cyan-700 text-white font-medium rounded-md transition-colors">
                {{ __('Changer mot de passe') }}
            </button>   
            @if (session('status') === 'password-updated')
                    <div x-data="{ show: true }" 
                        x-show="show" 
                        x-init="setTimeout(() => show = false, 5000)"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform translate-y-4"
                        class="fixed top-4 right-4 z-50 max-w-sm w-full">
                        <div class="flex items-center p-5 bg-white rounded-lg shadow-xl border-l-4 border-l-green-500">
                            <!-- Checkmark icon with animated circle -->
                            <div class="flex-shrink-0 relative">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <svg class="w-8 h-8 absolute top-0 left-0 text-green-500 animate-[spin_4s_ease-in-out_infinite]" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1" stroke-dasharray="1 3" />
                                </svg>
                            </div>
                            
                            <!-- Message with title and content -->
                            <div class="ml-4 flex-1">
                                <h4 class="text-sm font-bold text-gray-800 mb-0.5">Success!</h4>
                                <p class="text-sm text-gray-600">
                                    Votre mot de passe a été modifié avec succès.
                                </p>
                            </div>
                        </div>
                    </div>
            @endif
        </div>
    </form>

    <!-- JavaScript for toggling password visibility -->
    <script>
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</section>