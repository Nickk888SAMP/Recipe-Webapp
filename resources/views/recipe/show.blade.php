@extends('layouts.master')

@section('content')

{{-- Title --}}
<section class="text-2xl md:text-4xl mb-4 p-4 rounded-3xl flex items-center">
    <p>{{ $recipe->name }}</p>
</section>

{{-- Informations --}}
<section id="recipe-informations" class="shadow-lg rounded-3xl grid md:grid-cols-3 gap-0">

    {{-- Image --}}
    <div class="sm:row-span-2 md:col-span-2 h-[300px] overflow-hidden md:h-[400px] lg:h-[500px] flex justify-center rounded-md md:rounded-l-3xl md:rounded-b-3xl">
        <img class="object-cover h-full w-full hover:scale-105 transition duration-500" src="{{ asset('img/stockfood-2.jpg') }}" alt="">
    </div>

    {{-- Informations --}}
    <div class="m-4 flex flex-col">

        {{-- User --}}
        <div class="flex flex-col items-center">
            <a class="hover:scale-110 transition" href="{{ route('user.show', $recipe->user) }}">
                <img class="rounded-full w-16" src="{{ asset('img/avatar-3.jpeg') }}" alt="">
            </a>
            <p class="font-thin text-xs">Rezept von</p>
            <p class="font-semibold text-sm text-orange-500">{{ $recipe->user->name }}</p>
        </div>

        {{-- Rating --}}
        <div class="flex justify-evenly">
            <div class="mt-2 px-8 flex flex-col md:items-center">
                <x-rating :recipe=$recipe/>
                <div class="py-1 flex justify-center gap-4 text-sm">
                    <x-preptime :recipe=$recipe/>
                    <x-prepdifficulty :recipe=$recipe/>
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
<section id="ingredients" x-data="{ portions: {{ $recipe->servings }} }" class="bg-slate-50 mt-8 shadow-lg rounded-3xl">

    {{-- Label --}}
    <div class="flex items-center">
        <h2 class="text-3xl font-semibold p-4">Zutaten für</h2>
        <x-input-field class="w-16 rounded-2xl" type="number" x-bind="portions"/>
    </div>

    {{-- Entries --}}
    @foreach ($recipe->ingredients as $ingredient)

        <div class="grid grid-cols-5 gap-4 p-2">
            <div class="flex justify-end col-span-2 md:col-span-1">
                <p>{{ $ingredient->amount }} {{ $ingredient->unit }}</p>
            </div>
            <div class="col-span-3 md:col-span-4">
                <p>{{ $ingredient->ingredient }}</p>
            </div>
        </div>

    @endforeach

</section>

{{-- Preparation Steps --}}
<section id="reviews" class="bg-slate-50 mt-8 shadow-lg rounded-3xl">

    {{-- Label --}}
    <h2 class="text-3xl font-semibold p-4">Zubereitung</h2>
    <div class="p-4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus doloribus deserunt officiis enim dolor ad natus facilis veritatis optio suscipit modi numquam, quaerat consequatur saepe quo assumenda soluta minus magni!</p>
    </div>
</section>

{{-- Reviews --}}
<section id="reviews" class="bg-slate-50 mt-8 shadow-lg rounded-3xl">

    {{-- Label --}}
    <h2 class="text-3xl font-semibold p-4">Bewertungen</h2>

    {{-- Reviews --}}
    <div class="p-4 flex flex-col gap-4">

        @forelse ($recipe->reviews as $review)
            <div class="bg-white p-2 shadow-md rounded-md">
                <div class="flex flex-col">
                    <div class="flex">

                        {{-- Avatar --}}
                        <a class="hover:scale-110 transition" href="{{ route('user.show', $review->user) }}">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('img/avatar-3.jpeg') }}" alt="avatar">
                        </a>
                        {{-- Name and rating --}}
                        <div class="flex flex-col pl-4">
                            <p class="ml-1">{{ $review->user->name }}</p>
                            <div class="flex justify-start gap-2">
                                <x-ratingstars :rating="$review->rating"/>
                                <p class="text-xs text-slate-500">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Review Text --}}
                    <div class="mt-4">
                        <p>{{ $review->review }}</p>
                    </div>
                </div>
            </div>
            @empty

            {{-- No Reviews --}}
            <div class="border-4 border-dotted rounded-3xl mx-auto w-full flex justify-center items-center p-8">
                <p class="text-xl text-orange-500 text-center">Noch keine Bewertungen für dieses Rezept vorhanden. <br>Sei der Erste und teile deine Meinung!</p>
            </div>
            @endforelse
    </div>
</section>

@endsection