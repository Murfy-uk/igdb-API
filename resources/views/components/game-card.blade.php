<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $game['slug']) }}">
            <img
                src="{{ $game['coverImageUrl'] }}"
                alt="Game Cover"
                class="hover:opacity-75 transition ease-in-out duration-150"
            />
        </a>
        @if($game['rating'])
        <div
            id="{{ $game['slug'] }}"
            class="absolute bottom-0 right-0 w-14 h-14 bg-gray-800 text-xs rounded-full opacity-90"
            style="right: -20px; bottom: -20px"
        >

           @push('scripts')
                @include('_rating', [
                    'slug' => $game['slug'],
                    'rating' => $game['rating'],
                    'event' => null,
                ])
           @endpush
        </div>
        @endif
    </div>
    <a
        href="{{ route('games.show', $game['slug']) }}"
        class="block text-base font-semibold leading-tight hover:text-gray 400 mt-8"
        >{{ $game["name"] }}</a
    >
    <div class="text-gray-400 mt-1">
        {{ $game["platforms"] }}
    </div>
</div>
