<div class="mt-4">
    <form wire:submit="save">
        @csrf
        <div>
            <x-inputfieldlabel for="name" text="Name"/>
            <x-inputfield class="w-full rounded-md" name="name"/>
        </div>
        <div class="mt-4">
            <x-inputfieldlabel for="description" text="Beschreibung"/>
            <x-textfield class="w-full rounded-md" name="description"/>
        </div>
        <div class="mt-4">

            <div class="flex justify-between">
                <label class="text-2xl font-semibold">Zubereitungszeit</label>
                <label class="text-2xl font-semibold">Schwierigkeit</label>

            </div>
            <div class="flex justify-between gap-4">

                <div class="flex gap-4">
                    <div>
                        <x-inputfieldlabel for="preptime_hours" text="Stunden"/>
                        <x-inputfield class="w-16 rounded-md" type="number" name="preptime_hours" min="0" max="999" value="0"/>
                    </div>
                    <div>
                        <x-inputfieldlabel for="preptime_minutes" text="Minuten"/>
                        <x-inputfield class="w-16 rounded-md" type="number" name="preptime_minutes" min="0" max="60" value="0"/>
                    </div>
                </div>

                <div class="mt-7">
                    <select class="rounded-lg outline outline-2 outline-primary p-2 w-full h-10" name="difficulty">
                        <option value="0">Leicht</option>
                        <option value="1">Mittel</option>
                        <option value="2">Anspruchsvoll</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-4">

            <x-inputfieldlabel for="preptime_hours" text="Bilder"/>
            <x-inputfield multiple class="w-full rounded-lg" accept="image/png, image/jpeg, image/bmp" type="file"/>
        </div>
        <div class="mt-4">
            <div>
                <x-inputfieldlabel for="servings" text="Für wie viele personen ist dieses rezept?"/>
                <x-inputfield class="w-16 rounded-lg" type="number" min="1" max="999" value="4"/>
            </div>
            <div class="mt-4 flex justify-between">
                <label class="text-2xl font-semibold">Zutaten</label>
                <x-button wire:click="addIngredient">Add</x-button>
            </div>
            <div class="mt-4 flex flex-col gap-2">
                @foreach ($ingredients as $ingredient)
                        
                <div class="flex justify-between items-center">
                    
                    <x-inputfield class="w-full rounded-l-lg h-10" type="number"/>
                    
                    <select class="outline outline-2 outline-primary p-2 h-10" name="difficulty">
                        <option value="0">Becher</option>
                        <option value="1">Barlöffel</option>
                        <option value="2">Blatt</option>
                        <option value="3">Bund</option>
                        <option value="4">Zentiliter</option>
                        <option value="5">Zentimeter</option>
                        <option value="6">Dash</option>
                        <option value="7">Dose</option>
                    </select>

                    <div class="w-full">
                        <x-inputfield class="w-full h-10 rounded-r-lg"/>
                    </div>

                    <div>
                        <x-button wire:click="removeIngredient({{ $ingredient }})">Delete</x-button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div class="mt-4">
            <x-button type="submit" class="w-full">Rezept Erstellen</x-button>
        </div>
    </form>
</div>
