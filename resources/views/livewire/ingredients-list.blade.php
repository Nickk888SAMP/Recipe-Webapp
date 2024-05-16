<div>
    {{-- Label and servings --}}
    <div class="flex items-center">

        {{-- Label --}}
        <h2 class="text-3xl font-semibold mr-4">Zutaten für</h2>

        {{-- Servings --}}
        <input
        wire:loading.attr="disabled"
        class="w-16 rounded-l-2xl text-md outline outline-2 outline-primary p-2 hover:outline-tritary"
        type="number"
        wire:model.live="servings"
        min="1"
        max="999"
        maxlength="3">

        {{-- Decrease --}}
        <button wire:loading.attr="disabled" wire:click="decrease" class="bg-primary w-[44px] h-[44px] hover:bg-tritary flex justify-center items-center">
            <svg class="text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        
        {{-- Increase --}}
        <button wire:loading.attr="disabled" wire:click="increase" class="bg-primary w-[44px] h-[44px] hover:bg-tritary rounded-r-2xl flex justify-center items-center">
            <svg class="text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        
    </div>

    {{-- Entries --}}
    @foreach ($recipe->ingredients as $ingredient)

    <div class="grid grid-cols-5 gap-8 mt-2">
        <div class="flex justify-end gap-1 col-span-1 md:col-span-1">
            <p class="text-slate-700">{{ round($ingredient->amount * $servings)  }}</p>
            <p class="text-primary font-semibold ">{{ $ingredient->unit->short }}</p>
        </div>
        <div class="col-span-4 md:col-span-4">
            <p class="text-slate-700">{{ $ingredient->ingredient }}</p>
        </div>
    </div>

    @endforeach
</div>
