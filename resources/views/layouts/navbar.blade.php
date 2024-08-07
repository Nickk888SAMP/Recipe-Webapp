<header x-data="{ mobileCategoriesOpen: false, profileMenu: false }" class="w-full shadow-lg bg-white sticky z-50 top-0">
    <nav class="md:container mx-auto p-4 w-full">
        <div class="flex justify-between md:justify-evenly items-center">

            {{-- Logo --}}
            <div>
                <a href="{{ route('home.index') }}">
                    <div class="flex justify-normal items-center space-x-1">
                        <img class="w-11 h-11" src="{{ asset('img/cook-book.png') }}" alt="logo">
                        <p class="text-2xl font-semibold text-primary">Das Kochbuch</p>
                    </div>
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <div class="md:hidden flex gap-2">

                {{-- Admin Panel Button --}}
                @if($user != null && $user->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 rounded-full flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 text-primary" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @endif

                {{-- Menu --}}
                <button 
                x-on:click="mobileCategoriesOpen = !mobileCategoriesOpen, profileMenu = false" 
                class="w-10 h-10 rounded-full flex justify-center">
                    <svg class="w-7 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                </button>
            </div>

            {{-- Search --}}
            <div class="hidden md:flex w-1/2 relative">  
                <div class="absolute flex items-center inset-y-0 left-3">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg> 
                </div> 
                
                <input name="search-prompt" type="text" class="pl-10 w-full placeholder:font-semibold outline-none border-2 border-primary  rounded-l-full p-2 hover:border-tritary focus:border-secondary" placeholder="z.B. Pfannkuchen, Lasagne, Suppen, Getränke, Schnell">
                    <button class="border-2 border-primary rounded-r-full bg-primary text-white p-2">Suche</button>
            </div>

            {{-- Login Button --}}
            @if (!auth()->check())
                <div class="hidden md:flex space-x-6">
                    <a class="font-semibold text-primary text-lg hover:text-tritary transition" href="{{ route('auth.login.index') }}">Anmelden</a>
                </div>
            @endif
            
            {{-- Logged In --}}
            @if (auth()->check())
                <div x-data="{ show: false }" class="hidden md:flex items-center gap-2">

                                        
                    {{-- Admin Panel Button --}}
                    @if($user != null && $user->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 rounded-full flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 text-primary" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endif  
                    
                    {{-- Avatar --}}
                    <button x-on:click="show = !show" class="hover:scale-110 transition">
                        <div class="flex flex-col justify-center items-center">
                            <img class="w-10 rounded-full" src="{{ $user->avatar() }}" alt="avatar">
                        </div>
                    </button>

                    
                    {{-- Menu --}}
                    <div x-cloak x-show="show" class="absolute top-0 translate-y-[25%] -translate-x-[40%]" x-on:click.outside="show = false">
                        <div class="relative bg-white p-4 shadow-lg font-medium text-lg flex flex-col gap-4 w-52 items-center">
                            <p class="text-sm font-semibold text-primary">Hallo, {{ $user->displayname }}</p>
                            <a class="hover:text-tritary text-slate-500  transition" href="{{ route('user.show', ['user' => $user]) }}">Mein Profil</a>
                            <a class="hover:text-tritary text-slate-500  transition" href="{{ route('dashboard.edit') }}">Profil Bearbeiten</a>
                            <a class="hover:text-tritary text-slate-500  transition" href="{{ route('dashboard.recipees') }}">Meine Rezepte</a>
                            <a class="hover:text-tritary text-slate-500  transition" href="{{ route('dashboard.reviews') }}">Meine Rezensionen</a>
                            <a class="hover:text-tritary text-slate-500  transition" href="{{ route('dashboard.messages') }}">Meine Nachrichten</a>
                            <a class="hover:text-tritary text-slate-500  transition" href="{{ route('dashboard.favorites') }}">Meine Favoriten</a>
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button class="hover:text-tritary text-primary transition">Abmelden</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Categories --}}
        <div class="hidden md:flex justify-center items-center space-x-10 pt-4 font-medium text-lg text-slate-500">
            {{-- <a class="hover:text-primary transition" href="#">Alle Rezepte</a> --}}
            <a class="hover:text-primary transition" href="{{ route('recipe.search', ['tags' => 'Kochen']) }}">Kochen</a>
            <a class="hover:text-primary transition" href="{{ route('recipe.search', ['tags' => 'Backen']) }}">Backen</a>
            <a class="hover:text-primary transition" href="{{ route('recipe.search', ['tags' => 'Schnell']) }}">Schnell</a>
            {{-- <a class="hover:text-primary transition" href="#">Neu</a> --}}
            {{-- <a class="hover:text-primary transition" href="#">Community</a> --}}
            {{-- <a class="hover:text-primary transition" href="#">Magazin</a> --}}
        </div>

        
        {{-- Mobile Categories --}}
        <div x-cloak x-show="mobileCategoriesOpen" 
        x-on:click.outside="mobileCategoriesOpen = false, profileMenu = false" 
        x-transition 
        class="md:hidden absolute w-full bg-white z-40 shadow-lg top-[100%] left-0 rounded-b-xl">
        <div class="flex flex-col text-center space-y-1 p-4 font-medium text-lg text-slate-500">
            
            <div>
                @if (!auth()->check())
                    {{-- Login Button --}}
                    <a class="font-semibold text-primary text-lg p-4 transition" href="{{ route('auth.login.index') }}">Anmelden</a>
                @else
                    <div class="flex justify-center items-center divide-y">

                        {{-- Avatar --}}
                        <div class="flex flex-col justify-center items-center">
                            <button x-on:click="profileMenu = !profileMenu" class="hover:scale-110 transition">
                                <img class="w-10 rounded-full" src="{{ $user->avatar() }}" alt="avatar">
                            </button>
                            <p class="text-sm font-semibold text-primary">Hallo, {{ $user->displayname }}</p>
                        </div>
                        
                        
                    </div>

                    {{-- Profile List --}}
                    <div x-cloak x-show.transition="profileMenu" class="flex flex-col divide-y" >
                        <a class="hover:text-primary transition p-4" href="{{ route('user.show', ['user' => $user]) }}">Mein Profil</a>
                        <a class="hover:text-primary transition p-4" href="{{ route('dashboard.edit') }}">Profil Bearbeiten</a>
                        <a class="hover:text-primary transition p-4" href="{{ route('dashboard.recipees') }}">Meine Rezepte</a>
                        <a class="hover:text-primary transition p-4" href="{{ route('dashboard.reviews') }}">Meine Rezensionen</a>
                        <a class="hover:text-primary transition p-4" href="{{ route('dashboard.messages') }}">Meine Nachrichten</a>
                        <a class="hover:text-primary transition p-4" href="{{ route('dashboard.favorites') }}">Meine Favoriten</a>
                        {{-- Logout --}}
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button class="font-semibold text-primary text-lg p-4 transition">Abmelden</button>
                        </form>
                    </div>
                @endif

                {{-- Categories --}}
                <div x-cloak x-show.transition="!profileMenu" class="flex flex-col divide-y" x-transiton >
                    {{-- <a class="hover:text-primary transition p-4" href="#">Alle Rezepte</a> --}}
                    <a class="hover:text-primary transition p-4" href="{{ route('recipe.search', ['tags' => 'Kochen']) }}">Kochen</a>
                    <a class="hover:text-primary transition p-4" href="{{ route('recipe.search', ['tags' => 'Backen']) }}">Backen</a>
                    <a class="hover:text-primary transition p-4" href="{{ route('recipe.search', ['tags' => 'Schnell']) }}">Schnell</a>
                    {{-- <a class="hover:text-primary transition p-4" href="#">Neu</a> --}}
                    {{-- <a class="hover:text-primary transition p-4" href="#">Community</a> --}}
                    {{-- <a class="hover:text-primary transition p-4" href="#">Magazin</a> --}}
                </div>
                
            </div>
        </div>
    </nav>
</header>