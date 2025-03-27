@extends('admin.layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Analytics Section -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-4">Statistiques des Utilisateurs</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                                <p class="text-2xl font-bold text-blue-600">{{ $totalUsers }}</p>
                                <p class="text-sm text-gray-600">Utilisateurs Totaux</p>
                            </div>
                            <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                                <p class="text-2xl font-bold text-green-600">{{ $individualCount }}</p>
                                <p class="text-sm text-gray-600">Comptes Individuels</p>
                            </div>
                            <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                                <p class="text-2xl font-bold text-purple-600">{{ $enterpriseCount }}</p>
                                <p class="text-sm text-gray-600">Comptes Entreprise</p>
                            </div>
                        </div>
                    </div>

                    <!-- Filtres -->
                    <div class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Filtres</h3>
                        <form action="{{ route('admin.utilisateurs.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700">Recherche</label>
                                <input type="text" 
                                       name="search" 
                                       id="search" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12" 
                                       placeholder="Nom, email, téléphone..." 
                                       value="{{ request('search') }}">
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                                <select name="status" 
                                        id="status" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12">
                                    <option value="">Tous</option>
                                    <option value="individuel" {{ request('status') == 'individuel' ? 'selected' : '' }}>Individuel</option>
                                    <option value="entreprise" {{ request('status') == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700">Rôle</label>
                                <select name="role" 
                                        id="role" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12">
                                    <option value="">Tous</option>
                                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="client" {{ request('role') == 'client' ? 'selected' : '' }}>Client</option>
                                </select>
                            </div>
                            
                            <div class="flex items-end gap-2">
                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 h-12 w-full transition-colors">
                                    Filtrer
                                </button>
                                <a href="{{ route('admin.utilisateurs.index') }}" 
                                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 h-12 flex items-center justify-center transition-colors w-1/3">
                                    Réinit
                                </a>
                            </div>
                        </form>
                    </div>

                    <!-- Tableau des utilisateurs -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom de l'utilisateur
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Téléphone
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date d'admission
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    @if ($user->image)
                                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}">
                                                    @else
                                                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                            <span class="text-blue-600 font-medium">{{ substr($user->name, 0, 1) }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $user->name }}
                                                    </div>
                                                    @if($user->nom && $user->prenom)
                                                    <div class="text-sm text-gray-500">
                                                        {{ $user->prenom }} {{ $user->nom }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $user->phone ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->status == 'entreprise' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                {{ $user->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                          {{$user->created_at?->isoFormat('D MMMM YYYY [à] HH:mm') ?? 'N/A'; }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button 
                                                type="button" 
                                                class="text-yellow-600 hover:text-yellow-900 inline-flex items-center" 
                                                onclick="openUpdateModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->nom }}', '{{ $user->prenom }}', '{{ $user->phone }}', '{{ $user->role }}', '{{ $user->status }}')"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>
                                            
                                            <button 
                                                type="button" 
                                                class="text-red-600 hover:text-red-900 inline-flex items-center" 
                                                onclick="confirmDelete({{ $user->id }})"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            Aucun utilisateur trouvé.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Confirmation de suppression</h3>
            </div>
            <div class="px-6 py-4">
                <p class="text-sm text-gray-500">
                    Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.
                </p>
            </div>
            <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                    Annuler
                </button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal de mise à jour -->
    <div id="updateModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Mise à jour de l'utilisateur</h3>
            </div>
            <form id="updateForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="px-6 py-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Information de base -->
                        <div>
                            <label for="update_name" class="block text-sm font-medium text-gray-700 mb-1">Nom d'utilisateur</label>
                            <input type="text" 
                                   name="name" 
                                   id="update_name" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3" 
                                   required>
                        </div>
                        
                        <div>
                            <label for="update_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" 
                                   name="email" 
                                   id="update_email" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3" 
                                   required>
                        </div>
                        
                        <div>
                            <label for="update_prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input type="text" 
                                   name="prenom" 
                                   id="update_prenom" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3">
                        </div>
                        
                        <div>
                            <label for="update_nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" 
                                   name="nom" 
                                   id="update_nom" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3">
                        </div>
                        
                        <div>
                            <label for="update_phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <input type="text" 
                                   name="phone" 
                                   id="update_phone" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3">
                        </div>
                        
                        <div>
                            <label for="update_role" class="block text-sm font-medium text-gray-700 mb-1">Rôle</label>
                            <select name="role" 
                                    id="update_role" 
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3"
                                    required>
                                <option value="client">Client</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="update_status" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                            <select name="status" 
                                    id="update_status" 
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3"
                                    required>
                                <option value="individuel">Individuel</option>
                                <option value="entreprise">Entreprise</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="update_password" class="block text-sm font-medium text-gray-700 mb-1">Nouveau mot de passe (laisser vide pour conserver)</label>
                            <input type="password" 
                                   name="password" 
                                   id="update_password" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3">
                        </div>
                        
                        <div>
                            <label for="update_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="update_password_confirmation" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 mb-3">
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="update_image" class="block text-sm font-medium text-gray-700 mb-1">Image de profil</label>
                            <input type="file" 
                                   name="image" 
                                   id="update_image" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-3">
                            <p class="text-xs text-gray-500">Formats acceptés: JPG, PNG. Max 2 MB.</p>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                    <button type="button" onclick="closeUpdateModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Fonctions pour le modal de suppression
        function confirmDelete(userId) {
            document.getElementById('deleteForm').action = `/users/${userId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
        
        // Fonctions pour le modal de mise à jour
        function openUpdateModal(userId, name, email, nom, prenom, phone, role, status) {
            // Définir l'action du formulaire
            document.getElementById('updateForm').action = `/users/${userId}`;
            
            // Remplir les champs avec les valeurs actuelles
            document.getElementById('update_name').value = name;
            document.getElementById('update_email').value = email;
            document.getElementById('update_nom').value = nom || '';
            document.getElementById('update_prenom').value = prenom || '';
            document.getElementById('update_phone').value = phone || '';
            
            // Sélectionner les options correctes dans les listes déroulantes
            const roleSelect = document.getElementById('update_role');
            for (let i = 0; i < roleSelect.options.length; i++) {
                if (roleSelect.options[i].value === role) {
                    roleSelect.selectedIndex = i;
                    break;
                }
            }
            
            const statusSelect = document.getElementById('update_status');
            for (let i = 0; i < statusSelect.options.length; i++) {
                if (statusSelect.options[i].value === status) {
                    statusSelect.selectedIndex = i;
                    break;
                }
            }
            
            // Vider les champs de mot de passe
            document.getElementById('update_password').value = '';
            document.getElementById('update_password_confirmation').value = '';
            
            // Afficher le modal
            document.getElementById('updateModal').classList.remove('hidden');
        }
        
        function closeUpdateModal() {
            document.getElementById('updateModal').classList.add('hidden');
        }
        
        // Fermer les modals si on clique en dehors
        window.addEventListener('click', function(event) {
            const deleteModal = document.getElementById('deleteModal');
            const updateModal = document.getElementById('updateModal');
            
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
            
            if (event.target === updateModal) {
                closeUpdateModal();
            }
        });
    </script>
@endsection