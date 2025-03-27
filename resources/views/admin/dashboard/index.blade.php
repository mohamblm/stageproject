@extends('admin.layouts.admin')

@section('content')
    <!-- Welcome Message -->
    <div class="px-4 md:px-6 py-2 bg-gray-100">
        <p class="text-gray-500">Salut {{ $userName }}, Bon retour 👋</p>
        <h2 class="text-2xl font-bold text-gray-800">Votre tableau de bord aujourd'hui</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 p-4">
        <!-- Formations Card -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 flex items-center">
                <div class="p-3 rounded-full bg-blue-100 mr-4">
                    <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500">Formations</p>
                    <p class="text-3xl font-bold">{{ $formationsNumber }}</p>
                </div>
            </div>
        </div>

        <!-- Domaines Card -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 flex items-center">
                <div class="p-3 rounded-full bg-pink-100 mr-4">
                    <svg class="h-8 w-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500">Domaines</p>
                    <p class="text-3xl font-bold">{{ $domainesNumber }}</p>
                </div>
            </div>
        </div>

        <!-- Inscriptions Card -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 mr-4">
                    <svg class="h-8 w-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500">Inscriptions</p>
                    <p class="text-3xl font-bold">{{ $inscriptionsNumber }}</p>
                </div>
            </div>
        </div>
        
        <!-- Etablissements Card -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 flex items-center">
                <div class="p-3 rounded-full bg-green-100 mr-4">
                    <svg class="h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500">Etablissements</p>
                    <p class="text-3xl font-bold">{{ $etablissementsNumber }}</p>
                </div>
            </div>
        </div>
        
        <!-- Utilisateurs Card -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 flex items-center">
                <div class="p-3 rounded-full bg-purple-100 mr-4">
                    <svg class="h-8 w-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500">Utilisateurs</p>
                    <p class="text-3xl font-bold">{{ $utilisateursNumber }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection