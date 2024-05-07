<div>
    <input 
        name="{{ $name }}"
        placeholder="{{ $placeholder }}" 
        {{ $attributes->merge(['class' => 'text-md outline outline-2 outline-orange-300 p-2 hover:outline-orange-500 focus:outline-orange-400']) }}
        type="{{ $type }}"
        value="{{ $value }}">
</div>