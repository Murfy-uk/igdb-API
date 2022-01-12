<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script
            src="https://kit.fontawesome.com/be9e7aa3e0.js"
            crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="/css/app.css" />
        <title>Game API APP</title>
        <livewire:styles />
    </head>
    <body class="container mx-auto bg-gray-900 text-white">
        <header class="border-b border-gray-800">
            <nav
                class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-10 py-6"
            >
                <div class="flex flex-col lg:flex-row items-center">
                    <a href="/" class="Logo">
                        <h1
                            class="text-white-500 inline-block text-xl tracking-wide font-bold"
                        >
                            ifElse<span
                                class="text-blue-500 inline-block text-2xl uppercase font-bold tracking-tighter"
                            >
                                -></span
                            >Code
                        </h1>
                    </a>

                    <ul class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">
                        <li>
                            <a href="" class="hover:text-gray-400">Games</a>
                        </li>
                        <li>
                            <a href="" class="hover:text-gray-400">Reviews</a>
                        </li>
                        <li>
                            <a href="" class="hover:text-gray-400"
                                >Coming Soon!
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center mt-6 lg:mt-0">
                    <div class="relative">
                        <input
                            type="text"
                            name=""
                            placeholder="search...."
                            id=""
                            class="bg-gray-800 text-sm rounded-full focus:shadow-outline pl-8 w-64 px-3 py-1"
                        />
                        <div
                            class="absolute top-0 flex items-center h-full ml-2"
                        >
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
                    </div>
                    <div class="ml-6">
                        <a href="#"
                            ><img
                                src="/avatar.jpg"
                                alt="user avatar"
                                class="rounded-full w-8"
                        /></a>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-8">@yield('content')</main>

        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-10 py-6">
                Powered By
                <a href="#" class="underline hover:text-gray-400">IGDB API</a>
            </div>
        </footer>
        <livewire:scripts>
    </body>
</html>
