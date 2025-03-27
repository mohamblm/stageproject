<div class=" bg-gray-100">
    <!-- Blue Background Section - No bottom padding so it touches the card -->
    <div class="pt-40 bg-blue-500">
        <!-- Profile Card - Positioned to overlap with the blue background -->
        <div class="left-0 right-0 mx-auto" style="max-width: 1000px; top: 50%">
            <div class="bg-white  shadow p-6">
                <!-- User Information - Horizontal layout -->
                <div class="flex items-center space-x-20"> <!-- Added space between image and content -->
                    <!-- User Image -->
                    <div class="border-4 border-blue-500 p-1 rounded-full"> <!-- Added border around image -->
                        @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" 
                                alt="{{ Auth::user()->name }}" 
                                class="h-28 w-28 rounded-full object-cover">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500 text-xl font-bold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- User Text Information -->
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 mb-2 uppercase"> <!-- Increased font size, weight, and capitalization -->
                            {{ Auth::user()->name }}
                        </h1>
                        <p class="text-gray-600 text-lg font-medium"> <!-- Increased font size and weight -->
                            {{ Auth::user()->status }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tab navigation - directly connected to the top section with no space -->
    <div class="bg-white shadow-sm">
        @include('profile.partials.side-bar')
    </div>
</div>