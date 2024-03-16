<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- <link href="{{ asset('assets/jquery-ui-CUV2xSFW.css') }}" rel="stylesheet"> --}}

        <!-- Scripts -->
        @vite([
            'resources/css/app.css', 
            'resources/js/app.js', 
            'resources/css/webfonts/all.css', 
            'resources/css/jquery-ui.css',
            // 'resources/js/jquery-ui.js', 
            'resources/js/customBehavioursJS.js'
        ])

    </head>

    <body class="font-sans antialiased overflow-hidden bg-green-900 dark:bg-green-900">

        <div class="min-h-screen">

            {{-- SIDEBAR --}}
            <livewire:layout.navigation />

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <div id="app">
                
                <div class="main h-screen flex flex-wrap justify-end overflow-hidden">
                    
                    @include('layouts.sidebar')
        
                    <div class="content w-full bg-gray-100 rounded-tl-lg sm:w-5/6">
                        
                        <div id="contentWrapper" class="w-full sm:p-5 overflow-auto">
        
                            <!-- Page Content -->
                            <main>
                                {{ $slot }}
                            </main>
                            
                        </div>

                    </div>

                </div>

            </div>
            
        </div>

    </body>

    <script>
        var currentRoute = "{{ Route::currentRouteName() }}";
    </script>

</html>
