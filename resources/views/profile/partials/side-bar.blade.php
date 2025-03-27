<div class="container">
            <div class="flex justify-center border-b">
                <a href="{{ route('profile.section', 'wishlist') }}" 
                   class="px-8 py-3 text-center border-b-2 
                   {{ request()->is('profile/wishlist') ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-500' }}">
                   <i class="fa-solid fa-cart-shopping"></i> Liste de souhaits
                </a>
                <a href="{{ route('profile.section','historique') }}" 
                   class="px-8 py-3 text-center border-b-2
                   {{ request()->is('profile/historique') ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-500' }}">
                    <i class="fas fa-book"></i> Historique des formation
                </a>
                <a href="{{ route('profile.section', 'edite') }}" 
                   class="px-8 py-3 text-center border-b-2
                   {{ request()->is('profile/edite') ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-500' }}">
                   <i class="fas fa-cog"></i>edite votre profile
                </a>
            </div>
        </div>