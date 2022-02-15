<div
    wire:init="loadMostAnticipated"
    class="most-anticipated-container space-y-10 mt-8"
>
    @forelse($mostAnticipated as $anticipated)

        <x-game-card-small :game="$anticipated" />
    <!-- End of game Card -->
    @empty
        <div class="spinner mt-8 mb-10">
            @foreach(range(1,4) as $game)
                <x-game-card-small-skelly />
            @endforeach
        </div>
    @endforelse
</div>
