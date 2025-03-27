{{-- 
    Hero Section Partial - About Page
    This component displays a visually appealing hero section with text on the left and an image on the right
    With increased padding, 90vh height, and reduced font size
--}}

<section class="relative w-full bg-white overflow-hidden" style="height: 90vh;">
    <div class="container mx-auto px-8 md:px-16 flex flex-col md:flex-row items-center h-full py-20 md:py-24">
        {{-- Left content column with heading and text (with reduced font size) --}}
        <div class="w-full md:w-1/2 md:pr-12 mb-10 md:mb-0 z-10">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
               Élevez Votre Expérience avec un Accompagnement Sur-Mesure
            </h1>
            
            <p class="text-lg text-gray-600 mb-8 max-w-lg"> 
                Nous aidons les professionnels et les entreprises à accéder à des ressources de qualité, adaptées à leurs besoins.
                Avec une approche innovante et personnalisée, nous garantissons une expérience enrichissante et efficace.
            </p>
        </div>
        
        {{-- Right image column - The image is placed in a container with a subtle shadow and tilt effect --}}
        <div class="w-full md:w-1/2 relative">
            {{-- Error handling for image loading --}}
            <div class="relative overflow-hidden rounded-lg shadow-xl transform md:-rotate-2">
                    <img 
                        src="{{ asset('images/about-hero.jpeg') }}" 
                        alt="Instructeur souriant avec des étudiants en arrière-plan" 
                        class="w-full h-auto object-cover"
                        loading="eager"
                        onerror="this.onerror=null; this.src='{{ asset('images/fallback-image.jpg') }}';"
                    >
            </div>
        </div>
    </div>
    
    {{-- Optional decorative element to enhance visual appeal --}}
    <div class="hidden md:block absolute bottom-0 right-0 w-1/3 h-32 bg-orange-100 rounded-tl-full opacity-50 transform translate-y-10"></div>
</section>