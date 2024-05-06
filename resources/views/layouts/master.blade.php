<!DOCTYPE html>
<html lang="en">

    <head>

        {{-- Meta --}}
        <meta charset="UTF-8">
        <title>Das Kochbuch - 350.000 Rezepte zum Nachkochen.</title>

        {{-- Scripts --}}
        <script src="//unpkg.com/alpinejs" defer></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        {{-- Style --}}
        @vite('resources/css/app.css')

    </head>

    <body class="antialiased">

        {{-- Navbar --}}
        @include('layouts.navbar')
        

        {{-- Content --}}
        <div class="p-5 mx-auto md:w-[90%] lg:w-[80%] xl:w-[70%] max-w-6xl">
            @yield('content')
        </div>

        {{-- Footer --}}
        @include('layouts.footer')
        
        {{-- Scripts --}}
        @include('layouts.scripts')

    </body>
</html>