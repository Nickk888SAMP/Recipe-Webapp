@extends('layouts.master')

@php
    $user = Auth::user();
    $recipes = $user->recipes;
@endphp

@section('content')

    <x-section>
        
        <div class="flex justify-between items-center">

            {{-- Label --}}
            <x-sectionlabel>Meine Rezepte</x-sectionlabel>

            {{-- Create Recipee Button --}}
            <x-linkbutton href="{{ route('dashboard.recipees.create') }}">
                <div class="flex gap-1 items-center">
                    <svg class="h-5 w-5"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                    <p>Rezept erstellen</p>
                </div>
            </x-linkbutton>

        </div>

        {{-- List --}}
        <div class="flex flex-col mt-4 gap-4">

            @foreach ($recipes as $recipe)

                <div class="bg-white p-2 shadow-md rounded-md">
                    {{-- Recipee --}}
                    <div class="flex flex-col gap-2">

                        {{-- Image, Name and Description --}}
                        <div class="flex gap-2">

                            {{-- Image --}}
                            <div class="flex-shrink-0 h-24 w-32 rounded-md overflow-hidden flex items-center">
                                <img :class="hover ? 'scale-110' : ''" class="object-cover w-full h-full transition duration-500" src="{{ $recipe->imagesNormalized() }}">
                            </div>

                            <div class="flex flex-col">
                                
                                {{-- Name --}}
                                <p class="text-lg">{{ $recipe->name }}</p>

                                {{-- Description --}}
                                <p class="text-sm text-slate-500">{{ $recipe->description }}</p>

                            </div>

                        </div>

                        {{-- Options --}}
                        <div class="flex gap-2">

                            <x-outlinelinkbutton href="{{ route('recipe.show', $recipe) }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />  <line x1="10" y1="14" x2="20" y2="4" />  <polyline points="15 4 20 4 20 9" /></svg>
                                <p>Rezept anzeigen</p>
                            </x-outlinelinkbutton>

                            <x-outlinelinkbutton href="#">
                                <svg width="24" height="24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>
                                <p>Rezept bearbeiten</p>
                            </x-outlinelinkbutton>

                            <x-outlinelinkbutton href="#">
                                <svg width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                <p>Rezept löschen</p>
                            </x-outlinelinkbutton>
                            
                        </div>
                    </div>
                </div>

            @endforeach
            
        </div>
    </x-section>


@endsection

