<!-- resources/views/partials/contact-us.blade.php -->
<section class="py-16 bg-white overflow-hidden" id="contact-us">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center">
            <!-- Left side with image (keep this the same) -->
            <div class="w-full lg:w-1/2 mb-12 lg:mb-0 relative">
            <div class="relative z-10 transform transition-transform duration-500 hover:scale-105">
                    <img 
                        src="{{ asset('images/about-contact.png') }}" 
                        alt="Contact Us" 
                        class="w-full"
                    >
                </div>
                <!-- Decorative elements -->
                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-cyan-300 rounded-full opacity-30 animate-pulse"></div>
                <div class="absolute top-10 -right-4 w-16 h-16 bg-yellow-400 rounded-full opacity-30 animate-pulse" style="animation-delay: 0.5s"></div>
                <div class="absolute bottom-20 right-10 w-12 h-12 bg-purple-400 rounded-full opacity-30 animate-pulse" style="animation-delay: 0.5s"></div>
            </div>
            
            <!-- Updated Right side with form -->
            <div class="w-full lg:w-1/2 lg:pl-16">
                <div class="max-w-md mx-auto">
                    <div class="mb-10 text-center lg:text-left">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Contactez-Nous</h2>
                        <div class="w-20 h-1 bg-cyan-600 mx-auto lg:mx-0"></div>
                        <p class="mt-4 text-gray-600">Nous sommes là pour répondre à toutes vos questions.</p>
                    </div>
                    
                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Success Message -->
                        @if(session('success'))
                        <div class="p-4 mb-6 rounded-lg bg-green-50 border border-green-200">
                            <p class="text-green-700">{{ session('success') }}</p>
                        </div>
                        @endif

                        <!-- Name Input -->
                        <div class="relative group">
                            <div class="flex items-center border-2 border-gray-200 rounded-lg px-4 py-3 transition-all duration-300 focus-within:border-cyan-600 group-hover:border-cyan-400">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <input 
                                    type="text" 
                                    id="nom" 
                                    name="nom" 
                                    class="w-full bg-transparent outline-none text-gray-700 placeholder-transparent"
                                    placeholder="Nom Complet"
                                    required
                                />
                                <label 
                                    for="nom" 
                                    class="absolute left-12 -top-3.5 text-gray-500 text-sm transition-all bg-white px-1 group-focus-within:text-cyan-600"
                                >
                                    Nom Complet
                                </label>
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="relative group">
                            <div class="flex items-center border-2 border-gray-200 rounded-lg px-4 py-3 transition-all duration-300 focus-within:border-cyan-600 group-hover:border-cyan-400">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="w-full bg-transparent outline-none text-gray-700 placeholder-transparent"
                                    placeholder="Email"
                                    required
                                />
                                <label 
                                    for="email" 
                                    class="absolute left-12 -top-3.5 text-gray-500 text-sm transition-all bg-white px-1 group-focus-within:text-cyan-600"
                                >
                                    Email
                                </label>
                            </div>
                        </div>

                        <!-- Phone Input -->
                        <div class="relative group">
                            <div class="flex items-center border-2 border-gray-200 rounded-lg px-4 py-3 transition-all duration-300 focus-within:border-cyan-600 group-hover:border-cyan-400">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone" 
                                    class="w-full bg-transparent outline-none text-gray-700 placeholder-transparent"
                                    placeholder="Téléphone"
                                    required
                                />
                                <label 
                                    for="phone" 
                                    class="absolute left-12 -top-3.5 text-gray-500 text-sm transition-all bg-white px-1 group-focus-within:text-cyan-600"
                                >
                                    Téléphone
                                </label>
                            </div>
                        </div>

                        <!-- Message Input -->
                        <div class="relative group">
                            <div class="flex items-center border-2 border-gray-200 rounded-lg px-4 py-3 transition-all duration-300 focus-within:border-cyan-600 group-hover:border-cyan-400">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    rows="4" 
                                    class="w-full bg-transparent outline-none text-gray-700 placeholder-transparent resize-none"
                                    placeholder="Votre Message"
                                    required
                                ></textarea>
                                <label 
                                    for="message" 
                                    class="absolute left-12 -top-3.5 text-gray-500 text-sm transition-all bg-white px-1 group-focus-within:text-cyan-600"
                                >
                                    Votre Message
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full px-6 py-3.5 bg-gradient-to-r from-cyan-600 to-cyan-500 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-opacity-50"
                        >
                            Envoyer le Message
                            <svg class="w-4 h-4 inline-block ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </button>
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
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-move labels for pre-filled values
        document.querySelectorAll('input, textarea').forEach(input => {
            const label = input.parentElement.parentElement.querySelector('label');
            if (input.value) {
                label.classList.add('text-cyan-600');
            }
            
            input.addEventListener('input', () => {
                label.classList.toggle('text-cyan-600', input.value.length > 0);
            });
        });
    });
</script>