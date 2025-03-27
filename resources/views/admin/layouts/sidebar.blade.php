<!-- admin/layouts/sidebar.blade.php -->
<aside :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" 
       class="fixed inset-y-0 left-0 z-30 w-64 bg-blue-900 text-white transform transition-transform duration-200 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
    <!-- Close button for mobile -->
    <div class="absolute top-0 right-0 p-2 lg:hidden">
        <button @click="sidebarOpen = false" class="p-1 text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    
      {{-- Logo --}}
      <div class="p-5 flex items-center space-x-2">
         <a href="{{ route('welcome') }}" class="flex items-center space-x-2">
            <i class="fas fa-graduation-cap text-cyan-500 text-2xl"></i>
            <span class="text-xl font-bold">FormationPro BM</span>
         </a>
      </div>

    <!-- Navigation -->
    <nav class="mt-8">
        <div class="px-4">
            <div class="relative">
                <a href="{{ route('dashboard.index') }}" class="flex items-center px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-800 transition-colors duration-200 {{ request()->routeIs('dashboard.*') ? 'bg-blue-800 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.formations.index') }}" class="flex items-center px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-800 transition-colors duration-200 {{ request()->routeIs('admin.formations.*') ? 'bg-blue-800 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span>Formations</span>
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.domaines.index') }}" class="flex items-center px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-800 transition-colors duration-200 {{ request()->routeIs('admin.domaines.*') ? 'bg-blue-800 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span>Domaines</span>
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.etablissements.index') }}" class="flex items-center px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-800 transition-colors duration-200 {{ request()->routeIs('admin.etablissements.*') ? 'bg-blue-800 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span>Etablissements</span>
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.inscriptions.index') }}" class="flex items-center px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-800 transition-colors duration-200 {{ request()->routeIs('admin.inscriptions.*') ? 'bg-blue-800 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span>Inscriptions</span>
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.utilisateurs.index') }}" class="flex items-center px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-800 transition-colors duration-200 {{ request()->routeIs('admin.utilisateurs.*') ? 'bg-blue-800 text-white' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Utilisateurs</span>
                </a>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.contacts.index') }}" class="flex items-center px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-800 transition-colors duration-200 {{ request()->routeIs('admin.utilisateurs.*') ? 'bg-blue-800 text-white' : '' }}">
                     <i class="fa-regular fa-message w-5 h-5 mr-3"></i>
                    <span>Contacts</span>
                </a>
            </div>
        </div>
    </nav>
</aside>