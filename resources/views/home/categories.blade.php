<section id="categories" class="mt-8">
    
    {{-- Label --}}
    <h2 class="text-3xl font-semibold">Was esse ich heute?</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">

        @foreach($categories as $category)
        
        <a href="#">

            <div x-data="{ hover:false }" x-on:mouseover="hover = true" x-on:mouseout="hover = false" class="relative rounded-md md:rounded-3xl overflow-hidden h-32 flex justify-center items-center">
                {{-- Background --}}
                <div :class="hover ? 'opacity-80' : 'opacity-40'" class="absolute bg-black z-10 transition opacity-50 h-full w-full"></div>
                <img :class="hover ? 'scale-110' : ''" class="object-cover w-full h-full transition duration-500" src="{{ $category->image_path }}" alt="category image">
               
                {{-- Text --}}
                <p :class="hover ? 'text-primary' : 'text-slate-100'"  class="absolute text-2xl text-center font-semibold z-10 ">{{ $category->name }}</p>
            </div> 
        </a>
        
        @endforeach
        
    </div>
</section>