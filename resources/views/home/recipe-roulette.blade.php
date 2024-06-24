<section id="recipe-roulette" class="mt-8">

    {{-- Label --}}
    <h2 class="text-3xl font-semibold mb-4">Unser Rezept-Roulette</h2>

    {{-- Grid Section --}}
    <div class="gap-4 grid grid-cols-1 grid-rows-2 h-96 md:gap-0 md:grid-cols-3 md:grid-rows-1">

        {{-- Left Section --}}
        
        <div x-data="{ Hover: false }"  x-on:mouseover="Hover = true" x-on:mouseout="Hover = false"  class="overflow-hidden flex justify-center rounded-md md:rounded-l-3xl md:rounded-b-3xl">
            <a class="relative w-full" href="#">

                {{-- Mobile Overlay --}}
                <div class="md:hidden">

                    {{-- Background --}}
                    <div :class="Hover ? 'opacity-80' : 'opacity-40'" class="absolute bg-black z-10 transition  h-full w-full"></div>
                    
                    {{-- Text --}}
                    <div class="absolute h-full w-full flex items-center z-10 justify-center p-4 ">
                        <p :class="Hover ? 'text-primary' : 'text-slate-100'" class="font-bold text-3xl transition text-center">Was koche ich heute?</p>
                    </div>
                </div>

                {{-- Image --}}
                <img :class="Hover ? 'scale-105' : ''" class="object-cover transition h-full w-full" src="{{ asset('img/pexels-flodahm-541216.jpg') }}" alt="">
            </a>
        </div>

        {{-- Middle Section --}}
        <div class="hidden md:flex flex-col justify-evenly px-4 text-slate-700 font-medium text-2xl">
            
            {{-- Top Section --}}
            <div class="bg-tritary rounded-r-3xl rounded-b-3xl mb-2 p-4 flex items-center grow">
                <svg class="w-24 text-primary"  xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                <p class="">Was koche ich heute?</p>
            </div>
            

            {{-- Bottom Section --}}
            <div class="bg-tritary rounded-r-3xl rounded-b-3xl mt-2 p-4 flex items-center grow">
                <p class="text-right">Was backe ich heute?</p>
                <svg class="w-24 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" /></svg>
            </div>
            
        </div>

        {{-- Right Section --}}
        <div x-data="{ Hover: false }"  x-on:mouseover="Hover = true" x-on:mouseout="Hover = false"  class="overflow-hidden flex justify-center rounded-md md:rounded-l-3xl md:rounded-b-3xl">
            <a class="relative w-full" href="#">

                {{-- Mobile Overlay --}}
                <div class="md:hidden">

                    {{-- Background --}}
                    <div :class="Hover ? 'opacity-80' : 'opacity-40'" class="absolute bg-black z-10 transition  h-full w-full"></div>
                    
                    {{-- Text --}}
                    <div class="absolute h-full w-full flex items-center z-10 justify-center p-4 ">
                        <p :class="Hover ? 'text-primary' : 'text-slate-100'" class="font-bold text-3xl transition text-center">Was backe ich heute?</p>
                    </div>
                </div>

                {{-- Image --}}
                <img :class="Hover ? 'scale-105' : ''" class="object-cover transition h-full w-full" src="{{ asset('img/pexels-taryn-elliott-4099127.jpg') }}" alt="">
            </a>
        </div>

    </div>

</section>