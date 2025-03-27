<!-- resources/views/user/formation-history.blade.php -->
<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6">Formation Historic</h2>
    
    @foreach($inscriptions->groupBy(function($inscription) {
        return $inscription->created_at?->isoFormat('D MMMM YYYY [à] HH:mm') ?? 'N/A';
    }) as $date => $dateInscriptions)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8 overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <span class="text-lg font-medium text-gray-800">{{ $date }}</span>
                
                @php
                    $totalCourses = $dateInscriptions->count();
                @endphp
                
                <div class="mt-2 text-sm text-gray-600">
                    <span class="inline-flex items-center mr-4">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                        </svg>
                        {{ $totalCourses }} formations
                    </span>
                </div>
            </div>
            
            <div class="px-6 py-4 divide-y divide-gray-200">
                @foreach($dateInscriptions as $inscription)
                    <div class="flex py-4 first:pt-0 last:pb-0">
                        <div class="w-24 h-20 flex-shrink-0 mr-4 overflow-hidden rounded">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $inscription->formation->image) }}" alt="{{ $inscription->formation->nom }}">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center mb-1">
                                <span class="text-yellow-500 mr-1">★ 4.7</span>
                                <span class="text-xs text-gray-500">(451,444 Reviews)</span>
                            </div>
                            <h3 class="text-base font-medium mb-1">{{ $inscription->formation->nom }}</h3>
                            <p class="text-sm text-gray-500">{{ $inscription->formation->etablissement->nom }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="bg-gray-50 px-6 py-3 text-right text-sm text-gray-600 border-t border-gray-200">
                <span>{{ $date }}</span>
            </div>
        </div>
    @endforeach
</div>