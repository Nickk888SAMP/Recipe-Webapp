<section id="recipes" class="mt-8">

    {{-- Label --}}
    <h2 class="text-3xl font-semibold">Best bewertete Rezepte</h2>

    {{-- Slides --}}
    <div class="mt-4">
        <div class="swiper swiper2 rounded-md md:rounded-3xl">
            <div class="swiper-wrapper">

                @foreach ($recipes as $recipe)
                <div class="swiper-slide">
                    <div x-data="{ hover: false }" x-on:mouseover="hover = true" x-on:mouseout="hover = false">
                        
                        <a href="{{ route('recipe.show', $recipe) }}">
                            <x-recipeCard :recipe=$recipe/>
                        </a>

                    </div>
                </div>
                @endforeach

            </div>
            <div class="swiper-button-prev swiper-button-prev2 text-orange-500"></div>
            <div class="swiper-button-next swiper-button-next2 text-orange-500"></div>
            
        </div>
    </div>

</section>