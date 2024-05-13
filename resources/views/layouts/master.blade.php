@php
    $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">

    <head>

        {{-- Meta --}}
        <meta charset="UTF-8">
        <title>Das Kochbuch - 350.000 Rezepte zum Nachkochen.</title>

        {{-- Scripts --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        {{-- Style --}}
        @vite('resources/css/app.css')
        @livewireStyles

    </head>
    
    <body class="antialiased">
        
        {{-- Navbar --}}
        @include('layouts.navbar') 
        
        {{-- Content --}}
        <div class="p-5 mx-auto md:w-[90%] lg:w-[80%] xl:w-[70%] max-w-6xl">
            @yield('content')
        </div>

        {{-- Scripts --}}
        @include('layouts.scripts')
        @livewire('livewire-ui-modal')
        @livewireScripts
    </body>

    <footer>

        {{-- Footer --}}
        @include('layouts.footer')

    </footer>

    {{-- Error handling --}}
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                
            </script>
        @endforeach
    @endif

</html>