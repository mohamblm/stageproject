@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Politique de Confidentialité</h1>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">1. Introduction</h2>
        <p class="text-gray-600 leading-relaxed">
            Bienvenue sur <span class="font-semibold text-gray-700">[Nom du Site]</span>. Nous nous engageons à protéger vos données personnelles conformément à la loi marocaine 09-08 et aux principes de la CNDP.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">2. Transparence des Collectes</h2>
        <p class="text-gray-600 leading-relaxed">
            <strong class="text-gray-700">Aucune donnée personnelle n'est collectée à votre insu.</strong> Toute collecte s'effectue avec votre consentement explicite.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">3. Données Collectées</h2>
        <h3 class="text-xl font-medium mb-2 text-gray-600">Méthodes de collecte :</h3>
        <ul class="list-disc list-inside text-gray-600 space-y-2 pl-6">
            <li><strong class="text-gray-700">Formulaires de contact</strong> : Nom, e-mail, téléphone (finalité : réponse à vos demandes).</li>
            <li><strong class="text-gray-700">Cookies techniques</strong> : Données d'usage anonymisées (conservées 2 ans).</li>
            <li><strong class="text-gray-700">Newsletter</strong> : E-mail (uniquement pour les communications demandées).</li>
            <li><strong class="text-gray-700">Comptes utilisateurs</strong> : Nom d'utilisateur, e-mail, mot de passe crypté.</li>
        </ul>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">4. Partage des Données</h2>
        <p class="text-gray-600 leading-relaxed">
            <strong class="text-gray-700">Aucun partage avec des tiers</strong>, sauf obligation légale (autorités judiciaires marocaines).
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">5. Droits des Utilisateurs</h2>
        <ul class="list-disc list-inside text-gray-600 space-y-2 pl-6">
            <li>Accès, rectification, suppression, opposition</li>
            <li>Contact : <a href="mailto:contact@example.com" class="text-blue-500 hover:underline transition-colors duration-200">contact@example.com</a></li>
        </ul>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">6. Cookies</h2>
        <p class="text-gray-600 leading-relaxed">
            <strong class="text-gray-700">Essentiels</strong> : Nécessaires au fonctionnement. <strong class="text-gray-700">Analytiques</strong> : Statistiques anonymes.
        </p>
        <p class="text-gray-600 mt-2 leading-relaxed">
            Gestion via les paramètres de votre navigateur.
        </p>
    </section>

    <section class="mb-12 border-b border-gray-200 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">7. Sécurité</h2>
        <p class="text-gray-600 leading-relaxed">
            Cryptage SSL, contrôles d'accès stricts, audits réguliers.
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

    <section class="mb-12 pb-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">9. Mises à Jour</h2>
        <p class="text-gray-600 leading-relaxed">
            Dernière modification : <span class="font-semibold text-gray-700">[Date]</span>. Les changements seront notifiés par un avis sur le site.
        </p>
    </section>
</div>

@endsection