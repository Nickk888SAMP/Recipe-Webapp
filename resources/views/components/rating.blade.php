<div class="flex items-center">
    @php
        $rating = $recipe->avgReviewRating();
        $ratingFloored = floor($rating);
    @endphp
    <x-ratingstars :rating=$ratingFloored/>
    <p class="ml-2">{{ $rating }}</p>
    <p class="ml-1 text-sm text-slate-500">({{ count($recipe->reviews) }})</p>
</div>