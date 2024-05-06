{{-- Hero Section --}}
<section id="hero">
    <div class="swiper swiper1">
        <div class="swiper-wrapper">

            {{-- Slides --}}
            @for ($i = 1; $i <= 4; $i++)
            
            <div class="swiper-slide">
                <div class="grid md:grid-cols-2 md:grid-flow-col">

                    <div class="rounded-t-md md:rounded-l-3xl overflow-hidden flex justify-center h-96">
                        <img class="object-cover w-full h-full hover:scale-110 transition duration-500" src="{{ asset('img/stockfood-'.$i.'.jpg') }}" alt="slide-image">
                    </div>

                    <div class="md:col-span-1 p-4">
                        <h2 class="text-3xl font-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit</h2>
                        
                        <p class="pt-4 font-medium">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quam ullam tempora fugiat voluptas, eum cupiditate. Ea, dicta iusto natus saepe tempora corrupti optio. Ullam cum corrupti voluptatem iusto expedita.
                        </p>

                        <div class="pt-8 pb-4 font-semibold text-white text-center">
                            <a class="border py-2 px-4 rounded-full bg-orange-500" href="#">Zu den Rezepten</a>
                        </div>
                    </div>

                </div>
            </div>

            @endfor
        </div>

        <!-- If we need pagination -->
        <div class="swiper-pagination swiper-pagination1"></div>
    
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev swiper-button-prev1 text-orange-500"></div>
        <div class="swiper-button-next swiper-button-next1 text-orange-500"></div>
    </div>
    
</section>

