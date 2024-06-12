<div class="bg-white p-2 shadow-md rounded-md">
    <div class="flex flex-col">
        <div class="flex">

            {{-- Avatar --}}
            <a class="hover:scale-110 transition" href="{{ route('user.show', $review->user) }}">
                <img class="w-10 h-10 rounded-full" src="{{ $review->user->avatar() }}" alt="avatar">
            </a>
            {{-- Name and rating --}}
            <div class="flex flex-col pl-4">
                <p class="ml-1">{{ $review->user->displayname }}</p>
                <div class="flex justify-start gap-2">
                    <x-ratingstars :rating="$review->rating"/>
                    <p class="text-xs font-medium text-slate-500">{{ $review->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        {{-- Review Text --}}
        <div class="mt-4">
            <x-pf>{{ $review->review }}</x-pf>
        </div>
    </div>
</div>