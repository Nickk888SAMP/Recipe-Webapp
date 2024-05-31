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
    <div class="sm:row-span-2 md:col-span-2 h-[300px] overflow-hidden md:h-[400px] lg:h-[500px] flex rounded-md md:rounded-l-3xl md:rounded-b-3xl">
        <img class="object-cover h-full w-full hover:scale-105 transition duration-500" src="{{ $recipe->imagesNormalized() }}" alt="">
        <div class="absolute p-2">
            <livewire:favorite-recipe-button lazy class="relative" :recipe="$recipe" :user="$user"/>
        </div>
    </div>

    {{-- Informations --}}
    <div class="m-4 flex flex-col">

        {{-- User --}}
        <div class="flex flex-col items-center">
            <a class="hover:scale-110 transition" href="{{ route('user.show', $recipe->user) }}">
                <img class="rounded-full w-16" src="{{ $recipe->user->avatar() }}" alt="">
            </a>
            <p class="font-thin text-xs">Rezept von</p>
            <p class="font-semibold text-sm text-primary">{{ $recipe->user->displayname }}</p>
        </div>

        
        <div class="flex justify-evenly">
            <div class="mt-2 px-8 flex flex-col items-center">

                {{-- Rating --}}
                <x-rating :recipe=$recipe/>

                {{-- Informations --}}
                <div class="flex flex-wrap py-1 justify-center content-center gap-4 text-sm grid-sh">

                    {{-- Prep Time --}}
                    <x-preptime :recipe=$recipe/>
                    <x-prepdifficulty :recipe=$recipe/>
                    <x-kcalories :recipe=$recipe/>
                    <x-createdate :recipe=$recipe/>
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="mt-2">
            <p>{{ $recipe->description }}</p>
        </div>

    </div>

</section>

{{-- Ingredients --}}
<x-section>
    <button onclick="Livewire.dispatch('openModal', { component: 'edit-user' })">Edit User</button>
    <livewire:ingredientslist lazy :recipe="$recipe"/>

</x-section>

{{-- Preparation Steps --}}
<x-section>

    <livewire:preparingsteps lazy :recipe="$recipe"/>

</x-section>

{{-- Reviews --}}
<x-section>

    <div class="flex justify-between">
    {{-- Label --}}
    <x-sectionlabel>Bewertungen</x-sectionlabel>
    
    {{-- Add Recipe Button --}}
    <x-button class="rounded-full">Rezept Bewerten</x-button>

    </div>
    {{-- Reviews --}}
    <div class="flex flex-col gap-4 mt-4">

        @forelse ($recipe->reviews as $review)
            <x-review :review=$review/>
        @empty
            <x-noitemsinfo>
                Noch keine Bewertungen für dieses Rezept vorhanden. <br>Sei der Erste und teile deine Meinung!
            </x-noitemsinfo>
        @endforelse

    </div>
</x-section>

@endsection