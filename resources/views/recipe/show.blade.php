@extends('layouts.master')

@section('content')
<section id="image" class="shadow-lg rounded-3xl grid md:grid-cols-3 gap-0">
    
    <div class="sm:row-span-2 md:col-span-2 h-[300px] overflow-hidden md:h-[400px] lg:h-[500px] flex justify-center rounded-md md:rounded-l-3xl md:rounded-b-3xl">
        <img class="object-cover h-full w-full hover:scale-105 transition duration-500" src="{{ asset('img/stockfood-2.jpg') }}" alt="">
    </div>
    <div class="mt-2 flex flex-col">
        {{-- User --}}
        <div class="flex flex-col items-center">
            <img class="rounded-full w-16" src="{{ asset('img/avatar-3.jpeg') }}" alt="">
            <p class="font-thin text-xs">Rezept von</p>
            <p class="font-semibold text-sm text-orange-500">{{ $recipe->user->name }}</p>
        </div>

        <div class="flex justify-evenly">
            {{-- Rating --}}
            <div class="mt-4 px-8 flex flex-col md:items-center">
                <p class="text-sm">Bewertung</p>
                <div class="flex items-center">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                    @endfor
                    <p class="ml-2">4.2</p>
                    <p class="ml-1 text-sm text-slate-500">(5481)</p>
                </div>
            </div>

            <div class="mt-4 flex flex-col md:items-center">
                <p class="text-sm">Bewertung</p>
                <div class="flex items-center">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                    @endfor
                    <p class="ml-2">4.2</p>
                    <p class="ml-1 text-sm text-slate-500">(5481)</p>
                </div>
            </div>

            <div class="mt-4 flex flex-col md:items-center">
                <p class="text-sm">Bewertung</p>
                <div class="flex items-center">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                    @endfor
                    <p class="ml-2">4.2</p>
                    <p class="ml-1 text-sm text-slate-500">(5481)</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="ingredients" x-data="{ portions: {{ $recipe->servings }} }" class="bg-slate-50 mt-8 shadow-lg rounded-3xl">

    {{-- Label --}}
    <div class="flex items-center">
        <h2 class="text-3xl font-semibold p-4">Zutaten für</h2>
        <x-input-field class="w-16 rounded-2xl" type="number" x-bind="portions"/>
    </div>

    @foreach ($recipe->ingredients as $ingredient)

    <div class="grid grid-cols-4 gap-4 p-2">
        <div class="flex justify-end">
            <p>{{ $ingredient->amount }} {{ $ingredient->unit }}</p>
        </div>
        <div class="col-span-3">
            <p>{{ $ingredient->ingredient }}</p>
        </div>
    </div>

    @endforeach

</section>
@endsection