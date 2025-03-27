<section class="bg-[#F8F8F8] py-12 md:py-16 lg:py-20">
@if(session('message'))
    <div 
        class="bg-red-500 p-2 text-white text-center text-sm rounded transition-opacity duration-300 ease-in-out" 
        id="flash-message"
    >
        {{ session('message') }}
    </div>
@endif  
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row items-center justify-between gap-8 md:gap-12 lg:gap-16">
        <!-- Text Content -->
        <div class="w-full lg:w-1/2 order-2 lg:order-1">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 md:mb-6 leading-tight">
                Améliorez Vos Compétences et Celles de Votre Équipe avec Nos Formations Professionnelles !
            </h1>
            
            <p class="text-base md:text-lg text-gray-600 mb-6 md:mb-8 leading-relaxed">
                Des formations continues adaptées à vos besoins. Découvrez nos packs de formation et développez vos compétences avec des modules variés et encadrés par des experts.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-3 mb-8 md:mb-12">
                <a href="#" class="inline-block text-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-8 rounded-full transition-colors duration-300 shadow-lg hover:shadow-xl">
                    Start Trial
                </a>
                <a href="#" class="inline-block text-center bg-white border-2 border-gray-200 hover:border-blue-500 text-gray-700 hover:text-blue-600 font-medium py-3 px-8 rounded-full transition-all duration-300">
                    How It Works
                </a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                <div class="text-center p-4 bg-gray-50 rounded-xl">
                    <p class="text-xl md:text-2xl lg:text-3xl font-bold text-yellow-500 mb-1">1000+</p>
                    <p class="text-xs sm:text-sm text-gray-600">Formations Disponibles</p>
                </div>
                
                <div class="text-center p-4 bg-gray-50 rounded-xl">
                    <p class="text-xl md:text-2xl lg:text-3xl font-bold text-blue-500 mb-1">5000+</p>
                    <p class="text-xs sm:text-sm text-gray-600">Students Trained</p>
                </div>
                
                <div class="text-center p-4 bg-gray-50 rounded-xl">
                    <p class="text-xl md:text-2xl lg:text-3xl font-bold text-orange-500 mb-1">200+</p>
                    <p class="text-xs sm:text-sm text-gray-600">Professional Trainers</p>
                </div>
            </div>
        </div>
        
        <!-- Image Section -->
        <div class="w-full lg:w-1/2 order-1 lg:order-2 mb-8 md:mb-0">
            <div class="relative max-w-xl lg:max-w-none mx-auto">
                <img 
                    src="{{ asset('images/home-hero.png') }}" 
                    alt="Professional Training" 
                    class="w-full h-auto rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                >
                <!-- Decorative elements -->
                <div class="absolute -top-4 -right-4 w-16 h-16 bg-yellow-300 rounded-full opacity-50 hidden md:block"></div>
                <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-blue-200 rounded-full opacity-50 hidden md:block"></div>
            </div>
        </div>
    </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    flashMessage.style.opacity = '0';
                    setTimeout(() => flashMessage.remove(), 300); // Remove after fade-out
                }
            }, 3000); // 3 seconds delay
        });
    </script>