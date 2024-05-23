<div :class="dropping ? 'border-primary' : 'border-tritary'" 
    class="relative border-2 border-dashed rounded-lg p-6 transition hover:border-primary" 
    x-data="{ dropping: false, uploading: false, progress: 0 }" 
    x-on:dragover="dropping = true"
    x-on:dragleave="dropping = false"
    x-on:drop="dropping = false"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false; progress = 0;"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
    <input wire:model="{{ $wiremodel }}" type="file" class="absolute inset-0 w-full h-full opacity-0 z-50 hover:cursor-pointer" @if($multiple == true) multiple @endif/>
    <div class="text-center">
        <svg :class="dropping ? 'text-primary scale-110' : ''" class="mx-auto h-10 w-10 transition" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />  <polyline points="7 9 12 4 17 9" />  <line x1="12" y1="4" x2="12" y2="16" /></svg>

        <h3 class="mt-2 text-sm font-medium text-gray-900">
            <label for="file-upload" class="relative cursor-pointer">
                <span>Einfach ziehen oder durchsuchen.</span>
            </label>
        </h3>

        <p class="mt-1 text-xs text-gray-500">
            PNG, JPG, GIF bis zu 10MB
        </p>

        <div x-show="uploading" class="mt-4 w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
            <div class="bg-blue-600 h-2.5 rounded-full dark:bg-primary" :style="'width:' + progress + `%`" ></div>
        </div>
    </div>
</div>
@error($wiremodel) 
    <span class="error">{{ $message }}</span> 
@enderror