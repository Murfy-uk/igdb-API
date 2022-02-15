<div class="relative" x-data="{isVisible: true}" @click.away="isVisible = false">
    <input
        wire:model.debounce.200ms="search"
        type="text"
        name=""
        placeholder="search (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isVisible = true"
        @keydown.escape.window = "isVisible = false"
        @keydown="isVisible = true"
        @keydown.shift.tab="isVisible = false"
        class="bg-gray-800 text-sm rounded-full focus:shadow-outline pl-8 w-64 px-3 py-1"
    />

    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg
            class="fill-current text-gray-400 w-4"
            xmlns="http://www.w3.org/2000/svg"
            x="0px"
            y="0px"
            viewBox="0 0 24 24"
        >
            <path
                d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 20 22 L 22 20 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z"
            ></path>
        </svg>
    </div>
    <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2" x-show="isVisible" x-transition.opacity.duration.400>
        <ul>
            @foreach ( $searchResults as $game )
                <li class="border-b border-gray-700">
                    <a
                    href="{{ route('games.show', $game['slug']) }}"
                    class="block hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-2 py-2"
                    @if ($loop->last) @keydown.tab="isVisible = false" @endif
                    >

                    @if (isset($game['cover']))
                    <img
                        class="w-10"
                        src="{{ Str::replaceFirst('thumb','cover_small',$game['cover']['url']) }}"
                        alt=""
                    />
                    @else
                    <img class="w-10" src="https://via.placeholder.com/264x352" alt="">
                    @endif
                        <span class="ml-4 text-xs">{{ $game['name'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
