<!-- resources/views/components/who-we-are.blade.php -->
<section class="relative overflow-hidden">
    <!-- Blue ripple background -->
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 right-0 w-2/3 h-full bg-cyan-600 skew-x-12 transform origin-top-right"></div>
    </div>
    
    <div class="container mx-auto px-6 py-20 relative z-10">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Text content (left side) -->
            <div class="w-full md:w-1/2 pr-0 md:pr-8 mb-8 md:mb-0">
                <h2 class="text-5xl font-bold mb-10">Qui Sommes-Nous ?</h2>
                <div class="prose prose-lg ">
                    <p class="leading-loose">
                        Notre plateforme est dédiée à l’accompagnement des établissements de formation de l’OFPPT dans la région de
                        Beni Mellal-Khénifra. Elle vous permet de découvrir les différentes formations proposées, d’obtenir des devis personnalisés en fonction de l’établissement et 
                        de la formation choisie, et d’accéder à des formations continues de haute qualité dans ces établissements.
                        Grâce à notre plateforme, vous pouvez facilement explorer les programmes de formation proposés par l’OFPPT, choisir le plan de formation qui correspond le mieux 
                        à vos besoins, et obtenir un devis détaillé pour chaque option. Une fois votre choix effectué, vous serez en mesure de vous inscrire et de participer à des sessions de formation continue dans l’établissement de votre choix, avec un accès à des ressources professionnelles de pointe.
                        Nous visons à rendre la formation continue accessible et simplifiée, en offrant des solutions adaptées à chaque profil et chaque besoin spécifique.
                    </p>
                </div>
                
                <div class="mt-10">
                    <a href=" {{route('plans')}}" class="bg-cyan-600 hover:bg-pink-700 text-white font-bold py-3 px-8 rounded-md inline-block transition duration-300">
                       Commencez avec nous
                    </a>
                </div>
            </div>
            
            <!-- Image (right side) -->
            <div class="w-full md:w-1/2">
                <div class="relative">
                    <img 
                        src="{{ asset('images/about-introduction.png') }}"  
                        alt="Cream colored cat with green eyes" 
                        class="rounded-lg shadow-lg w-full h-auto"
                    />
                </div>
            </div>
        </div>
    </div>
</section>