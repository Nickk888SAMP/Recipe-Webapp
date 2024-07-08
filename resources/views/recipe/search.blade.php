@extends('layouts.master')

@section('content')
    <x-section>

        <div class="flex flex-wrap gap-3 mb-4">
            <x-filterbutton name='Sortieren' icon='eos-sort'/>
            <x-filterbutton name='Bewertung' icon='heroicon-o-star'/>
            <x-filterbutton name='Arbeitszeit' icon='heroicon-o-clock'/>
            @foreach ($tag_categories as $tagCategory)
                <x-filterbutton :name='$tagCategory->name' :icon='$tagCategory->icon'/>
            @endforeach
        </div>

        {{ $recipes->links() }}
        <div class="my-4">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4  gap-4">
                @foreach ($recipes as $recipe)
                    <x-recipeCard :recipe=$recipe/>
                @endforeach
            </div>
        </div>
        {{ $recipes->links() }}
            
    </x-section>
@endsection