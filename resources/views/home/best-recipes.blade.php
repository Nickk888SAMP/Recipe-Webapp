<section id="recipes" class="mt-8">

    {{-- Label --}}
    <h2 class="text-3xl font-semibold">Best bewertete Rezepte</h2>

    {{-- Slides --}}
    <div class="mt-4">
        @if (count($recipes) == 0)
        
        <x-noitemsinfo>
            Entschuldigung, aber es gibt noch keine Rezepte.<br>Bleib dran, bald werden welche verfügbar sein!
        </x-noitemsinfo>
        
        @else
            <div class="swiper swiper2 rounded-md md:rounded-3xl">
                
                <div class="swiper-wrapper">
                    
                    @foreach ($recipes as $recipe)
                    <div class="swiper-slide">
                        
                        <x-recipeCard :recipe=$recipe :user="$user"/>
                        
                    </div>
                    @endforeach
                    
                </div>
                <div class="swiper-button-prev swiper-button-prev2 text-primary"></div>
                <div class="swiper-button-next swiper-button-next2 text-primary"></div>
            </div>
            
        @endif
            
    </div>

</section>