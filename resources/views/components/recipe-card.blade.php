<div class="bg-slate-50 rounded-t-3xl rounded-b-md">
    {{-- Image --}}
    <div class="h-40 rounded-md md:rounded-t-3xl overflow-hidden flex items-center max-w-96 md:h-60">
        <img :class="hover ? 'scale-110' : ''" class="object-cover w-full h-full transition duration-500" src="{{ asset('img/stockfood-4.jpg') }}" alt="food">
    </div>
    
    {{-- Type --}}
    <div class="py-1">
        <p class="font-light tracking-wider">KLASSISCH</p>
    </div>
    
    {{-- Review --}}
    <div class="flex space-x-1 text-sm">
        <svg class="w-4 h-4 ms-1 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
        <p class="font-medium">5/5</p>
        <p class="">({{ count($recipe->reviews) }})</p>
    </div>

    {{-- Name --}}
    <div class="py-1">
        <p :class="hover ? 'text-orange-500' : ''" class="font-semibold transition duration-500">
            {{ $recipe->name }}
        </p>
    </div>

    {{-- Time and Difficulty --}}
    <div class="py-1 flex items gap-4 text-sm">
        <div class="flex items-center space-x-1">
            <svg class="w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 7v5l3 3" /></svg>
            <p class="font-thin">{{ $recipe->getPrepTime(true) }}</p>
        </div>
        <div class="flex items-center space-x-1">
            <svg class="w-5 text-orange-500"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-antenna-bars-5"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 18l0 -3" /><path d="M10 18l0 -6" /><path d="M14 18l0 -9" /><path d="M18 18l0 -12" /></svg>
            <p class="font-thin">{{ $recipe->difficulty }}</p>
        </div>
    </div>
</div>