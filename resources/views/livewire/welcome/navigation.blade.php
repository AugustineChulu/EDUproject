<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-end z-10">
    @auth
        <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-lg font-semibold text-gray-100 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>
            <i class="fas fa-home mr-1"></i>
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg font-semibold text-gray-100 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>
            <i class="fa-solid fa-right-to-bracket mr-1"></i>
            Log in
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ms-2 py-2 rounded-lg px-4 font-semibold text-gray-100 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>
                <i class="fa-solid fa-user-plus mr-1"></i>
                Register
            </a>
        @endif
    @endauth
</div>
