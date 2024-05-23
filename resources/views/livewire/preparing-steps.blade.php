<div>
    {{-- Label --}}
    <x-sectionlabel class="mb-4">Zubereitung</x-sectionlabel>

    {{-- Prep Steps --}}
    @if(count($recipe->preparingSteps) > 0)

        <div class="flex flex-col gap-1">
            @foreach ($recipe->preparingSteps as $index => $prepareStep)
                <div class="flex gap-2 mt-2">
                    <div class="flex gap-1">
                        <p class="text-primary">{{ ($index + 1) }}.</p>
                    </div>
                    <div class="text-slate-700">
                        <p>{{ $prepareStep->preparing_text }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        <x-noitemsinfo>
            Keine spezifischen Zubereitungsschritte angegeben?<br>Keine Sorge! Dieses Rezept ist so unkompliziert, dass es fast von selbst zubereitet wird. 
        </x-noitemsinfo>

    @endif
</div>