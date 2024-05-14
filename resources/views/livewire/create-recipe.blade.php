<div class="mt-4">
    <form wire:submit="save">
        @csrf
        <div>
            {{-- Title --}}
            <x-inputfieldlabel for="name" text="Name"/>
            <x-inputfield wire:model="form.name" class="w-full rounded-md" name="name"/>
        </div>
        <div class="mt-4">
            {{-- Description --}}
            <x-inputfieldlabel for="description" text="Beschreibung"/>
            <x-textfield class="w-full rounded-md" wire:model="form.description" name="description"/>
        </div>
        <div class="mt-4">
            {{-- Preparing --}}
            <x-inputfieldlabel for="preparing" text="Zubereitung"/>
            <x-textfield class="w-full rounded-md" wire:model="form.preparing" name="preparing"/>
        </div>
        <div class="mt-4">

            <div class="flex justify-between">
                {{-- Prep Time --}}
                <label class="text-2xl font-semibold">Zubereitungszeit</label>
                
                {{-- Prep Difficulty --}}
                <label class="text-2xl font-semibold">Schwierigkeit</label>

            </div>
            <div class="flex justify-between gap-4">

                <div class="flex gap-4">
                    <div>
                        <x-inputfieldlabel for="preptime_hours" text="Stunden"/>
                        <x-inputfield wire:model="form.prepTimeHours" name="preptime_hours" class="w-16 rounded-md" type="number" min="0" max="999" value="0"/>
                    </div>
                    <div>
                        <x-inputfieldlabel for="preptime_minutes" text="Minuten"/>
                        <x-inputfield wire:model="form.prepTimeMinutes" name="preptime_minutes" class="w-16 rounded-md" type="number" min="0" max="60" value="0"/>
                    </div>
                </div>

                <div class="mt-7">
                    <select class="rounded-lg outline outline-2 outline-primary p-2 w-full h-10" wire:model="form.prepDifficulty" name="difficulty">
                        <option value="0">Leicht</option>
                        <option value="1">Mittel</option>
                        <option value="2">Anspruchsvoll</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-4">

            <x-inputfieldlabel for="preptime_hours" text="Bilder"/>
            <x-inputfield wire:model="form.image" multiple class="w-full rounded-lg" accept="image/png, image/jpeg, image/bmp" type="file"/>
        </div>
        <div class="mt-4">
            <div class="flex items-center justify-between">
                <div>
                    <x-inputfieldlabel for="servings" text="Für wie viele personen ist dieses rezept?"/>
                    <x-inputfield class="w-16 rounded-lg" wire:model="form.servings" type="number" min="1" max="999" value="4"/>
                </div>
                <div>
                    <x-inputfieldlabel for="kcalories" text="Wie viele Kilokalorien pro Portion?"/>
                    <x-inputfield class="w-24 rounded-lg" wire:model="form.kcalories" type="number" min="1" max="99999" value="0"/>
                </div>
            </div>
            <div class="mt-4 flex justify-between">
                <label class="text-2xl font-semibold">Zutaten</label>
                <x-button class="rounded-full" type="button" wire:click="addIngredient">
                    <div class="flex items-center gap-1">
                        <svg class="h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Neue Zutat
                    </div>
                </x-button>
            </div>
            <div class="mt-4 flex flex-col gap-2">
                @foreach ($ingredients as $index => $value)
                        
                <div class="flex justify-between items-center">
                    
                    <x-inputfield wire:model="ingredients.{{$index}}.amount" class="w-full rounded-l-lg h-10" type="number"/>
                    
                    <select wire:model="ingredients.{{$index}}.unit" class="outline outline-2 outline-primary p-2 h-10" name="difficulty">
                        <option value="0">Becher</option>
                        <option value="1">Barlöffel</option>
                        <option value="2">Blatt</option>
                        <option value="3">Bund</option>
#                        <option value="4">Zentiliter</option>
                        <option value="5">Zentimeter</option>
                        <option value="6">Dash</option>
                        <option value="7">Dose</option>
                    </select>

                    <div class="w-full">
                        <x-inputfield wire:model="ingredients.{{$index}}.ingredient" placeholder="Zutat eingeben Zb. Milch, Zwiebel, Olivenöl etc." class="w-full h-10"/>
                    </div>

                    <x-button class="ml-0.5 outline outline-2 outline-primary rounded-r-md" type="button" wire:click="removeIngredient({{ $index }})">
                        <svg class="w-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                    </x-button>
                    
                </div>
                @endforeach
            </div>
        </div>


        <div class="mt-4">
            <x-button type="submit" class="w-full rounded-full">Rezept Erstellen</x-button>
        </div>
    </form>
</div>
