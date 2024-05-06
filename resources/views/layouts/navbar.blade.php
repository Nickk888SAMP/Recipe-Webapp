<header x-data="{ mobileCategoriesOpen: false }" class="w-full shadow-lg bg-white sticky z-50 top-0">
    <nav class="md:container mx-auto p-4 w-full">
        <div class="flex justify-between items-center">

            {{-- Logo --}}
            <div>
                <a href="{{ route('home.index') }}">
                    <div class="flex justify-normal items-center space-x-1">
                        <img class="w-11 h-11" src="{{ asset('img/cook-book.png') }}" alt="logo">
                        <p class="text-2xl font-semibold text-orange-500">Das Kochbuch</p>
                    </div>
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <div class="md:hidden">
                <button 
                x-on:click="mobileCategoriesOpen = !mobileCategoriesOpen" 
                class="w-10 h-10 rounded-full flex justify-center">
                    <svg class="w-7 text-orange-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                </button>
            </div>

            {{-- Search --}}
            <div class="hidden md:flex w-1/2 relative">  
                <div class="absolute flex items-center inset-y-0 left-3">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg> 
                </div> 
                    
                    <input name="search-prompt" type="text" class="pl-10 w-full placeholder:font-semibold outline-none border-2 border-orange-300 rounded-full p-2 hover:border-orange-500 focus:border-orange-400" placeholder="z.B. Pfannkuchen, Lasagne, Low Carb">
                    {{-- <button class="border-2 border-red-300 rounded-full p-2 ml-2">Suche</button> --}}
            </div>

            {{-- Login Button --}}
            <div class="hidden md:flex space-x-6">
                <a class="font-semibold text-orange-500 text-lg hover:text-orange-300 transition" href="#">Anmelden</a>
            </div>

            {{-- Logged In Avatar --}}
            {{-- <div class="hidden md:flex">
                <button>
                    <img class="w-10 rounded-full" src="{{ asset('img/avatar-3.jpeg') }}" alt="avatar">
                </button>
            </div> --}}
        </div>

        {{-- Categories --}}
        <div class="hidden md:flex justify-center space-x-10 pt-4 font-medium text-lg text-slate-600">
            <a class="hover:text-orange-500 transition" href="#">Alle Rezepte</a>
            <a class="hover:text-orange-500 transition" href="#">Kochen</a>
            <a class="hover:text-orange-500 transition" href="#">Backen</a>
            <a class="hover:text-orange-500 transition" href="#">Schnell</a>
            <a class="hover:text-orange-500 transition" href="#">Neu</a>
            <a class="hover:text-orange-500 transition" href="#">Community</a>
            <a class="hover:text-orange-500 transition" href="#">Magazin</a>
        </div>
        
        {{-- Mobile Categories --}}
        <div x-show="mobileCategoriesOpen" 
        x-on:click.outside="mobileCategoriesOpen = false" 
        x-transition 
        class="md:hidden absolute w-full bg-white z-40 shadow-lg top-[100%] left-0 rounded-b-xl">
        <div class="flex flex-col text-center space-y-1 p-4 font-medium text-lg text-slate-600 divide-y">
            
            {{-- Login Button --}}
            <a class="font-semibold text-orange-500 text-lg p-4 transition" href="#">Anmelden</a>
            
            <a class="hover:text-orange-500 transition p-4" href="#">Alle Rezepte</a>
            <a class="hover:text-orange-500 transition p-4" href="#">Kochen</a>
            <a class="hover:text-orange-500 transition p-4" href="#">Backen</a>
            <a class="hover:text-orange-500 transition p-4" href="#">Schnell</a>
            <a class="hover:text-orange-500 transition p-4" href="#">Neu</a>
            <a class="hover:text-orange-500 transition p-4" href="#">Community</a>
            <a class="hover:text-orange-500 transition p-4" href="#">Magazin</a>
        </div>
    
    </nav>
</header>