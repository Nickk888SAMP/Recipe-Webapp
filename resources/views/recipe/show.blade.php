@extends('layouts.master')

@section('content')
<section x-data="{ portions: {{ $recipe->servings }} }" class="shadow-lg rounded-3xl">

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