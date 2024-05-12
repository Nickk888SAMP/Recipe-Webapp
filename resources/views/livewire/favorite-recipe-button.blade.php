<button class="outline outline-2 outline-primary rounded-full h-10 w-10 flex justify-center items-center" wire:click="toggle" wire:loading.attr="disabled" wire:loading.class="opacity-50">
    
    <div class="p-2">
        <svg  @class([
            'w-full h-full transition duration-500', 
            'text-red-500 scale-[100%]' => $isFavorite, 
            'text-slate-400 scale-[75%]' => !$isFavorite
            ]) 
        viewBox="0 0 24 24"  fill="currentColor"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
        </svg>
    
    </div>

    <div wire:loading class="absolute inline-block w-[75%] h-[75%] animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-surface motion-reduce:animate-[spin_1.5s_linear_infinite] text-primary"
        role="status">
    </div>
    
    
</button>


