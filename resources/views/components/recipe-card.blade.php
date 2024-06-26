<div>

    {{-- Favorite Button --}}
    <div class="absolute z-10 p-2">
        <livewire:favorite-recipe-button lazy :recipe="$recipe" :user="auth()->user()"/>
    </div>
    <div class="w-full relative">
        <div class="absolute inset-0 flex justify-end">
            {{-- Number --}}
            @if($number != 0)
                <div class=" z-10 p-2">
                    <div class="font-bold text-primary outline outline-2 shadow-md outline-primary rounded-full bg-white flex items-center justify-center font-mono h-6 w-6">
                        {{ $number }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Main --}}
    <div x-data="{ hover: false }" x-on:mouseover="hover = true" x-on:mouseout="hover = false">                    
        <a href="{{ route('recipe.show', $recipe) }}">
            <div class="bg-slate-50 rounded-t-3xl rounded-b-md">

                
                {{-- Image --}}
                <div class="h-40 rounded-md md:rounded-t-3xl overflow-hidden flex items-center max-w-96 md:h-60">
                    <img :class="hover ? 'scale-110' : ''" class="object-cover w-full h-full transition duration-500" src="{{ $recipe->imagesNormalized()[0] }}">
                </div>
                
                {{-- Type --}}
                {{-- <div class="py-1">
                    <p class="font-light tracking-wider">KLASSISCH</p>
                </div> --}}
                
                
                {{-- Name --}}
                <div class="py-1">
                    <p :class="hover ? 'text-primary' : ''" class="font-semibold transition duration-500">
                        {{ $recipe->name }}
                    </p>
                </div>
                
                {{-- Review --}}
                <x-rating :recipe=$recipe/>

                {{-- Time and Difficulty --}}
                <div class="py-1 flex flex-wrap gap-4 text-sm">
                    <x-preptime :recipe=$recipe/>
                    <x-prepdifficulty :recipe=$recipe/>
                </div>

            </div>
        </a>
    </div>
</div>