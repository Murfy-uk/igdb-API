<div wire:init="loadComingSoon" class="coming-soon-container space-y-10 mt-8">
    @forelse($comingSoon as $coming)
        <x-game-card-small :game="$coming" />
    @empty
    <div class="spinner mt-8 mb-10">
        @foreach(range(1,4) as $game)
        <x-game-card-small-skelly />
        @endforeach
    </div>
    @endforelse
</div>
