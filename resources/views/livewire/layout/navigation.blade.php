<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="">

    <!-- Primary Navigation Menu -->
    <div>
        <div class="flex justify-end h-16">

            {{-- <div class="flex">
                
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div> --}}

            <div id="navbarTitle" class="flex items-center text-white">
                {{-- <i class="fa-solid fa-book fa-2x sm:pr-5"></i> --}}

                <!-- Logo -->
                <div class="shrink-0 flex items-center mr-2">

                    <a href="{{ route('dashboard') }}" wire:navigate>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-red-500">
                            {{-- <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" /> --}}
                        
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">

                                <defs>
                                    <style>.cls-1{fill:#fff; stroke:none;}</style>
                                </defs>

                                <title>SMS logo</title>
                            
                                <path class="cls-1" d="M262.85,785.47a117.51,117.51,0,0,0-19.29-34.25,143.14,143.14,0,0,0-32.77-29.34c-12.93-8.59-31.12-18-54.07-27.81-21.81-9.37-37.32-18-46.08-25.62-7.76-6.75-11.53-14.15-11.53-22.61,0-9.86,4.27-17.76,13-24.13,9.4-6.83,22.08-10.29,37.68-10.29,14.32,0,25.18,2.27,32.3,6.73,7.82,4.91,16.77,12.57,26.6,22.78l4.75,4.93,50.09-40.14-4.5-5.83a127.82,127.82,0,0,0-52.26-40.22c-20.57-8.65-41.18-13-61.27-13-30.69,0-57.2,9.6-78.79,28.54-21.89,19.18-33,42.79-33,70.17a88.25,88.25,0,0,0,5.93,32.31c3.89,9.92,10,20,18.3,29.85a125.61,125.61,0,0,0,29.37,25.58c11,6.93,26.69,14.61,46.72,22.82,19.12,7.84,33.16,14.82,41.74,20.75a74.44,74.44,0,0,1,20.62,21.68c5.3,8.39,8,16.74,8,24.82,0,13.9-4.89,25.06-15,34.14-10.28,9.27-22.93,13.78-38.68,13.78-33.19,0-57.27-18-73.62-55l-2.63-6L12.29,827.66l2.88,7.65c12.65,33.53,31.09,59.12,54.8,76.06S121.5,937,152.46,937c32.12,0,59.88-11.13,82.53-33.07s34.23-49,34.23-80.29A114.31,114.31,0,0,0,262.85,785.47Z"/>
                            
                                <path class="cls-1" d="M982.82,785.47a117.78,117.78,0,0,0-19.3-34.25,142.93,142.93,0,0,0-32.77-29.34c-12.92-8.59-31.11-18-54.06-27.81-21.82-9.37-37.32-18-46.09-25.62-7.75-6.75-11.52-14.15-11.52-22.61,0-9.86,4.27-17.76,13-24.13,9.4-6.83,22.08-10.29,37.68-10.29,14.31,0,25.18,2.27,32.3,6.73,7.81,4.91,16.76,12.57,26.6,22.78l4.75,4.93,50.08-40.14-4.5-5.83a127.75,127.75,0,0,0-52.26-40.22c-20.56-8.65-41.18-13-61.27-13-30.68,0-57.19,9.6-78.79,28.54-21.89,19.18-33,42.79-33,70.17a88,88,0,0,0,5.93,32.31c3.88,9.92,10,20,18.29,29.85a125.81,125.81,0,0,0,29.37,25.58c11,6.94,26.7,14.62,46.72,22.82,19.12,7.85,33.17,14.82,41.74,20.75a74.6,74.6,0,0,1,20.63,21.68c5.29,8.4,8,16.75,8,24.82,0,13.9-4.89,25.06-14.95,34.14-10.28,9.27-22.93,13.78-38.67,13.78-33.2,0-57.28-18-73.63-55l-2.63-6-62.26,17.54,2.89,7.65c12.64,33.53,31.08,59.12,54.79,76.06s51.54,25.6,82.5,25.6c32.11,0,59.87-11.13,82.52-33.07s34.23-49,34.23-80.29A114.56,114.56,0,0,0,982.82,785.47Z"/>
                            
                                <path class="cls-1" d="M681.86,367.07a179,179,0,0,0-13.22-67.64c-3.58-15.55-7-30.5-10.57-45.83a41.92,41.92,0,0,1,4.14-.94c25.1-2.79,50.2-5.68,75.33-8.19,4.45-.45,5.5-2,5.46-6.2q-.27-36.39,0-72.78a7.74,7.74,0,0,0-4-7.37c-16.57-11-33-22.16-49.49-33.26q-46.93-31.6-93.87-63.23A40.25,40.25,0,0,0,566,54.8c-30,4.42-60,8.36-90.05,12.48Q396.14,78.23,316.32,89.17,252,98,187.75,107c-9,1.25-18,2.39-27,4-2,.35-4.81,2.11-5.23,3.74s1.52,4,2.87,5.76c1,1.26,2.68,2,4.09,2.9L328.16,231c1.64,1.06,3.35,2,5.37,3.24,2.26-8.4,4.18-16.23,6.49-23.95,5.14-17.1,12.39-33.24,28.35-42.8,9.26-5.54,19.49-10.74,29.93-12.79,21.74-4.28,43.85-7.06,65.92-9.15,25.39-2.41,50.87-.92,76.16,2,17,2,34,4.68,50.83,8,11.63,2.33,21.9,8.21,30.58,16.56-4.87-1.65-9.52-3.86-14.33-5.59-17.27-6.21-35.34-8.33-53.45-10.11a535.74,535.74,0,0,0-115,1.11c-16.58,1.95-33,4.56-48.55,11.18C372,176.65,359.77,189.88,355.31,210c-6.63,29.91-13.7,59.72-20.56,89.58-.16.68-.29,1.36-.43,2.07A179.76,179.76,0,0,0,379.8,499.06L263.32,942.57h98.62l45.35-173.51,95.14,226.47,94.84-224.59,44.64,171.63h98.91L624.29,498.85A179.42,179.42,0,0,0,681.86,367.07ZM411.12,291.94a715,715,0,0,1,181.67,0,117.92,117.92,0,1,1-181.67,0Zm91.25,456.47L406.12,519.29A179.52,179.52,0,0,0,598,519.11Z"/>
                            
                                <path class="cls-1" d="M837.88,222.85c-.83-1.16-2.43-1.77-3.7-2.59-18.63-12.13-37-24.74-56-36.16-9.08-5.44-14.65-11-12.8-22.45.93-5.8-2.54-8.52-8.5-8.82-1.83-.09-3.66,0-6.37,0v6.7q0,66,0,131.94c0,2,.21,4.53-.87,5.78-5.71,6.54-4,14-3.32,21.41.3,3.15,1.39,6.36,1,9.41-1,7.79-2.83,15.45-3.78,23.24-3.33,27.25-6.2,54.57-9.77,81.79-.77,5.92,1.53,8.59,6.26,10.23a53.79,53.79,0,0,0,36.17.07c6.42-2.24,7.25-4.12,6.43-11.07-2.41-20.41-4.61-40.85-7.31-61.22-1.41-10.61-4-21.06-5.49-31.66a111,111,0,0,1-.71-17.59c.11-6.13,1-12.25,1.08-18.37,0-1.77-1.48-3.56-2.29-5.34s-2.14-3.36-2.18-5.07c-.23-8.75-.11-17.52-.11-26.28V241.23l32-3.86c12.54-1.49,25.11-2.8,37.61-4.59,2.06-.29,4.79-2.28,5.41-4.11C841.12,227.19,839.17,224.62,837.88,222.85Z"/>
                            
                            </svg>
                            
                        </svg>
                    
                    </a>

                </div>

                <span class="font-semibold text-sm sm:text-xl uppercase tracking-tight">{{ config('app.name', 'Laravel') }}</span>

            </div>

            <button wire:click="logout" class="text-start font-semibold focus:outline-none mr-5">
                <x-dropdown-link>
                    <i class="fa-solid fa-right-from-bracket mr-1"></i>
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </button>

            <!-- Settings Dropdown -->
            {{-- <div class="hidden sm:flex sm:items-center">

                
                <x-dropdown align="right" width="48">

                    <button wire:click="logout" class="w-full text-start">
                        <x-dropdown-link>
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </button>

                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>

                    </x-slot>

                </x-dropdown>
            </div> --}}

            <!-- Hamburger -->
            {{-- <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}
            
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div> --}}
</nav>
