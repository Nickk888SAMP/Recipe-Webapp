@extends('layouts.master')

@php
    $user = Auth::user();
    $recipees = $user->favoriteRecipesOrdered();
@endphp

@section('content')
    
<x-section>
    <x-sectionlabel>Meine Favoriten</x-sectionlabel>

    <div class="mt-4">
        @if (count($recipees) == 0)
        
            <x-noitemsinfo>
                Es scheint, dass du noch keine Favoriten hinzugefügt hast. Stöbere durch unsere Rezepte und füge deine Lieblingsgerichte hinzu, um sie später leicht wiederzufinden!
            </x-noitemsinfo>
        
        @else
            <x-recipeescardgrid>

                @foreach ($recipees as $recipe)
                    <x-recipecard :recipe="$recipe" :user="$user"/>
                @endforeach

            </x-recipeescardgrid>
        @endif
    </div>

</x-section>


@endsection