@extends('admin.layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des formations') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="">
            <div class="flex justify-between items-center mb-2">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out"
                    id="show-add-modal">
                    Ajouter un Formation
                </button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Filtres -->
                    <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                        <form action="{{ route('admin.formations.index') }}" method="GET"
                            class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700">Recherche</label>
                                <input type="text" name="search" id="search"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12"
                                    placeholder="Nom de la formation..." value="{{ request('search') }}">
                            </div>

                            <div>
                                <label for="domaine" class=" block text-sm font-medium text-gray-700">Domaine</label>
                                <select name="domaine" id="domaine"
                                    class="select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12">
                                    <option value="">Tous</option>
                                    @foreach ($domaines as $domaine)
                                        <option value="{{ $domaine->id }}"
                                            {{ request('domaine') == $domaine->id ? 'selected' : '' }}>{{ $domaine->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="etablissement"
                                    class="select block text-sm font-medium text-gray-700">Établissement</label>
                                <select name="etablissement" id="etablissement"
                                    class=" select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 p-3 h-12">
                                    <option value="">Tous</option>
                                    @foreach ($etablissements as $etablissement)
                                        <option value="{{ $etablissement->id }}"
                                            {{ request('etablissement') == $etablissement->id ? 'selected' : '' }}>
                                            {{ $etablissement->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex items-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Filtrer
                                </button>
                                <a href="{{ route('admin.formations.index') }}"
                                    class="ml-2 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                    Réinitialiser
                                </a>
                            </div>
                        </form>
                    </div>

                    <!-- Tableau des formations -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Formation</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Établissement</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Domaine</th>
                                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th> --}}
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="formations-table-body">
                                @forelse($formations as $formation)
                                    <tr class="hover:bg-gray-50" data-formation-id="{{ $formation->id }}">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-20 w-20 overflow-hidden bg-gray-100">
                                                    <img src="{{ asset('storage/' . $formation->image) }}"
                                                        alt="{{ $formation->nom }}"
                                                        class="formation-image h-full w-full object-cover">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="formation-name text-sm font-medium text-gray-900">
                                                        {{ $formation->nom }}
                                                    </div>
                                                    <div class="trend-container text-sm text-gray-500">
                                                        @if ($formation->trend)
                                                            <span
                                                                class="formation-trend inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-blue-800">
                                                                Trending
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="formation-etablissement text-sm text-gray-900">
                                                {{ $formation->etablissement->nom }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="formation-domaine text-sm text-gray-900">
                                                {{ $formation->domaine->nom }}
                                            </div>
                                        </td>

                                        {{-- <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500 max-w-xs ">{{ $formation->description }}</div>
                                    </td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button type="button"
                                                class="text-yellow-600 hover:text-yellow-900 inline-flex items-center"
                                                onclick="openUpdateModal({{ $formation->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>


                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 inline-flex items-center"
                                                onclick="confirmDelete({{ $formation->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-10 text-center">
                                            <div class="py-8 text-center" id="empty-state">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                                <h3 class="mt-2 text-sm font-medium text-gray-900">No formations found</h3>
                                                <p class="mt-1 text-sm text-gray-500">Try clearing your filters or search
                                                    terms.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $formations->links() }}
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
                    Êtes-vous sûr de vouloir supprimer cet formation ? Cette action est irréversible.
                </p>
            </div>
            <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                <button type="button" onclick="closeDeleteModal()"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
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

    {{-- notifiation --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-4" class="fixed top-4 right-4 z-50 max-w-sm w-full">

            <div class="flex items-center p-5 bg-white rounded-lg shadow-xl border-l-4 border-l-green-500">
                <!-- Checkmark icon with animated circle -->
                <div class="flex-shrink-0 relative">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <svg class="w-8 h-8 absolute top-0 left-0 text-green-500 animate-[spin_4s_ease-in-out_infinite]"
                        viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1"
                            stroke-dasharray="1 3" />
                    </svg>
                </div>

                <!-- Message with title and content -->
                <div class="ml-4 flex-1">

                    <h4 class="text-sm font-bold text-gray-800 mb-0.5">Success!</h4>
                    <p class="text-sm text-gray-600">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    @include('admin.formations.create')
    @include('admin.formations.edit')
    <!-- Scripts pour le filtrage automatique -->
    <script>
    

         // Reset all lists
    function resetLists() {
        subTitles = [];
        requirements = [];
        includes = [];
        forWhos = [];
        
        document.getElementById('sub-titles-list').innerHTML = '';
        document.getElementById('requirements-list').innerHTML = '';
        document.getElementById('includes-list').innerHTML = '';
        document.getElementById('for-whos-list').innerHTML = '';
        
        document.getElementById('sub-titles-json').value = '[]';
        document.getElementById('requirements-json').value = '[]';
        document.getElementById('includes-json').value = '[]';
        document.getElementById('for-whos-json').value = '[]';
        
        // Reset image preview
        const preview = document.getElementById('preview-image');
        preview.style.display = 'none';
        preview.src = '';
    }


        // Fonctions pour le modal de suppression
        function confirmDelete(formationId) {
            document.getElementById('deleteForm').action = `/dashboardformations/${formationId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
       

        // Soumission automatique lors du changement des listes déroulantes
        document.querySelectorAll('.select').forEach(select => {
            select.addEventListener('change', function() {
                this.form.submit();
            });
        });

        function closeModal() {
            document.getElementById('add-formation-modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            // Reset form
            document.getElementById('add-formation-form').reset();
            resetLists();
        }
        document.getElementById('show-add-modal').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('add-formation-modal').classList.remove('hidden');
        });
        document.getElementById('close-modal').addEventListener('click',closeModal);
    document.getElementById('cancel-add-formation').addEventListener('click',closeModal);
    // Show modal function
    function openUpdateModal(formationId) {
        // Show the modal
        document.getElementById('edit-formation-modal').classList.remove('hidden');
        
        // Fetch formation data by ID
        fetch(`/dashboardformations/${formationId}`)
            .then(response => response.json())
            .then(formation => {
                // Populate the form with formation data
                populateEditForm(formation);
            })
            .catch(error => {
                console.error('Error fetching formation:', error);
                alert('Failed to load formation data');
            });
    };
     
    // Populate form with formation data
    function populateEditForm(formation) {
        // Set formation ID
        document.getElementById('edit-formation-id').value = formation.id;
        
        // Basic information
        document.getElementById('edit-nom').value = formation.nom;
        document.getElementById('edit-etablissement_id').value = formation.etablissement_id;
        document.getElementById('edit-domaine_id').value = formation.domaine_id;
        document.getElementById('edit-description').value = formation.description;
        document.getElementById('edit-trend').checked = formation.trend;
        
        // Preview image if exists
        if (formation.image) {
            const previewImage = document.getElementById('edit-preview-image');
            previewImage.src = `/storage/${formation.image}`;
            previewImage.style.display = 'block';
        }
        
        // Reset and populate dynamic lists
        resetEditLists();
        
        // Populate sub titles
        if (formation.sub_titles) {
            try {
                editSubTitles = JSON.parse(formation.sub_titles);
                refreshEditSubTitlesList();
            } catch (e) {
                console.error('Error parsing sub titles:', e);
            }
        }
        
        // Populate requirements
        if (formation.requirements) {
            try {
                editRequirements = JSON.parse(formation.requirements);
                refreshEditRequirementsList();
            } catch (e) {
                console.error('Error parsing requirements:', e);
            }
        }
        
        // Populate includes
        if (formation.includes) {
            try {
                editIncludes = JSON.parse(formation.includes);
                refreshEditIncludesList();
            } catch (e) {
                console.error('Error parsing includes:', e);
            }
        }
        
        // Populate for whos
        if (formation.for_whos) {
            try {
                editForWhos = JSON.parse(formation.for_whos);
                refreshEditForWhosList();
            } catch (e) {
                console.error('Error parsing for_whos:', e);
            }
        }
        
        // Populate languages
        if (formation.languages) {
            try {
                let languages = [];
                if (Array.isArray(formation.languages)) {
                    languages = formation.languages;
                } else if (typeof formation.languages === "string") {
                    languages = JSON.parse(formation.languages || '[]');
                }

                // Clear all checkboxes first
                document.querySelectorAll('input[name="languages[]"]').forEach(checkbox => {
                    checkbox.checked = false;
                });

                // Check the appropriate language checkboxes
                languages.forEach(lang => {
                    const checkbox = document.getElementById(`edit-lang-${lang.toLowerCase()}`);
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                });
            } catch (e) {
                console.error("Error parsing languages:", e);
            }
        }
    }

    function refreshEditForWhosList() {
        const list = document.getElementById('edit-for-whos-list');
        list.innerHTML = '';
        
        editForWhos.forEach((forWho, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                ${forWho}
                <button type="button" class="ml-2 text-red-500 hover:text-red-700" data-index="${index}">
                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            list.appendChild(li);
            
            // Add delete button event listener
            li.querySelector('button').addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                editForWhos.splice(index, 1);
                refreshEditForWhosList();
            });
        });
        
        // Update the hidden input
        document.getElementById('edit-for-whos-json').value = JSON.stringify(editForWhos);
    }

    // Reset all edit lists
    function resetEditLists() {
        editSubTitles = [];
        editRequirements = [];
        editIncludes = [];
        editForWhos = [];
        
        document.getElementById('edit-sub-titles-list').innerHTML = '';
        document.getElementById('edit-requirements-list').innerHTML = '';
        document.getElementById('edit-includes-list').innerHTML = '';
        document.getElementById('edit-for-whos-list').innerHTML = '';
    }
    // DOM Elements
    // const document.getElementById('edit-formation-modal') = document.getElementById('edit-formation-modal');
    // const document.getElementById('edit-formation-form') = document.getElementById('edit-formation-form');
    // const document.getElementById('close-edit-modal') = document.getElementById('close-edit-modal');
    // const document.getElementById('cancel-edit-formation') = document.getElementById('cancel-edit-formation');
    
    // // List management variables
    // let editSubTitles = [];
    // let editRequirements = [];
    // let editIncludes = [];
    // let editForWhos = [];
    

    

    
   
    
    
    
    
    
    // Sub Titles List Management
    document.getElementById('edit-add-sub-title').addEventListener('click', function() {
        const input = document.getElementById('edit-sub-title-input');
        const value = input.value.trim();
        
        if (value) {
            editSubTitles.push(value);
            input.value = '';
            refreshEditSubTitlesList();
            document.getElementById('edit-sub-titles-json').value = JSON.stringify(editSubTitles);
        }
    });
    
    function refreshEditSubTitlesList() {
        const list = document.getElementById('edit-sub-titles-list');
        list.innerHTML = '';
        
        editSubTitles.forEach((title, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                ${title}
                <button type="button" class="ml-2 text-red-500 hover:text-red-700" data-index="${index}">
                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            list.appendChild(li);
            
            // Add delete button event listener
            li.querySelector('button').addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                editSubTitles.splice(index, 1);
                refreshEditSubTitlesList();
                document.getElementById('edit-sub-titles-json').value = JSON.stringify(editSubTitles);
            });
        });
        
        // Update the hidden input
        document.getElementById('edit-sub-titles-json').value = JSON.stringify(editSubTitles);
    }
    
    // Requirements List Management
    document.getElementById('edit-add-requirement').addEventListener('click', function() {
        const input = document.getElementById('edit-requirement-input');
        const value = input.value.trim();
        
        if (value) {
            editRequirements.push(value);
            input.value = '';
            refreshEditRequirementsList();
        }
    });
    
    function refreshEditRequirementsList() {
        const list = document.getElementById('edit-requirements-list');
        list.innerHTML = '';
        
        editRequirements.forEach((requirement, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                ${requirement}
                <button type="button" class="ml-2 text-red-500 hover:text-red-700" data-index="${index}">
                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            list.appendChild(li);
            
            // Add delete button event listener
            li.querySelector('button').addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                editRequirements.splice(index, 1);
                refreshEditRequirementsList();
            });
        });
        
        // Update the hidden input
        document.getElementById('edit-requirements-json').value = JSON.stringify(editRequirements);
    }
    
    // Includes List Management
    document.getElementById('edit-add-include').addEventListener('click', function() {
        const input = document.getElementById('edit-include-input');
        const value = input.value.trim();
        
        if (value) {
            editIncludes.push(value);
            input.value = '';
            refreshEditIncludesList();
        }
    });
    
    function refreshEditIncludesList() {
        const list = document.getElementById('edit-includes-list');
        list.innerHTML = '';
        
        editIncludes.forEach((include, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                ${include}
                <button type="button" class="ml-2 text-red-500 hover:text-red-700" data-index="${index}">
                    <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
            list.appendChild(li);
            
            // Add delete button event listener
            li.querySelector('button').addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                editIncludes.splice(index, 1);
                refreshEditIncludesList();
            });
        });
        
        // Update the hidden input
        document.getElementById('edit-includes-json').value = JSON.stringify(editIncludes);
    }
    
    // For Who List Management
    document.getElementById('edit-add-for-who').addEventListener('click', function() {
        const input = document.getElementById('edit-for-who-input');
        const value = input.value.trim();
        
        if (value) {
            editForWhos.push(value);
            input.value = '';
            refreshEditForWhosList();
        }
    });
    
    
    
    // Image preview functionality
    window.previewEditImage = function(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const previewImage = document.getElementById('edit-preview-image');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    };
    
    // Close modal events
    document.getElementById('close-edit-modal').addEventListener('click', closeEditModal);
    document.getElementById('cancel-edit-formation').addEventListener('click', closeEditModal);
    
    function closeEditModal() {
        document.getElementById('edit-formation-modal').classList.add('hidden');
        document.getElementById('edit-formation-form').reset();
        resetEditLists();
        document.getElementById('edit-preview-image').style.display = 'none';
    }
    
    // Form submission
    document.getElementById('edit-formation-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formationId = document.getElementById('edit-formation-id').value;
        const formData = new FormData(this);
        
        // Make AJAX request to update formation
        fetch(`/dashboardformations/${formationId}`, {
            method: 'POST', // Laravel uses POST with _method=PUT
            body: formData,
            // headers: {
            //     'Content-Type': 'application/json'
            //     // 'X-Requested-With': 'XMLHttpRequest'
            // }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                handleUpdateSuccess(data.formation);
                showSuccessNotification(data.message)
            } else {
                alert(data.message || 'Failed to update formation');
            }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the formation');
            });
    });
    
    // Add keyboard event listener to close modal on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !document.getElementById('edit-formation-modal').classList.contains('hidden')) {
            closeEditModal();
        }
    });
    
    // Prevent clicks inside the modal from closing it
    // const modalContent = document.getElementById('edit-formation-modal').querySelector('.bg-white');
    document.getElementById('edit-formation-modal').querySelector('.bg-white').addEventListener('click', function(e) {
        e.stopPropagation();
    });
    
    // Close modal when clicking outside of it
    document.getElementById('edit-formation-modal').addEventListener('click', function(e) {
        if (e.target === document.getElementById('edit-formation-modal') || e.target === document.getElementById('edit-formation-modal').querySelector('.fixed.inset-0.bg-gray-900')) {
            closeEditModal();
        }
    });



    
    // Function to handle successful form submission in the edit modal
    function handleUpdateSuccess(updatedFormation) {
        // Find the table row for this formation by ID
        const tableRow = document.querySelector(`#formations-table-body tr[data-formation-id="${updatedFormation.id}"]`);
        
        if (tableRow) {
            // Update formation name
            const nameElement = tableRow.querySelector('.formation-name');
            if (nameElement) nameElement.textContent = updatedFormation.nom;

            // Update formation image
            const imageElement = tableRow.querySelector('.formation-image');
            if (imageElement && updatedFormation.image) {
                imageElement.src = `/storage/${updatedFormation.image}`;
            }

            // Update établissement name
            const etablissementElement = tableRow.querySelector('.formation-etablissement');
            console.log(etablissementElement, updatedFormation.etablissement?.nom)
            if (etablissementElement) {
                etablissementElement.textContent = updatedFormation.etablissement?.nom || 'N/A';
            }

            // Update domaine name
            const domaineElement = tableRow.querySelector('.formation-domaine');
            if (domaineElement) {
                domaineElement.textContent = updatedFormation.domaine?.nom || 'N/A';
            }

            // Update trending badge
            const trendingContainer = tableRow.querySelector('.trend-container');
            const existingBadge = tableRow.querySelector('.formation-trend');

            if (updatedFormation.trend) {
                if (!existingBadge) {
                    const newBadge = document.createElement('span');
                    newBadge.className = "formation-trend inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-blue-800";
                    newBadge.textContent = "Trending";
                    trendingContainer.appendChild(newBadge);
                }
            } else {
                if (existingBadge) {
                    existingBadge.remove();
                }
            }
        }

        // Close the modal
        closeEditModal();

    }


    // show notification function
    function showSuccessNotification(message) {
        // Remove existing notifications (if any)
        document.querySelectorAll('.success-notification').forEach(el => el.remove());

        // Create notification HTML
        const notification = document.createElement('div');
        notification.innerHTML = `
            <div x-data="{ show: true }" 
                x-show="show" 
                x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="fixed top-4 right-4 z-50 max-w-sm w-full success-notification">
                
                <div class="flex items-center p-5 bg-white rounded-lg shadow-xl border-l-4 border-l-green-500">
                    <div class="flex-shrink-0 relative">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <svg class="w-8 h-8 absolute top-0 left-0 text-green-500 animate-[spin_4s_ease-in-out_infinite]" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1" stroke-dasharray="1 3" />
                        </svg>
                    </div>
                    
                    <div class="ml-4 flex-1">
                        <h4 class="text-sm font-bold text-gray-800 mb-0.5">Success!</h4>
                        <p class="text-sm text-gray-600">${message}</p>
                    </div>
                </div>
            </div>
        `;

        // Append to the body
        document.body.appendChild(notification);

        // Remove notification after 5 seconds
        setTimeout(() => {
            notification.remove();
        }, 5000);
    }


    </script>
@endsection
