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

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer>alert('welcome')</script>

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
                    <livewire:search-dropdown >
                    <div class="ml-6">
                        <a href="#"
                            ><img
                                src="/IMG_6999.jpg"
                                alt="user avatar"
                                class="rounded-full w-8"
                        /></a>
                    </div>
                    <div class="ml-6">
                      <a href="">Logout</a>
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
        <livewire:scripts/>
        <script src="/js/app.js"></script>
        @stack('scripts')
    </body>
</html>
