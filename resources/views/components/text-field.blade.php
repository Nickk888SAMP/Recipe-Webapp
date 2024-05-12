<div>
    <textarea 
        name="{{ $name }}"
        placeholder="{{ $placeholder }}" 
        {{ $attributes->merge(['class' => 'text-md outline outline-2 outline-primary p-2 hover:outline-tritary focus:outline-secondary']) }}
        >{{ $slot }}</textarea>
</div>