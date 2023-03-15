@aware(['pageTitle' => config('app.name')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $pageTitle }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script>
            const DEBUG = {{ config('app.debug') ? "true" : "false" }};
        </script>
        @vite(['resources/css/app.css', 'resources/css/Notification-Bar.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @livewireStyles
    </head>
    <body class="antialiased scroll-smooth" x-init="">
        {{--Header--}}
        <x-header></x-header>

        {{--Cart Container--}}
        <div x-cloak x-show="$store.cartOpened" class="fixed bg-white top-1/4 right-0 w-[800px] h-1/2 z-10 py-4 px-4 shadow-lg rounded-l-lg
            animate__animated cart_container" x-transition:enter="animate__fadeInRightBig" x-transition:leave="animate__fadeOutRightBig">
            <x-cart.panel></x-cart.panel>
        </div>

        {{--Background image--}}
        <div id="background" class="fixed z-[-1] top-0 left-0 h-full w-full bg-black select-none object-cover">
            <img src="{{ asset('images/background.jpeg') }}" class="absolute top-0 left-0 w-full blur-[3px] object-cover"/>
            <div class="absolute top-0 left-0 w-full h-full bg-black/50"></div>
        </div>

        {{--Content--}}
        {{ $slot }}

        {{--Footer--}}
        <x-footer></x-footer>
        @livewireScripts
    </body>
</html>