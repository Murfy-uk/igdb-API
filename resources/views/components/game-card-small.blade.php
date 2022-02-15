<div class="game flex">
    <a href="">
        <img
            src="{{ $game['coverImageUrl'] }}"
            alt="Game Cover"
            class="hover:opacity-75 w-16 transition ease-in-out duration-150"
        />
    </a>
    <div class="ml-4">
        <a href="" class="hover:text-gray-300">{{ $game["name"] }}</a>
        <div class="text-gray-400 text-sm mt-1">
            {{ $game["release_date"] }}
        </div>
    </div>
</div>
