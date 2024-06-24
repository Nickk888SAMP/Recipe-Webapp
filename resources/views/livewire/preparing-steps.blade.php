<div>
    {{-- Label --}}
    <x-sectionlabel class="mb-4">Zubereitung</x-sectionlabel>

    {{-- Prep Steps --}}
    @if(count($recipe->preparingSteps) > 0)

        <div class="flex flex-col gap-1">
            @foreach ($recipe->preparingSteps as $index => $prepareStep)
                <div class="flex gap-6 mt-2 items-start">

                    {{-- Preparing Index --}}
                    <div class="flex">
                        <div class="bg-white outline outline-2 outline-primary shadow-md w-6 h-6 flex justify-center items-center rounded-full">
                            <p class="text-primary font-medium">{{ ($index + 1) }}</p>
                        </div>
                    </div>

                    {{-- Preparing Text --}}
                    <div class="text-slate-700">
                        <p>{{ $prepareStep->preparing_text }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    @else

        {{-- No Items found --}}
        <x-noitemsinfo>
            Keine spezifischen Zubereitungsschritte angegeben?<br>Keine Sorge! Dieses Rezept ist so unkompliziert, dass es fast von selbst zubereitet wird. 
        </x-noitemsinfo>

    @endif
</div>