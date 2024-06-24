@extends('layouts.master')

@section('content')

    {{-- Label --}}
    <p class="text-3xl font-semibold">Verwaltung</p>

    {{-- Info Section --}}
    <x-section>
        <div class="flex justify-evenly gap-4 p-4">

            <div class="flex flex-col justify-center items-center">
                <div class="h-14 w-14 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                    </svg>
                </div>
                <p class="text-lg font-light text-center">Registrierte Benutzer</p>
                <p class="text-3xl font-semibold">{{ $usersCount }}</p>
            </div>

            <div class="flex flex-col justify-center items-center">
                <div class="h-14 w-14 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                    </svg>
                </div>
                <p class="text-lg font-light text-center">Erstellte Rezepte</p>
                <p class="text-3xl font-semibold">{{ $recipesCount }}</p>
            </div>
        </div>
    </x-section>

    <x-section>
        <x-sectionlabel>Was möchtest du tun?</x-sectionlabel>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <x-linkbutton href="#" class="flex justify-center items-center">
                <p>Benutzer Verwalten</p>
            </x-linkbutton>

            <x-linkbutton href="#" class="flex justify-center items-center">
                <p>Rezepte Verwalten</p>
            </x-linkbutton>

            <x-linkbutton href="#" class="flex justify-center items-center">
                <p>Maßeinheiten Verwalten</p>
            </x-linkbutton>

            <x-linkbutton href="#" class="flex justify-center items-center">
                <p>Kategorien Verwalten</p>
            </x-linkbutton>
       
        </div>
    </x-section>

    <x-section>
        <livewire:ingredient-unit-table/>
    </x-section>
@endsection