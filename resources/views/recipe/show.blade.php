@extends('layouts.master')

@php
    $user = Auth::user();
@endphp

@section('content')

    {{-- Title --}}
    <section class="text-2xl md:text-4xl mb-4 p-4 rounded-3xl flex items-center">
        <p>{{ $recipe->name }}</p>
    </section>

    {{-- Informations --}}
    <section id="recipe-informations" class="shadow-lg rounded-3xl grid md:grid-cols-3 gap-0">

        {{-- Image --}}
        <div class="sm:row-span-2 md:col-span-2 h-[300px] md:h-[400px] lg:h-[500px] overflow-hidden flex rounded-md md:rounded-3xl">
            <div class="absolute z-10 p-2">
                <livewire:favorite-recipe-button lazy :recipe="$recipe" :user="$user"/>
            </div>
            <div class="swiper swiper3 h-full w-full">
                
                <div class="swiper-wrapper">
                    
                    @foreach ($recipe->imagesNormalized() as $image)
                        <div class="swiper-slide">
                            <img class="object-cover h-full w-full hover:scale-105 transition duration-500" src="{{ $image }}" alt="">
                        </div>
                    @endforeach
                    
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        {{-- Informations --}}
        <div class="m-4 flex flex-col">

            {{-- User --}}
            <div class="flex flex-col items-center">

                {{-- Avatar --}}
                <a class="hover:scale-110 transition" href="{{ route('user.show', $recipe->user) }}">
                    <img class="rounded-full w-16" src="{{ $recipe->user->avatar() }}" alt="">
                </a>

                {{-- Recipe From Label --}}
                <p class="text-xs font-medium">Rezept von</p>
                
                {{-- DisplayName --}}
                <p class="font-semibold text-sm text-primary">{{ $recipe->user->displayname }}</p>
                    
            </div>

            
            <div class="flex justify-evenly">
                <div class="mt-2 px-8 flex flex-col items-center">

                    {{-- Rating --}}
                    <livewire:reciperating :recipe="$recipe">

                    {{-- Informations --}}
                    <div class="flex flex-wrap py-1 justify-center content-center gap-4 text-sm grid-sh">

                        {{-- Prep Time --}}
                        <x-preptime :recipe=$recipe/>
                        <x-prepdifficulty :recipe=$recipe/>
                        @if ($recipe->kcalories > 0)
                            <x-kcalories :recipe=$recipe/>
                        @endif
                        <x-createdate :recipe=$recipe/>

                    </div>
                </div>
            </div>

            {{-- Description --}}
            <div class="mt-2">
                <x-pf>{{ $recipe->description }}</x-pf>
            </div>

        </div>

    </section>

    <x-section>
        <div class="flex flex-wrap">
            <form method="GET" action="{{ route('recipe.search') }}">
                @foreach ($tags as $tag)
                    <input 
                        type="submit" 
                        class="text-slate-700 outline outline-1 outline-primary hover:bg-primary hover:outline-none hover:text-white text-xs font-medium rounded-full m-1 py-1.5 px-2 transition-colors" 
                        name="query"
                        value="{{ $tag->name }}"/>
                @endforeach
            </form>
        </div>
    </x-section>

    {{-- Ingredients --}}
    <x-section>

        <livewire:ingredientslist lazy :recipe="$recipe"/>

    </x-section>

    {{-- Preparation Steps --}}
    <x-section>

        <livewire:preparingsteps lazy :recipe="$recipe"/>

    </x-section>

    {{-- Reviews --}}
    <x-section>

        <div class="flex flex-col md:flex-row justify-between gap-2">

            {{-- Label --}}
            <x-sectionlabel>Bewertungen</x-sectionlabel>
            
            @if($user?->id !== $recipe->user->id)
                {{-- Add Recipe Button --}}
                <x-button onclick="Livewire.dispatch('openModal', { component: 'add-review-modal', arguments: { recipe: {{ $recipe }}, user: {{ $user }}  } })" 
                    class="rounded-full">Rezept bewerten</x-button>
            @endif
            
        </div>

        {{-- Reviews --}}
        <livewire:recipereviews lazy :recipe="$recipe"/>

    </x-section>

@endsection