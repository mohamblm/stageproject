<!-- Modifier la Modal de Formation -->
<div id="edit-formation-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="relative w-full max-w-4xl rounded-lg bg-white shadow-xl transition-all">
            <!-- En-tête Modal -->
            <div class="flex items-center justify-between rounded-t-lg bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                <h3 class="text-xl font-medium text-white">Modifier la Formation</h3>
                <button type="button" id="close-edit-modal" class="rounded-md bg-transparent text-white hover:bg-white hover:bg-opacity-20 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Corps Modal -->
            <div class="max-h-[calc(100vh-200px)] overflow-y-auto p-6">
                <form  id="edit-formation-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-formation-id" name="formation_id">
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Informations de Base -->
                        <div class="space-y-4 md:col-span-2">
                            <h4 class="text-lg font-medium text-gray-700">Informations de Base</h4>
                            
                            <div>
                                <label for="edit-nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" name="nom" id="edit-nom" class="mt-1 p-2 focus:outline-none block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="edit-etablissement_id" class="block text-sm font-medium text-gray-700">Établissement</label>
                                    <select name="etablissement_id" id="edit-etablissement_id" class="mt-1 p-2 focus:outline-none block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                                        <option value="">Sélectionner un établissement</option>
                                        @foreach($etablissements as $etablissement)
                                            <option value="{{ $etablissement->id }}">{{ $etablissement->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="edit-domaine_id" class="block text-sm font-medium text-gray-700">Domaine</label>
                                    <select name="domaine_id" id="edit-domaine_id" class="mt-1 p-2 focus:outline-none block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                                        <option value="">Sélectionner un domaine</option>
                                        @foreach($domaines as $domaine)
                                            <option value="{{ $domaine->id }}">{{ $domaine->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div>
                                <label for="edit-description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="edit-description" rows="4" class="mt-1 p-2 focus:outline-none block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
                            </div>
                            
                            <div>
                                <label for="edit-image" class="block text-sm font-medium text-gray-700">Image</label>
                                <div class="mt-1 flex items-center">
                                    <div id="edit-image-preview" class="relative h-32 w-32 overflow-hidden rounded-md border-2 border-dashed border-gray-300 bg-gray-100">
                                        <div class="flex h-full w-full items-center justify-center">
                                            <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <img id="edit-preview-image" class="absolute inset-0 h-full w-full object-cover" alt="Aperçu">
                                    </div>
                                    <label for="edit-image-upload" class="ml-5 cursor-pointer rounded-md bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Changer l'Image
                                    </label>
                                    <input id="edit-image-upload" name="image" type="file" accept="image/*" class="hidden" onchange="previewEditImage(this)">
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" name="trend" id="edit-trend" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <label for="edit-trend" class="ml-2 block text-sm text-gray-700">Marquer comme tendance</label>
                            </div>
                        </div>
                        
                        <!-- Section Sous-Titres -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4">
                            <h4 class="text-lg font-medium text-gray-700">Sous-Titres</h4>
                            
                            <div class="flex">
                                <input type="text" id="edit-sub-title-input" class="p-2 focus:outline-none block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Ajouter un sous-titre">
                                <button type="button" id="edit-add-sub-title" class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            
                            <div>
                                <ul id="edit-sub-titles-list" class="mt-2 list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <!-- Les sous-titres seront ajoutés ici dynamiquement -->
                                </ul>
                            </div>
                            
                            <!-- Champ caché pour stocker les données JSON -->
                            <input type="hidden" name="sub_titles" id="edit-sub-titles-json">
                        </div>
                        
                        <!-- Section Prérequis -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4">
                            <h4 class="text-lg font-medium text-gray-700">Prérequis</h4>
                            
                            <div class="flex">
                                <input type="text" id="edit-requirement-input" class=" p-2 focus:outline-none block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Ajouter un prérequis">
                                <button type="button" id="edit-add-requirement" class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            
                            <div>
                                <ul id="edit-requirements-list" class="mt-2 list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <!-- Les prérequis seront ajoutés ici dynamiquement -->
                                </ul>
                            </div>
                            
                            <!-- Champ caché pour stocker les données JSON -->
                            <input type="hidden" name="requirements" id="edit-requirements-json">
                        </div>
                        
                        <!-- Section Inclus -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4 md:col-span-2">
                            <h4 class="text-lg font-medium text-gray-700">Ce qui est inclus</h4>
                            
                            <div class="flex">
                                <input type="text" id="edit-include-input" class="p-2 focus:outline-none block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Ajouter ce qui est inclus">
                                <button type="button" id="edit-add-include" class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            
                            <div>
                                <ul id="edit-includes-list" class="mt-2 list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <!-- Les éléments inclus seront ajoutés ici dynamiquement -->
                                </ul>
                            </div>
                            
                            <!-- Champ caché pour stocker les données JSON -->
                            <input type="hidden" name="includes" id="edit-includes-json">
                        </div>
                        
                        <!-- Section Langues (Optionnelle) -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4 md:col-span-2">
                            <h4 class="text-lg font-medium text-gray-700">Langues</h4>
                            
                            <div class="flex flex-wrap gap-2">
                                <div class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="French" id="edit-lang-french" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <label for="edit-lang-fr" class="ml-2 text-sm text-gray-700">Français</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="English" id="edit-lang-english" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <label for="edit-lang-en" class="ml-2 text-sm text-gray-700">Anglais</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="Arabic" id="edit-lang-arabic" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <label for="edit-lang-ar" class="ml-2 text-sm text-gray-700">Arabe</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="languages[]" value="Spanish" id="edit-lang-spanish" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <label for="edit-lang-es" class="ml-2 text-sm text-gray-700">Espagnol</label>
                                </div>
                                <!-- Ajouter d'autres langues si nécessaire -->
                            </div>
                        </div>
                        
                        <!-- Section Pour Qui -->
                        <div class="space-y-4 rounded-lg bg-gray-50 p-4 md:col-span-2">
                            <h4 class="text-lg font-medium text-gray-700">À qui s'adresse cette formation ?</h4>
                            
                            <div class="flex">
                                <input type="text" id="edit-for-who-input" class="p-2 focus:outline-none block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Ajouter un public cible">
                                <button type="button" id="edit-add-for-who" class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                            
                            <div>
                                <ul id="edit-for-whos-list" class="mt-2 list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <!-- Les entrées "pour qui" seront ajoutées ici dynamiquement -->
                                </ul>
                            </div>
                            
                            <!-- Champ caché pour stocker les données JSON -->
                            <input type="hidden" name="for_whos" id="edit-for-whos-json">
                        </div>
                    </div>
                    
                    <!-- Boutons de Soumission -->
                    <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 pt-5">
                        <button type="button" id="cancel-edit-formation" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Annuler
                        </button>
                        <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="mr-2 -ml-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Mettre à jour la Formation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


