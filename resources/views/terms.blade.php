@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Conditions Générales d'Utilisation</h1>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">1. Acceptation</h2>
        <p class="text-gray-600 leading-relaxed">
            En utilisant ce site, vous acceptez ces conditions et la loi marocaine 09-08.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">2. Utilisation Responsable</h2>
        <p class="text-gray-600 leading-relaxed">
            Interdiction d'utiliser le site pour des activités illégales ou nuisibles.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">3. Propriété Intellectuelle</h2>
        <p class="text-gray-600 leading-relaxed">
            Tous les contenus (textes, images) sont protégés par le droit d'auteur marocain.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">4. Limitation de Responsabilité</h2>
        <p class="text-gray-600 leading-relaxed">
            Nous déclinons toute responsabilité pour :
        </p>
        <ul class="list-disc list-inside text-gray-600 space-y-2 pl-6">
            <li>Erreurs dans le contenu</li>
            <li>Indisponibilité temporaire du site</li>
            <li>Utilisation frauduleuse par des tiers</li>
        </ul>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">5. Liens Externes</h2>
        <p class="text-gray-600 leading-relaxed">
            Nous ne contrôlons pas les sites tiers liés et déclinons toute responsabilité.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">6. Protection des Données</h2>
        <p class="text-gray-600 leading-relaxed">
            Consultez notre <a href="{{ route('privacy') }}" class="text-blue-500 hover:underline transition-colors duration-200">Politique de Confidentialité</a> pour plus de détails.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">7. Conformité Légale</h2>
        <p class="text-gray-600 leading-relaxed">
            Vous vous engagez à respecter toutes les lois marocaines durant votre utilisation.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">8. Contact</h2>
        <p class="text-gray-600 leading-relaxed">
            Adresse : <span class="font-semibold text-gray-700">[Adresse]</span><br>
            Téléphone : <span class="font-semibold text-gray-700">[Téléphone]</span><br>
            E-mail : <a href="mailto:contact@example.com" class="text-blue-500 hover:underline transition-colors duration-200">contact@example.com</a>
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">9. Modifications</h2>
        <p class="text-gray-600 leading-relaxed">
            Dernière mise à jour : <span class="font-semibold text-gray-700">[Date]</span>. Les changements seront signalés par un avis visible.
        </p>
    </section>

    <section class="mb-12 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">10. Droit Applicable</h2>
        <p class="text-gray-600 leading-relaxed">
            Litiges soumis aux tribunaux marocains compétents.
        </p>
    </section>
</div>

@endsection