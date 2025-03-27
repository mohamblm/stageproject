@foreach($formations ?? [] as $formation)
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden border border-gray-100">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/3 relative">
                <a href="{{ route('formation.show', ['id' => $formation->id]) }}" class="block h-full">
                    <img 
                        src="{{ asset('storage/'.$formation->image) }}" 
                        alt="{{ $formation->nom ?? 'Formation' }}" 
                        class="h-56 w-full object-cover md:h-full transition-transform duration-300 hover:scale-105"
                        loading="lazy"
                    >
                </a>
            </div>
            
            <div class="p-6 md:w-2/3 flex flex-col justify-between">
                <div>
                    <a href="{{ route('formation.show', ['id' => $formation->id]) }}" class="block group">
                        <h3 class="text-xl font-bold mb-3 text-gray-800 group-hover:text-blue-600 transition-colors duration-200">
                            {{ $formation->nom ?? 'Best LearnPress WordPress Theme Collection For 2023' }}
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-2">
                            {{ $formation->description ?? 'No description for this formation...' }}
                        </p>
                    </a>
                </div>
                
                <div class="flex items-center text-gray-500 space-x-4">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span>{{ $formation->etablissement->nom ?? 'Institution' }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        <span>{{ $formation->domaine->nom ?? 'Domain' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
