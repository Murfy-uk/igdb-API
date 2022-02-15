<div
    wire:init="loadPopularGames"
    class="popular-games text-sm grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16"
>
    @forelse($popularGames as $game)
        <x-game-card :game="$game" />
    <!-- End of the Game Card -->
    @empty @foreach(range(1,12) as $game)
    <div class="game mt-8">
        <div class="relative inline-block">
            <div class="bg-gray-800 w-40 h-52"></div>
        </div>
        <div
            class="block text-transparent text-md rounded bg-gray-700 font-semibold inline-block leading-tight mt-4"
        >
            Title Will go over here
        </div>
        <div
            class="text-transparent text-md rounded inline-block bg-gray-700 mt-3"
        >
            One Two -----
        </div>
    </div>
    @endforeach @endforelse
</div>
<!-- End of Popular Games -->


@push('scripts')

    @include('_rating', [
        'event' => 'gameWithRatingAdded'
    ])

@endpush
