<div class="flex items-center space-x-1 flex-shrink-0 bg-slate-100 p-1 rounded-lg">
    <svg class="w-5 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 7v5l3 3" /></svg>
    <p class="font-extralight">{{ $recipe->getPrepTime(true) }}</p>
</div>