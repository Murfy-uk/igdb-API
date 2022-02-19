@extends('layouts.app') @section('content')
<div class="container mx-auto px-6 md:px-10  py-4" >
    <div
        class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row items-center lg:place-items-start">
        <div class="flex-none mt-4">
            <img
                src="{{ $game['coverImageUrl'] }}"
                alt="game image"
            />
        </div>

        <div class="lg:ml-12 items-center">
            <h2 class="font-semibold text-4xl mt-4">{{ $game["name"] }}</h2>

            <div class="text-gray-400">
                <span>
                    {{ $game['genres'] }}
                </span>
                &middot;
                <span>
                    {{ $game['involvedCompanies'] }}
                </span>
                &middot;
                <span>
                    {{ $game['platforms'] }}
                </span>
            </div>

            <div class="flex flex-wrap items-center mt-8">
                <div class="flex items-center">
                    <div id="memberRating" class="w-12 h-12 md:w-16 md:h-16 text-sm bg-gray-800 rounded-full relative">
                        @push('scripts')
                            @include('_rating', [
                                'slug' => 'memberRating',
                                'rating' => $game['memberRating'],
                                'event' => null,
                            ])
                        @endpush
                    </div>
                    <div class="ml-4 text-xs">Member<br />Score</div>
                </div>

                <div class="flex items-center ml-12">
                    <div id="criticRating" class="w-12 h-12 md:w-16 md:h-16 bg-gray-800 rounded-full relative">
                        @push('scripts')
                            @include('_rating', [
                                'slug' => 'criticRating',
                                'rating' => $game['criticRating'],
                                'event' => null,
                            ])
                        @endpush
                    </div>

                    <div class="ml-4 text-xs pr-4 sm:pr-0">
                        Critic<br />Score
                    </div>
                </div>

                <div
                    class="flex items-center space-x-4 mt-4 sm:ml-4 justify-center"
                >

                @if($game['socials']['website'])
                    <div
                        class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center"
                    >
                        <a href="{{ $game['socials']['website']['url'] }}" class="hover:text-gray-400"
                            ><i class="fas fa-globe-europe"></i
                        ></a>
                    </div>
                @endif

                @if($game['socials']['instagram'])
                    <div
                        class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center"
                    >
                        <a href="{{ $game['socials']['instagram']['url']}}" class="hover:text-gray-400"
                            ><i class="fab fa-instagram"></i
                        ></a>
                    </div>
                @endif

                @if($game['socials']['twitter'])
                    <div
                        class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center"
                    >
                        <a href="{{ $game['socials']['twitter']['url']}}" class="hover:text-gray-400"
                            ><i class="fab fa-twitter-square"></i
                        ></a>
                    </div>
                @endif

                @if($game['socials']['facebook'])
                    <div
                        class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center"
                    >
                        <a href="{{ $game['socials']['facebook']['url'] }}" class="hover:text-gray-400"
                            ><i class="fab fa-facebook-square"></i
                        ></a>
                    </div>
                @endif
                </div>

                <div class="block w-full">
                    <p class="mt-12 lg:mr-64 block">
                        @if($game['summary'])
                            {{ $game['summary'] }}
                        @endif
                    </p>
                </div>

                <div class="mt-12" x-data="{isTrailerModalVisible: false,}">




                    <template x-if="isTrailerModalVisible">
                        <div

                            x-show="isTrailerModalVisible"
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        >

                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto " @click.outside="console.log('clicked')">
                                <div class="bg-gray-300 rounded"

                                >
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click="isTrailerModalVisible = false"

                                            @keydown.escape.window="isTrailerModalVisible = false"
                                            class="text-3xl leading-none hover:text-gray-300"
                                        >
                                            &times;
                                        </button>
                                    </div>

                                    <!--Finish the clicked away for closing the modal-->
                                    <div class="modal-body px-8 py-8" ;>
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%" >
                                            <iframe width="360" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="{{ $game['trailer'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>

                                </div>
                            </div>
                         </div>
                    </template>
                    @if($game['trailer'])
                    <button
                        x-on:click="isTrailerModalVisible = true";
                        class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150 items-center"
                    >
                        <i class="far fa-play-circle"></i>
                        <div class="ml-2">Play Trailer</div>
                    </button>
                    @endif
                </div>


            </div>
        </div>
    </div>

    <!-- End of the Game details -->

    <div class="images-container border-b border-gray-800 pb-12 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Images
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">

                @if($game['screenshots'])
                    @foreach($game['screenshots'] as $screenshot)
                        <div class="">
                            <a
                                href="#"
                                @click.prevent="
                                    isImageModalVisible = true
                                    image='{{ $screenshot['big'] }}'
        "
                            >
                                <img

                                    src="{{ $screenshot['big'] }}"
                                    alt="screenshot"
                                    class="hover:opacity-75 transition eas-in-out duration-150"
                                />
                            </a>
                        </div>
                    @endforeach

                @else
                        <p>Opps.. No Images</p>
                @endif

        </div>
        <template x-if="isImageModalVisible">
            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                class="text-3xl leading-none hover:text-gray-300"
                                @click="isImageModalVisible = false"
                                @keydown.escape.window="isImageModalVisible = false"
                            >
                                &times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="screenshot">
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <!-- End images-container -->

    <div class="similar-games-container border-gray-800 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Similar Games
        </h2>

        <div
            class="popular-games text-sm grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16"
        >
        @if($game['similarGames'])
            @foreach($game['similarGames'] as $similar)

        <x-game-card :game="$similar" />
            <!-- End of the Game Card -->
         @endforeach
         @else
            <p>Oppps... No Similar games found :( </p>
         @endif
        </div>
    </div>
    <!-- End similar-games-container -->
</div>
@endsection
