<!-- q&f-plnas.blade.php -->
<div class="container mx-auto py-8 px-4 md:px-6 lg:px-8 max-w-4xl">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Questions Fréquentes</h2>
        <p class="text-blue-600 hover:text-blue-800 transition duration-300">
            <a href="#contact">Contactez-nous pour plus d'informations</a>
        </p>
    </div>

    <div class="space-y-4">
        <!-- Question 1 -->
        <div class="border border-gray-200 rounded-lg overflow-hidden">
            <div class="qa-header flex justify-between items-center p-4 bg-white cursor-pointer" 
                onclick="toggleAnswer('answer1', 'icon1')">
                <div class="flex items-center">
                    <span class="text-orange-500 font-semibold mr-4">01</span>
                    <h3 class="font-medium text-gray-800">Combien de temps cela prend-il ?</h3>
                </div>
                <button id="icon1" class="qa-icon text-gray-400 transition-transform duration-300 transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
            <div id="answer1" class="qa-answer hidden p-4 bg-gray-50 border-t border-gray-200">
                <p class="text-gray-700">
                    Chaque pack est conçu pour offrir un niveau croissant de qualité et 
                    de personnalisation. Le Pack Standard offre des ressources de base, 
                    tandis que le Pack Gold propose des outils plus avancés, et le Pack 
                    Premium garantit un accompagnement exclusif et personnalisé 
                    pour répondre à tous vos besoins.
                </p>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="border border-gray-200 rounded-lg overflow-hidden">
            <div class="qa-header flex justify-between items-center p-4 bg-white cursor-pointer" 
                onclick="toggleAnswer('answer2', 'icon2')">
                <div class="flex items-center">
                    <span class="text-orange-500 font-semibold mr-4">02</span>
                    <h3 class="font-medium text-gray-800">Combien de temps cela prend-il ?</h3>
                </div>
                <button id="icon2" class="qa-icon text-gray-400 transition-transform duration-300 transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
            <div id="answer2" class="qa-answer hidden p-4 bg-gray-50 border-t border-gray-200">
                <p class="text-gray-700">
                    Le temps nécessaire varie selon le pack choisi et la complexité de votre projet. 
                    En général, nos délais de livraison sont de 1 à 2 semaines pour le Pack Standard, 
                    2 à 3 semaines pour le Pack Gold, et 3 à 4 semaines pour le Pack Premium qui inclut 
                    des services personnalisés plus approfondis.
                </p>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="border border-gray-200 rounded-lg overflow-hidden">
            <div class="qa-header flex justify-between items-center p-4 bg-white cursor-pointer" 
                onclick="toggleAnswer('answer3', 'icon3')">
                <div class="flex items-center">
                    <span class="text-orange-500 font-semibold mr-4">03</span>
                    <h3 class="font-medium text-gray-800">Comment communiquons-nous ?</h3>
                </div>
                <button id="icon3" class="qa-icon text-gray-400 transition-transform duration-300 transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
            <div id="answer3" class="qa-answer hidden p-4 bg-gray-50 border-t border-gray-200">
                <p class="text-gray-700">
                    Nous proposons plusieurs canaux de communication selon vos préférences : 
                    e-mail, téléphone, visioconférence, ou via notre plateforme client dédiée. 
                    Les clients Premium bénéficient d'un conseiller personnel disponible 
                    pendant les heures ouvrables pour répondre rapidement à toutes vos questions.
                </p>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="border border-gray-200 rounded-lg overflow-hidden">
            <div class="qa-header flex justify-between items-center p-4 bg-white cursor-pointer" 
                onclick="toggleAnswer('answer4', 'icon4')">
                <div class="flex items-center">
                    <span class="text-orange-500 font-semibold mr-4">04</span>
                    <h3 class="font-medium text-gray-800">Offrez-vous un support après la formation ?</h3>
                </div>
                <button id="icon4" class="qa-icon text-gray-400 transition-transform duration-300 transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
            <div id="answer4" class="qa-answer hidden p-4 bg-gray-50 border-t border-gray-200">
                <p class="text-gray-700">
                    Oui, nous offrons un support après formation variant selon votre pack. 
                    Le Pack Standard inclut 15 jours de support par e-mail, le Pack Gold 
                    propose 30 jours de support par e-mail et téléphone, tandis que le 
                    Pack Premium offre 3 mois de support complet avec des sessions de suivi 
                    personnalisées pour assurer votre réussite à long terme.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleAnswer(answerId, iconId) {
        const answer = document.getElementById(answerId);
        const icon = document.getElementById(iconId);
        
        // Toggle the answer visibility
        answer.classList.toggle('hidden');
        
        // Rotate the icon when opened
        if (answer.classList.contains('hidden')) {
            icon.classList.remove('rotate-180');
        } else {
            icon.classList.add('rotate-180');
        }
    }
</script>