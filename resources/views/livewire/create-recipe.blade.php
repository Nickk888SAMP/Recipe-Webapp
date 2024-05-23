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

            <div class="flex justify-between">
                {{-- Prep Time Label --}}
                <label class="text-2xl font-semibold">Zubereitungszeit</label>
                
                {{-- Prep Difficulty Label --}}
                <label class="text-2xl font-semibold">Schwierigkeit</label>

            </div>
            <div class="flex justify-between gap-4">

                <div class="flex gap-4">
                    {{-- Prep Time Hours and Minutes --}}
                    <div>
                        {{-- Hours --}}
                        <x-inputfieldlabel for="preptime_hours" text="Stunden"/>
                        <x-inputfield wire:model="form.prepTimeHours" name="preptime_hours" class="w-16 rounded-md" type="number" min="0" max="999" value="0"/>
                    </div>
                    <div>
                        {{-- Minutes --}}
                        <x-inputfieldlabel for="preptime_minutes" text="Minuten"/>
                        <x-inputfield wire:model="form.prepTimeMinutes" name="preptime_minutes" class="w-16 rounded-md" type="number" min="0" max="60" value="0"/>
                    </div>
                </div>

                <div class="mt-8">
                    {{-- Difficulty --}}
                    <select class="rounded-lg bg-white outline outline-2 outline-primary p-2 w-full h-10" wire:model="form.prepDifficulty" name="difficulty">
                        @for ($i = 0; $i <= 2; $i++)
                            <option value="{{ $i }}">{{ App\Models\Recipe::numToDifficulty($i) }}</option> 
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-8">

            {{-- File Upload --}}
            @error('form.images.*') 
                <p>Error: {{ $message }}</p>
            @enderror
            <x-inputfieldlabel for="image_upload" text="Bilder"/>
            <x-fileupload wiremodel="form.images" :multiple=true/>

            @if ($form->images) 

                {{-- Preview --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 mt-4 gap-4">
                    @foreach ($form->images as $index => $image)

                        <div class="rounded-md md:rounded-xl overflow-hidden flex items-center h-32 w-32 outline outline-2 shadow-md outline-primary">
                            <img class="object-cover w-full h-full" src="{{ $image->temporaryUrl() }}" alt="Temp">
                            <div class="absolute">
                                <div class="translate-x-1 -translate-y-[200%]">
                                    <button wire:click="removeImage({{ $index }})" type="button" class="w-6 h-6 bg-primary flex justify-center items-center rounded-full hover:scale-105 transition">
                                        <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </button>

                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            @endif
        </div>
        <div class="mt-8">
            <div class="flex items-center justify-between">
                <div>
                    {{-- Servings --}}
                    <x-inputfieldlabel for="servings" text="Für wie viele personen ist dieses rezept?"/>
                    <x-inputfield class="w-16 rounded-lg" wire:model="form.servings" type="number" min="1" max="999" value="4"/>
                </div>
                <div>
                    {{-- KCalories --}}
                    <x-inputfieldlabel for="kcalories" text="Wie viele Kilokalorien pro Portion?"/>
                    <x-inputfield class="w-24 rounded-lg" wire:model="form.kcalories" type="number" min="1" max="99999" value="0"/>
                </div>
            </div>
            {{-- Ingredients --}}
            <div class="mt-8 flex justify-between">

                {{-- Label --}}
                <label class="text-2xl font-semibold">Zutaten</label>
                
                {{-- Add Button --}}
                <x-button class="rounded-full" type="button" wire:click="addIngredient">
                    <div class="flex items-center gap-1">
                        <svg class="h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Neue Zutat
                    </div>
                </x-button>
            </div>

            {{-- Sortable Ingredients List --}}
            <ul wire:sortable="updateIngredientsOrder" class="mt-4 flex flex-col gap-2">
                @foreach ($form->ingredients as $index => $value)
                    
                    {{-- Single Sortable Item --}}
                    <li wire:sortable.item="{{$index}}" wire:key="{{ $index }}" class="flex justify-between items-center">
                        
                        {{-- Handle Component --}}
                        <div wire:sortable.handle class="outline outline-2 p-2 outline-primary bg-primary text-white rounded-l-md hover:cursor-all-scroll">
                            <svg class="w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="5 9 2 12 5 15" />  <polyline points="9 5 12 2 15 5" />  <polyline points="15 19 12 22 9 19" />  <polyline points="19 9 22 12 19 15" />  <line x1="2" y1="12" x2="22" y2="12" />  <line x1="12" y1="2" x2="12" y2="22" /></svg>
                        </div>

                        {{-- Ingredient Amount --}}
                        <x-inputfield wire:model="form.ingredients.{{$index}}.amount" class="w-full h-10" type="number"/>
                        
                        {{-- Ingredient Unit --}}
                        <select wire:model="form.ingredients.{{$index}}.unit" class="outline outline-2 outline-primary p-2 h-10 bg-white" name="difficulty">
                            @foreach ($ingredientUnits as $ingredientUnit)
                                <option value="{{ $ingredientUnit->id }}">{{ $ingredientUnit->long }} : {{ $ingredientUnit->short }}</option>
                            @endforeach
                        </select>

                        {{-- Ingredient Name --}}
                        <div class="w-full">
                            <x-inputfield wire:model="form.ingredients.{{$index}}.ingredient" placeholder="Zutat eingeben Zb. Milch, Zwiebel, Olivenöl etc." class="w-full h-10"/>
                        </div>

                        {{-- Ingredient Delete --}}
                        <x-button class="ml-0.5 outline outline-2 outline-primary rounded-r-md hover:outline-tritary" type="button" wire:click="removeIngredient({{ $index }})">
                            <svg class="w-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </x-button>
                        
                    </li>
                @endforeach
            </ul>

            {{-- Preparation Steps --}}
        

            <div class="mt-8 flex justify-between">

                {{-- Label --}}
                <label class="text-2xl font-semibold">
                    <p>Zubereitungsschritte</p>
                </label>
            
                {{-- Add Button --}}
                <x-button class="rounded-full" type="button" wire:click="addPrepStep">
                    <div class="flex items-center gap-1">
                        <svg class="h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                        <p>Neuer Schritt</p>
                    </div>
                </x-button>
            </div>

            {{-- Sortable Prep Steps List --}}
            <ul wire:sortable="updatePrepStepsOrder" class="mt-4 flex flex-col gap-2">
                @foreach ($form->prepSteps as $index => $value)
                    
                    {{-- Single Sortable Item --}}
                    <li wire:sortable.item="{{$index}}" wire:key="{{ $index }}" class="flex justify-between items-center">
                        
                        {{-- Handle Component --}}
                        <div wire:sortable.handle class="outline outline-2 p-2 outline-primary bg-primary text-white rounded-l-md hover:cursor-all-scroll">
                            <svg class="w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="5 9 2 12 5 15" />  <polyline points="9 5 12 2 15 5" />  <polyline points="15 19 12 22 9 19" />  <polyline points="19 9 22 12 19 15" />  <line x1="2" y1="12" x2="22" y2="12" />  <line x1="12" y1="2" x2="12" y2="22" /></svg>
                        </div>

                        {{-- Prep Step Order --}}
                        <div class="w-14 h-10 flex justify-center items-center bg-white outline outline-primary outline-2">
                            <p>{{ ($index + 1) }}</p>
                        </div>

                        {{-- Prep Step Name --}}
                        <div class="w-full">
                            <x-inputfield wire:model="form.prepSteps.{{$index}}" placeholder="Zubereitungsschritt eingeben. Zb. Gemüse schneiden oder Backofen auf 180°C aufwärmen." class="w-full h-10"/>
                        </div>

                        {{-- Prep Step Delete --}}
                        <x-button class="ml-0.5 outline outline-2 outline-primary rounded-r-md hover:outline-tritary" type="button" wire:click="removePrepStep({{ $index }})">
                            <svg class="w-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </x-button>
                        
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Create Recipe Button --}}
        <div class="mt-4">
            <x-button type="submit" class="w-full rounded-full">Rezept Erstellen</x-button>
        </div>
    </form>
</div>
