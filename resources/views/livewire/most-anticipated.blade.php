<div
    wire:init="loadMostAnticipated"
    class="most-anticipated-container space-y-10 mt-8"
>
    @forelse($mostAnticipated as $anticipated)

    <div class="game flex">
        <a href="">
            <img
                src="{{ Str::replaceFirst('thumb','cover_big',$anticipated['cover']['url']) }}"
                alt="Game Cover"
                class="hover:opacity-75 w-16 transition ease-in-out duration-150"
            />
        </a>
        <div class="ml-4">
            <a href="" class="hover:text-gray-300">{{
                $anticipated["name"]
            }}</a>
            <div class="text-gray-400 text-sm mt-1">
                {{ date("d M Y", $anticipated["first_release_date"]) }}
            </div>
        </div>
    </div>
    <!-- End of game Card -->
    @empty
    <div class="spinner mt-8 mb-10">
        @foreach(range(1,4) as $game)
        <div class="game flex mb-8">
            <div class="bg-gray-700 w-16 h-20"></div>
            <div class="ml-4">
                <div
                    class="text-transparent text-lg inline-block rounded bg-gray-700 font-semibold leading-tight mt-2"
                >
                    Name Goes h
                </div>
                <div
                    class="text-transparent text-lg inline-block rounded bg-gray-700 font-semibold leading-tight mt-2"
                >
                    Date goes
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforelse
</div>
