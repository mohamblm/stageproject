<!-- contact.blade.php -->
<section class="bg-white py-12">
    <div class="container mx-auto px-4 py-12 max-w-6xl">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 relative inline-block pb-3">
                CONTACTEZ-NOUS
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-500"></span>
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row rounded-lg overflow-hidden shadow-xl">
            <!-- Section Carte -->
            <div class="lg:w-1/2 h-96 lg:h-auto relative">
                <iframe
                    class="absolute inset-0 w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3370.449360339618!2d-6.341341924930311!3d32.353488973843454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda38748814f4add%3A0xf5145d3b984026e!2sBeni%20Mellal%20IFMSAS!5e0!3m2!1sen!2sma!4v1741895507722!5m2!1sen!2sma"
                    frameborder="0"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
                <!-- Contrôles de la carte -->
                <div class="absolute bottom-4 left-4 z-10">
                    <button class="bg-white p-2 rounded-full shadow-md text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="bg-white p-2 rounded-full shadow-md text-gray-700 hover:bg-gray-100 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Formulaire de Contact -->
            <div class="lg:w-1/2 bg-white p-6 md:p-8">
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Contactez-nous</h3>
                    <p class="text-gray-600 mt-2">Nous sommes là pour vous aider !</p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Message de Succès -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Champ Nom -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom Complet</label>
                        <input type="text" id="nom" name="nom" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            value="{{ old('nom') }}">
                        @error('nom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Champ Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse Email</label>
                        <input type="email" id="email" name="email" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Champ Téléphone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Numéro de Téléphone</label>
                        <input type="tel" id="phone" name="phone" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Champ Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Votre Message</label>
                        <textarea id="message" name="message" rows="4" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" 
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-300 ease-in-out">
                            Envoyer
                        </button>
                    </div>
                    @if (session('success'))
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
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>