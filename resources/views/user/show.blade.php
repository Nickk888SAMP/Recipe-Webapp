@extends('layouts.master')

@section('content')

    {{-- Profile Info --}}
    <x-section>
        <div class="flex justify-start gap-4">

            {{-- Avatar --}}
            <div class="shrink-0">
                <img class="w-32 h-32 rounded-full" src="{{ $user->avatar() }}" alt="avatar">
            </div>

            {{-- Name and Description --}}
            <div class="flex flex-col justify-center gap-2">

                {{-- Name --}}
                <div class="text-2xl flex items-center gap-1">
                    <p>Profil von</p> 
                    <p class="font-semibold text-primary">{{ $user->displayname }}</p>
                </div>

                {{-- Description --}}
                @if ($user->description)
                    <div>
                        {{ $user->description }}
                    </div>
                @endif
                
            </div>
        </div>
    </x-section>

    {{-- Recipees List --}}
    <x-section>
        
        {{-- Label --}}
        <x-sectionlabel>Erstellte Rezepte</x-sectionlabel>

        {{-- List --}}
        <div class="mt-4">
            @if ($user->recipes)
                
                {{-- Recipees --}}
                <x-recipeescardgrid>
                    @foreach ($user->recipes as $recipe)
                        <x-recipeCard :recipe=$recipe/>
                    @endforeach
                </x-recipeescardgrid>

            @else

                {{-- No Recipees Info --}}
                <x-noitemsinfo>
                    Es scheint, dass dieser Benutzer noch keine Rezepte erstellt hat. <br>Schau bald wieder vorbei, um möglicherweise neue Kreationen zu entdecken!
                </x-noitemsinfo>

            @endif
        </div>
    </x-section>
@endsection