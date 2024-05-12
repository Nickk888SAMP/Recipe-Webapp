<div>
    <input 
        name="{{ $name }}"
        placeholder="{{ $placeholder }}" 
        {{ $attributes->merge(['class' => 'text-md outline outline-2 p-2 outline-primary hover:outline-tritary focus:outline-secondary']) }}
        type="{{ $type }}"
        value="{{ $value }}"
        >
</div>