<div
    wire:init="loadRecentlyReviewed"
    class="recently-reviewed-container space-y-12 mt-8"
>
    @forelse($recentlyReviewed as $recent)

    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
        <div class="relative flex-none h-full bg-red-300">
            <!-- add flex-none to the class-->
            <a
            href="{{ route('games.show', $recent['slug']) }}">
            <img
                src="{{ $recent['coverImageUrl'] }}"
                alt="Game Cover"
                class="hover:opacity-75 sm:w-32 m:w-38 w-48 transition ease-in-out duration-150"
            />
            </a>
            <div
                id="reviewed_{{ $recent['slug'] }}"
                class="absolute bottom-0 right-0 w-14 h-14 bg-gray-900 text-xs opacity-90 rounded-full"
                style="right: -20px; bottom: -20px"
            >

            </div>
        </div>
        <!-- end of the game image -->

        <div class="ml-12">
            <a
                href="{{ route('games.show', $recent['slug']) }}"
                class="block text-xl font-semibold leading-tight hover:text-gray 400"
                >{{ $recent["name"] }}</a
            >
            <div class="text-gray-400 mt-1">
                {{ $recent["platforms"] }}
            </div>
            <p class="mt-6 text-xs text-gray-400 hidden lg:block">
                {{ $recent["summary"] }}
            </p>
        </div>
    </div>
    <!-- End of the game big card -->
    @empty
    <div class="spinner mt-8">
        @foreach(range(1,3) as $game)

        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6 mt-10">
            <div class="relative flex-none h-full bg-red-300">
                <!-- add flex-none to the class-->

                <div class="bg-gray-700 w-48 h-60"></div>
            </div>
            <!-- end of the game image -->

            <div class="ml-12">
                <div
                    class="text-transparent text-lg inline-block rounded bg-gray-700 font-semibold leading-tight mt-2"
                >
                    Title Goes header for sometime until the very end
                </div>
                <div
                    class="inline-block text-transparent text-lg rounded bg-gray-700 font-semibold leading-tight mt-4"
                >
                    Platforms go here - and then here
                </div>
                <p
                    class="inline-block text-transparent text-lg rounded bg-gray-700 font-semibold leading-tight mt-8"
                >
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Odit rerum minus ab sint repellendus pariatur libero
                    sapiente enim eveniet necessitatibus consequatur doloremque
                    cum delectus quam unde ea illum quae, nesciunt laudantium
                    totam impedit at animi ipsum! Nisi facere porro cupiditate?
                </p>
            </div>
        </div>
        <!-- End of the game big card -->
        @endforeach
    </div>
    @endforelse
</div>

@push('scripts')
    @include('_rating',
    [
        'event' => 'reviewedGameWithRatingAdded'

    ])
@endpush
