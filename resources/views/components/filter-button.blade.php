<button class="bg-white outline outline-2 text-primary font-semibold outline-primary hover:outline-tritary rounded-md p-1.5 transition-all">
    <div class="flex justify-between gap-1 items-center">
        @svg($icon, 'w-4 h-4 text-secondary')
        <p>{{ $name }}</p>
        @svg('heroicon-c-chevron-down', 'w-6 h-6 text-primary')
    </div>
</button>