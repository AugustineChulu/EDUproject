<div class="px-4 sm:px-4 py-3 flex items-center justify-between h-16 top-0 left-0 right-0 z-50 relative">
    
    <div id="navbarTitle" class="flex items-center text-white">
        <i class="fa-solid fa-book sm:pr-2"></i>
        <span class="font-semibold text-sm sm:text-xl uppercase tracking-tight">{{ config('app.name', 'Laravel') }}</span>
    </div>

    <div class="relative">
        @auth

        {{-- <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button class="flex items-center text-gray-900 bg-gray-500 h-full px-4 rounded-lg text-sm font-semibold focus:outline-none" type="submit">
                <i class="fa-solid fa-right-from-bracket sm:pr-1"></i>
                <span>{{ __('Logout') }}</span>
            </button>
        </form> --}}
        @endauth
    </div>

</div>
