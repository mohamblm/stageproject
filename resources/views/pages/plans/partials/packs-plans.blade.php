<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Nos Offres de Services</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Pack Standard -->
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-center mb-4">Pack Standard</h3>
                    <p class="text-center text-gray-600 mb-6">
                        Accès aux éléments essentiels pour démarrer avec une qualité de base.
                    </p>
                    
                    <!-- Service Categories -->
                    <div class="space-y-4">
                        <!-- Ingénierie de formation -->
                        <div class="border-b border-gray-200 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('standard-formation')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-500 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                        {{-- <svg id="standard-formation-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg> --}}
                                        
                                    </div>
                                    <span class="font-semibold">Ingénierie de formation</span>
                                </div>
                                <svg id="standard-formation-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="standard-formation" class="mt-3 hidden text-gray-600 text-sm pl-8 space-y-2">
                                <p>- Analyse des besoins de formation.</p>
                                <p>- Conception de programmes de formation personnalisés.</p>
                                <p>- Création de supports de formation de base.</p>
                            </div>
                        </div>
                        
                        <!-- Conseil au Recrutement -->
                        <div class="border-b border-gray-200 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('standard-recrutement')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-500 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Conseil au Recrutement</span>
                                </div>
                                <svg id="standard-recrutement-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="standard-recrutement" class="mt-3 hidden text-gray-600 text-sm pl-8 space-y-2">
                                <p>- Évaluation des besoins en personnel.</p>
                                <p>- Rédaction d'offres d'emploi standard.</p>
                                <p>- Référencement de candidats via votre réseau.</p>
                            </div>
                        </div>
                        
                        <!-- Formation Continue -->
                        <div class="border-b border-gray-200 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('standard-continue')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-500 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Formation Continue</span>
                                </div>
                                <svg id="standard-continue-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="standard-continue" class="mt-3 hidden text-gray-600 text-sm pl-8 space-y-2">
                                <p>- Accès à une variété de ressources en ligne, y compris des articles informatifs, des vidéos instructives et des webinaires éducatifs.</p>
                                <p>- Restez à jour grâce à des mises à jour trimestrielles sur les dernières tendances de l'industrie.</p>
                                <p>- Bénéficiez de l'accès à une bibliothèque de cours en ligne variés pour enrichir vos compétences.</p>
                                <p>- Participez à des sessions de webinaires mensuelles pour un apprentissage interactif.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-8 pb-8">
                    <button class="w-full bg-blue-900 text-white rounded-md py-3 font-semibold hover:bg-blue-800 transition-colors duration-300">
                        Demande de devis
                    </button>
                </div>
            </div>
            
            <!-- Pack Gold -->
            <div class="bg-blue-900 rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl text-white transform scale-105">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-center mb-4">Pack Gold</h3>
                    <p class="text-center text-blue-200 mb-6">
                        Accès à des outils et ressources plus élaborés, offrant une qualité supérieure.
                    </p>
                    
                    <!-- Service Categories -->
                    <div class="space-y-4">
                        <!-- Ingénierie de formation -->
                        <div class="border-b border-blue-800 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('gold-formation')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-400 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Ingénierie de formation</span>
                                </div>
                                <svg id="gold-formation-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="gold-formation" class="mt-3 hidden text-blue-200 text-sm pl-8 space-y-2">
                                <p>- Analyse approfondie des besoins de formation.</p>
                                <p>- Développement de programmes de formation avancés.</p>
                                <p>- Création de supports de formation haut de gamme.</p>
                            </div>
                        </div>
                        
                        <!-- Conseil au Recrutement -->
                        <div class="border-b border-blue-800 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('gold-recrutement')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-400 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Conseil au Recrutement</span>
                                </div>
                                <svg id="gold-recrutement-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="gold-recrutement" class="mt-3 hidden text-blue-200 text-sm pl-8 space-y-2">
                                <p>- Évaluation des besoins en personnel et planification stratégique du recrutement.</p>
                                <p>- Rédaction d'offres d'emploi attractives.</p>
                                <p>- Recherche active de candidats hautement qualifiés.</p>
                            </div>
                        </div>
                        
                        <!-- Formation Continue -->
                        <div class="border-b border-blue-800 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('gold-continue')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-400 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Formation Continue</span>
                                </div>
                                <svg id="gold-continue-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="gold-continue" class="mt-3 hidden text-blue-200 text-sm pl-8 space-y-2">
                                <p>- Profitez d'un accès étendu à des ressources en ligne avancées et à des cours en ligne approfondis.</p>
                                <p>- Participez à des sessions de formation en direct trimestrielles pour un apprentissage pratique.</p>
                                <p>- Obtenez des certifications officielles avec l'accès à des formations certifiantes reconnues.</p>
                                <p>- Accédez en priorité à des événements en personne pour le réseautage et l'apprentissage en face-à-face.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-8 pb-8">
                    <button class="w-full bg-white text-blue-900 rounded-md py-3 font-semibold hover:bg-gray-100 transition-colors duration-300">
                        Demande de devis
                    </button>
                </div>
            </div>
            
            <!-- Pack Premium -->
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-center mb-4">Pack Premium</h3>
                    <p class="text-center text-gray-600 mb-6">
                        Accès à des éléments exclusifs et personnalisés, garantissant une qualité exceptionnelle.
                    </p>
                    
                    <!-- Service Categories -->
                    <div class="space-y-4">
                        <!-- Ingénierie de formation -->
                        <div class="border-b border-gray-200 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('premium-formation')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-500 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Ingénierie de formation</span>
                                </div>
                                <svg id="premium-formation-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="premium-formation" class="mt-3 hidden text-gray-600 text-sm pl-8 space-y-2">
                                <p>- Analyse approfondie des besoins de formation.</p>
                                <p>- Conception de programmes de formation de pointe.</p>
                                <p>- Création de supports de formation personnalisés haut de gamme.</p>
                            </div>
                        </div>
                        
                        <!-- Conseil au Recrutement -->
                        <div class="border-b border-gray-200 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('premium-recrutement')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-500 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Conseil au Recrutement</span>
                                </div>
                                <svg id="premium-recrutement-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="premium-recrutement" class="mt-3 hidden text-gray-600 text-sm pl-8 space-y-2">
                                <p>- Évaluation complète des besoins en personnel, planification stratégique et recrutement exclusif.</p>
                                <p>- Rédaction d'offres d'emploi hautement personnalisées.</p>
                                <p>- Recherche active et approfondie de candidats hautement qualifiés avec garantie de placement.</p>
                            </div>
                        </div>
                        
                        <!-- Formation Continue -->
                        <div class="border-b border-gray-200 pb-3">
                            <button 
                                class="flex items-center justify-between w-full text-left focus:outline-none"
                                onclick="toggleDetails('premium-continue')"
                            >
                                <div class="flex items-center">
                                    <div class="text-orange-500 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Formation Continue</span>
                                </div>
                                <svg id="premium-continue-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="premium-continue" class="mt-3 hidden text-gray-600 text-sm pl-8 space-y-2">
                                <p>- Bénéficiez de l'accès complet à toutes les ressources en ligne, y compris des ressources de pointe, des cours en ligne complets et des formations en personne.</p>
                                <p>- Participez à des sessions de formation en direct mensuelles pour une immersion régulière dans de nouveaux sujets.</p>
                                <p>- Profitez de sessions de coaching individuelles pour un développement personnalisé.</p>
                                <p>- Explorez une bibliothèque exclusive de ressources de haute qualité.</p>
                                <p>- Collaborez avec d'autres professionnels à travers la participation à des projets collaboratifs stimulants.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-8 pb-8">
                    <button class="w-full bg-blue-900 text-white rounded-md py-3 font-semibold hover:bg-blue-800 transition-colors duration-300">
                        Demande de devis
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDetails(id) {
        const detailElement = document.getElementById(id);
        const iconElement = document.getElementById(`${id}-icon`);
        
        if (detailElement.classList.contains('hidden')) {
            detailElement.classList.remove('hidden');
            iconElement.classList.add('rotate-180');
        } else {
            detailElement.classList.add('hidden');
            iconElement.classList.remove('rotate-180');
        }
    }
</script>