<div>
    <form wire:submit="submit">
        <x-modal-template>

            {{-- Header --}}
            @section('header')
                <p>Rezept bewerten</p>
            @endsection

            {{-- Content --}}
            @section('content')
                <div>
                    <label>Deine bewertung</label>
                    <div x-data="{ rating: @entangle('selectedRating'), hover: 0 }" class="flex items-center">

                        @for ($star = 0; $star < 5; $star++)
                            <div 
                                x-on:mouseover="hover = {{ $star + 1 }}"
                                x-on:mouseout="hover = 0"
                                >
                                <button type="button" wire:loading.attr="disabled" wire:click="selectRating({{ $star + 1 }})">
                                    <svg 
                                        :class="hover != 0 ? hover >= {{ $star + 1 }} ? 'text-yellow-300 scale-110' : 'text-gray-300 scale-90' : rating >= {{ $star + 1 }} ? 'text-yellow-300 scale-110' : 'text-gray-300 scale-90'" 
                                        class="w-8 h-8 ms-1 text-gray-300 dark:text-gray-500 transition" 
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                </button>
                            </div>
                        @endfor

                    </div>
                </div>
                <div>
                    <label>Wie hat es geschmeckt?</label>
                    <x-text-field wire:model="reviewText" class="w-full"/>
                </div>
                
            @endsection
                
            {{-- Footer --}}
            @section('footer')
                <div class="flex justify-between gap-4 w-full">
                        <x-button type="submit" class="rounded-md">Bewerten</x-button>
                        <x-button class="rounded-md" wire:click="$dispatch('closeModal')">Schließen</x-button>
                </div>
            @endsection

        </x-modal-template>
    </form>
</div>