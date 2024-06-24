<div class="bg-white p-2 shadow-md rounded-md">
    <div class="flex flex-col">
        <div class="flex justify-between">

            <div class="flex">
                {{-- Avatar --}}
                <a class="hover:scale-110 transition shrink-0" href="{{ route('user.show', $review->user) }}">
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

            <div class="flex gap-2">
                @if (auth()->user() == $review->user)    
                    <button type="button" class="w-6 h-6 flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                @endif
                <button type="button" class="w-6 h-6 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                    </svg>
                </button>

            </div>

        </div>

        {{-- Review Text --}}
        <div class="mt-4">
            <x-pf>{{ $review->review }}</x-pf>
        </div>
    </div>
</div>