@extends('layouts.app') @section('content')
<div class="container mx-auto px-10 py-6">
    <div
        class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row"
    >
        <div class="flex-none">
            <img src="/tlou2.jpg" alt="game image" />
        </div>

        <div class="lg:ml-12">
            <h2 class="font-semibold text-4xl">Name of the Game</h2>

            <div class="text-gray-400">
                <span>Adventure, RPG</span>
                &middot;
                <span>Square Enix</span>
                &middot;
                <span>Square Enix</span>
                &middot;
                <span>Playstation 4 </span>
            </div>

            <div class="flex flex-wrap items-center mt-8">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-full">
                        <div
                            class="font-semibold text-xs flex justify-center items-center h-full"
                        >
                            80%
                        </div>
                    </div>
                    <div class="ml-4 text-xs">Member<br />Score</div>
                </div>

                <div class="flex items-center ml-12">
                    <div class="w-16 h-16 bg-gray-800 rounded-full">
                        <div
                            class="font-semibold text-xs flex justify-center items-center h-full"
                        >
                            80%
                        </div>
                    </div>

                    <div class="ml-4 text-xs pr-4 sm:pr-0">
                        Critic<br />Score
                    </div>
                </div>

                <div
                    class="flex items-center space-x-4 mt-4 sm:ml-4 justify-center"
                >
                    <div
                        class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center"
                    >
                        <a href="" class="hover:text-gray-400"
                            ><i class="fas fa-globe-europe"></i
                        ></a>
                    </div>

                    <div
                        class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center"
                    >
                        <a href="" class="hover:text-gray-400"
                            ><i class="fab fa-instagram"></i
                        ></a>
                    </div>

                    <div
                        class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center"
                    >
                        <a href="" class="hover:text-gray-400"
                            ><i class="fab fa-twitter-square"></i
                        ></a>
                    </div>

                    <div
                        class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center"
                    >
                        <a href="" class="hover:text-gray-400"
                            ><i class="fab fa-facebook-square"></i
                        ></a>
                    </div>
                </div>

                <p class="mt-12 lg:mr-64">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Quia, amet blanditiis temporibus perspiciatis accusantium
                    repellat, delectus optio quisquam rerum recusandae, tempore
                    consectetur voluptatem autem. Mollitia placeat dicta nulla
                    perferendis quod.
                </p>
                <div class="mt-12">
                    <button
                        class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150 items-center"
                    >
                        <i class="far fa-play-circle"></i>
                        <div class="ml-2">Play Trailer</div>
                    </button>
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
            <div class="">
                <a href="">
                    <img
                        src="/screenshot1.jpg"
                        alt="screenshot"
                        class="hover:opacity-75 transition eas-in-out duration-150"
                    />
                </a>
            </div>

            <div class="">
                <a href="">
                    <img
                        src="/screenshot2.jpg"
                        alt="screenshot"
                        class="hover:opacity-75 transition eas-in-out duration-150"
                    />
                </a>
            </div>

            <div class="">
                <a href="">
                    <img
                        src="/screenshot3.jpg"
                        alt="screenshot"
                        class="hover:opacity-75 transition eas-in-out duration-150"
                    />
                </a>
            </div>

            <div class="">
                <a href="">
                    <img
                        src="/screenshot4.jpg"
                        alt="screenshot"
                        class="hover:opacity-75 transition eas-in-out duration-150"
                    />
                </a>
            </div>

            <div class="">
                <a href="">
                    <img
                        src="/screenshot5.jpg"
                        alt="screenshot"
                        class="hover:opacity-75 transition eas-in-out duration-150"
                    />
                </a>
            </div>

            <div class="">
                <a href="">
                    <img
                        src="/screenshot6.jpg"
                        alt="screenshot"
                        class="hover:opacity-75 transition eas-in-out duration-150"
                    />
                </a>
            </div>
        </div>
    </div>
    <!-- End images-container -->

    <div class="similar-games-container border-gray-800 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Similar Games
        </h2>

        <div
            class="popular-games text-sm grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16"
        >
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="">
                        <img
                            src="/alyx.jpg"
                            alt="Game Cover"
                            class="hover:opacity-75 transition ease-in-out duration-150"
                        />
                    </a>
                    <div
                        class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full opacity-75"
                        style="right: -20px; bottom: -20px"
                    >
                        <div
                            class="font-semibold text-xs flex justify-center items-center h-full"
                        >
                            80%
                        </div>
                    </div>
                </div>
                <a
                    href=""
                    class="block text-base font-semibold leading-tight hover:text-gray 400 mt-8"
                    >Name of the Game goes here</a
                >
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>
            <!-- End of the Game Card -->

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="">
                        <img
                            src="/alyx.jpg"
                            alt="Game Cover"
                            class="hover:opacity-75 transition ease-in-out duration-150"
                        />
                    </a>
                    <div
                        class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full opacity-75"
                        style="right: -20px; bottom: -20px"
                    >
                        <div
                            class="font-semibold text-xs flex justify-center items-center h-full"
                        >
                            80%
                        </div>
                    </div>
                </div>
                <a
                    href=""
                    class="block text-base font-semibold leading-tight hover:text-gray 400 mt-8"
                    >Name of the Game goes here</a
                >
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>
            <!-- End of the Game Card -->

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="">
                        <img
                            src="/alyx.jpg"
                            alt="Game Cover"
                            class="hover:opacity-75 transition ease-in-out duration-150"
                        />
                    </a>
                    <div
                        class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full opacity-75"
                        style="right: -20px; bottom: -20px"
                    >
                        <div
                            class="font-semibold text-xs flex justify-center items-center h-full"
                        >
                            80%
                        </div>
                    </div>
                </div>
                <a
                    href=""
                    class="block text-base font-semibold leading-tight hover:text-gray 400 mt-8"
                    >Name of the Game goes here</a
                >
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>
            <!-- End of the Game Card -->

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="">
                        <img
                            src="/alyx.jpg"
                            alt="Game Cover"
                            class="hover:opacity-75 transition ease-in-out duration-150"
                        />
                    </a>
                    <div
                        class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full opacity-75"
                        style="right: -20px; bottom: -20px"
                    >
                        <div
                            class="font-semibold text-xs flex justify-center items-center h-full"
                        >
                            80%
                        </div>
                    </div>
                </div>
                <a
                    href=""
                    class="block text-base font-semibold leading-tight hover:text-gray 400 mt-8"
                    >Name of the Game goes here</a
                >
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>
            <!-- End of the Game Card -->

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="">
                        <img
                            src="/alyx.jpg"
                            alt="Game Cover"
                            class="hover:opacity-75 transition ease-in-out duration-150"
                        />
                    </a>
                    <div
                        class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full opacity-75"
                        style="right: -20px; bottom: -20px"
                    >
                        <div
                            class="font-semibold text-xs flex justify-center items-center h-full"
                        >
                            80%
                        </div>
                    </div>
                </div>
                <a
                    href=""
                    class="block text-base font-semibold leading-tight hover:text-gray 400 mt-8"
                    >Name of the Game goes here</a
                >
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>
            <!-- End of the Game Card -->

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="">
                        <img
                            src="/alyx.jpg"
                            alt="Game Cover"
                            class="hover:opacity-75 transition ease-in-out duration-150"
                        />
                    </a>
                    <div
                        class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full opacity-75"
                        style="right: -20px; bottom: -20px"
                    >
                        <div
                            class="font-semibold text-xs flex justify-center items-center h-full"
                        >
                            80%
                        </div>
                    </div>
                </div>
                <a
                    href=""
                    class="block text-base font-semibold leading-tight hover:text-gray 400 mt-8"
                    >Name of the Game goes here</a
                >
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>
            <!-- End of the Game Card -->
        </div>
    </div>
    <!-- End similar-games-container -->
</div>
@endsection
