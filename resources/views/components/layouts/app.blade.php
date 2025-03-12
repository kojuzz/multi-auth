<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? "Page Title" }}</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
        @livewireStyles
    </head>

    <body class="antialiased">

        <div class="bg-gray-50 dark:bg-gray-900 h-screen">
            @if (Auth::user() && Auth::user()->role == "super")
                @livewire("partials.super-navbar")
                @livewire("partials.super-sidebar")
            @elseif (Auth::user() && Auth::user()->role == "admin")
                @livewire("partials.admin-navbar")
                @livewire("partials.admin-sidebar")
            @endif
            {{ $slot }}
        </div>
        
        @livewireScripts
        @yield('scripts')
    </body>

</html>