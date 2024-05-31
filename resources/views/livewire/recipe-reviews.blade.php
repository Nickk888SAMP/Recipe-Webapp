<div>
    <div class="flex flex-col gap-4 mt-4">
        @forelse ($recipe->reviews as $review)
            <x-review :review=$review/>
        @empty
            <x-noitemsinfo>
                Noch keine Bewertungen für dieses Rezept vorhanden. <br>Sei der Erste und teile deine Meinung!
            </x-noitemsinfo>
        @endforelse
    </div>
</div>
