@php
    $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">

    <head>

        {{-- Meta --}}
        <meta charset="UTF-8">
        <title>Das Kochbuch - 350.000 Rezepte zum Nachkochen.</title>
        
        {{-- Java Scripts --}}
        @vite('resources/js/app.js')

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
        @livewire('wire-elements-modal')
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