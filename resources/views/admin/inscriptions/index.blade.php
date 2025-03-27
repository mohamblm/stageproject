@extends('admin.layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- Analytics Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Statistiques des Inscriptions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                            <p class="text-2xl font-bold text-blue-600">{{ $totalInscriptions }}</p>
                            <p class="text-sm text-gray-600">Inscriptions totales</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                            <p class="text-2xl font-bold text-green-600">{{ $averageParticipants }}</p>
                            <p class="text-sm text-gray-600">Participants moyen</p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                            <p class="text-2xl font-bold text-purple-600">{{ $uniqueFormations }}</p>
                            <p class="text-sm text-gray-600">Formations différentes</p>
                        </div>
                        <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                            <p class="text-2xl font-bold text-orange-600">{{ $uniqueEtablissements }}</p>
                            <p class="text-sm text-gray-600">Établissements</p>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Filtres</h3>
                    <form action="{{ route('admin.inscriptions.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700">Recherche</label>
                            <input type="text" 
                                   name="search" 
                                   id="search" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12" 
                                   placeholder="Nom, formation, établissement..."
                                   value="{{ request('search') }}">
                        </div>
                        
                        <div>
                            <label for="formation" class="block text-sm font-medium text-gray-700">Formation</label>
                            <select name="formation" 
                                    id="formation" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12">
                                <option value="">Toutes</option>
                                @foreach($formations as $formation)
                                <option value="{{ $formation->id }}" {{ request('formation') == $formation->id ? 'selected' : '' }}>
                                    {{ $formation->nom }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label for="date_range" class="block text-sm font-medium text-gray-700">Période</label>
                            <div class="flex gap-2 mt-1">
                                <input type="date" 
                                       name="start_date" 
                                       class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-2 h-12" 
                                       value="{{ request('start_date') }}">
                                <input type="date" 
                                       name="end_date" 
                                       class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-2 h-12" 
                                       value="{{ request('end_date') }}">
                            </div>
                        </div>
                        
                        <div class="flex items-end gap-2">
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 h-12 w-full transition-colors">
                                Filtrer
                            </button>
                            <a href="{{ route('admin.inscriptions.index') }}" 
                               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 h-12 flex items-center justify-center transition-colors w-1/3">
                                Réinit
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Utilisateur
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Établissement
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Formation
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Participants
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($inscriptions as $inscription)
                            <tr data-href="{{ route('admin.utilisateurs.show', $inscription->user_id) }}" 
                                class="transition-colors cursor-pointer hover:bg-gray-50"
                                onclick="handleRowClick(event, this)">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.utilisateurs.show', $inscription->user_id)}}" 
                                       class="text-blue-600 hover:text-blue-900 block">
                                        {{ $inscription->user->name ?? 'Utilisateur supprimé' }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $inscription->formation->etablissement->nom ?? '–' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $inscription->formation->nom ?? 'Formation supprimée' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $inscription->number_personne }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$inscription->created_at?->isoFormat('D MMMM YYYY [à] HH:mm') ?? 'N/A'; }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $inscriptions->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleRowClick(event, row) {
        if (event.target.tagName === 'A' || event.target.closest('a, button')) return;
        window.location.href = row.dataset.href;
    }
</script>
@endsection