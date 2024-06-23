<section id="recipes" class="mt-8">

    {{-- Label --}}
    <h2 class="text-3xl font-semibold">Top 10 best bewertete Rezepte</h2>

    {{-- Slides --}}
    <div class="mt-4">
        @if (count($recipesHighestRated) == 0)
        
        <x-noitemsinfo>
            Entschuldigung, aber es gibt noch keine Rezepte.<br>Bleib dran, bald werden welche verfügbar sein!
        </x-noitemsinfo>
        
        @else
            <div class="swiper swiper2 rounded-md md:rounded-3xl">
                
                <div class="swiper-wrapper">
                    
                    @foreach ($recipesHighestRated as $index=>$recipe)
                    <div class="swiper-slide">
                        
                        <x-recipeCard :recipe=$recipe :user="$user" :number="$index + 1"/>
                        
                    </div>
                    @endforeach
                    
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            
        @endif
            
    </div>

</section>