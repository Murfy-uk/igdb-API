<div
    wire:init="loadPopularGames"
    class="popular-games text-sm grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16"
>
    @forelse($popularGames as $game)

    <div class="game mt-8">
        <div class="relative inline-block">
            <a href="">
                <img
                    src="{{ Str::replaceFirst('thumb','cover_big',$game['cover']['url']) }}"
                    alt="Game Cover"
                    class="hover:opacity-75 transition ease-in-out duration-150"
                />
            </a>
            @if (isset($game['rating']))
            <div
                class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full opacity-80"
                style="right: -20px; bottom: -20px"
            >
                <div
                    class="font-semibold text-xs flex justify-center items-center h-full"
                >
                    {{ round($game['rating']).'%' }}
                </div>
            </div>
            @endif
        </div>
        <a
            href=""
            class="block text-base font-semibold leading-tight hover:text-gray 400 mt-8"
            >{{ $game["name"] }}</a
        >
        <div class="text-gray-400 mt-1">
            @foreach($game['platforms'] as $platforms)
            {{ $platforms["abbreviation"] }} &middot; @endforeach
        </div>
    </div>
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
