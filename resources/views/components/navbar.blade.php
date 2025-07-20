<header class="absolute top-0 left-0 w-full z-40 p-4 flex items-center pointer-events-none">
    <div class="flex-1 text-center pointer-events-auto">
        <h1 class="text-2xl font-bold text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.6);">StitchLocator</h1>
    </div>
    <div class="absolute top-4 right-4 pointer-events-auto">
        @auth
            <button id="profileButton" class="w-10 h-10 rounded-full overflow-hidden border-2 border-white shadow-lg flex items-center justify-center bg-gray-200 focus:outline-none pointer-events-auto">
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover">
                @else
                    <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                @endif
            </button>
        @else
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow-lg pointer-events-auto">
                Login
            </a>
        @endauth
    </div>
</header>
