@extends('admin.layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
                        <a href="{{ route('admin.inscriptions.index') }}" 
                           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                            Retour
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- User Details -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium mb-4">Informations Personnelles</h3>
                            <dl class="space-y-4">
                               <div>
                                    <dt class="text-sm font-medium text-gray-500">NOM :</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $user->nom ?? 'le nom nom disponible' }}</dd>
                                </div>
                               <div>
                                    <dt class="text-sm font-medium text-gray-500">PRENOM :</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $user->prenom ?? 'le prenom nom disponible'}}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $user->email }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $user->phone ?? '-' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Statut</dt>
                                    <dd class="mt-1 text-sm text-gray-900 capitalize">{{ $user->status }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Date d'inscription</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{  $user->created_at ? $user->created_at->format('d/m/Y H:i') : 'Date non disponible' }}</dd>
                                </div>
                            </dl>
                        </div>
<!-- Inscriptions Section -->
<div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Historique des Inscriptions</h3>
                    
                    @if($user->inscriptions->count() > 0)
                    <dl class="space-y-6">
                        @foreach($user->inscriptions as $inscription)
                        <div class="border-b border-gray-200 pb-4 last:border-b-0">
                            <dt class="text-base font-medium text-gray-900">
                                {{ $inscription->formation->nom ?? 'Formation non spécifiée' }}
                            </dt>
                            
                            <dd class="mt-2 pl-4 space-y-2">
                                <div class="flex items-center space-x-3"> 
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H3m16 0h2m-2 0h-2m2-10H5m14 4H5"/>
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 ">Établissement :</p>
                                    <span class="text-sm text-gray-600">
                                        {{ $inscription->formation->etablissement->nom ?? 'Établissement inconnu' }}
                                    </span>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 ">PARTICIPANT(s) :</p>
                                    <span class="text-sm text-gray-600">
                                        {{ $inscription->number_personne }} participant(s)
                                    </span>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 ">INSCRIT le :</p>
                                    <span class="text-sm text-gray-500">
                                        Inscrit le {{ $inscription->created_at?->format('d/m/Y \à H:i') ?? 'date inconnue' }}
                                    </span>
                                </div>
                            </dd>
                        </div>
                        @endforeach
                    </dl>
                    @else
                    <div class="text-center py-6">
                        <p class="text-gray-500 text-sm">Aucune inscription enregistrée pour cet utilisateur</p>
                    </div>
                    @endif
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection