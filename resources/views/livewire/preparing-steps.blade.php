<div>
    {{-- Label --}}
    <x-sectionlabel class="mb-4">Zubereitung</x-sectionlabel>
    @if(count($recipe->preparingSteps) > 0)

        <div class="flex flex-col gap-4">
            @php
                $counter = 1;
            @endphp
            @foreach ($recipe->preparingSteps as $prepareStep)
                <div class="grid grid-cols-5 gap-8 mt-2">
                    <div class="flex justify-end gap-1 col-span-1 md:col-span-1">
                        <p class="text-primary">{{ $counter }}.</p>
                    </div>
                    <div class="col-span-4 md:col-span-4 text-slate-700">
                        <p>{{ $prepareStep->preparing_text }}</p>
                    </div>
                </div>
                @php
                    $counter++;
                @endphp
            @endforeach
        </div>

    @else
        <x-noitemsinfo>
            Keine spezifischen Zubereitungsschritte angegeben?<br>Keine Sorge! Dieses Rezept ist so unkompliziert, dass es fast von selbst zubereitet wird. 
        </x-noitemsinfo>

    @endif
</div>