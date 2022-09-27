<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="bg-gray-100">
    <div class="font-sans text-gray-900 antialiased">
        <div class="bg-white shadow-md">
            <div class="container mx-auto flex justify-between items-center p-3">
                <div>
                    <a href="{{ route('article.index') }}" class="uppercase md:text-xl text-md font-bold">Gego Blog</a>
                </div>
               @auth
                <a href="{{ route('article.create') }}" class="bg-indigo-500 hover:bg-indigo-600 px-3  py-1 rounded-md text-white shadow">
                    + Article
                </a>
               @endauth
                @guest
                    <div class="space-x-3 text-md">
                        <a href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                        <a href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </div>
                @endguest
                @auth
                    <div class="relative " x-data="{open : false}" >
                        <div class="flex space-x-2 items-center ">
                            <span> {{ Auth::user()->name }}</span>
                            <div x-on:click="open = !open">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                        <form
                            method="POST" action="{{ route('logout') }}"
                            class=" absolute right-0 bg-white border border-gray-300 rounded-md w-48 py-3 shadow-lg mt-2 p-5" x-show="open"
                            x-transition.duration.300ms
                            x-transition.scale.origin.right
                            x-cloak
                        >
                        @csrf
                        <a href=""   onclick="event.preventDefault();
                        this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </div>
                    @endauth
            </div>
        </div>
        <div class="md:mx-auto max-w-3xl mt-10 mx-4">
            {{ $slot }}
        </div>

    </div>
</body>

</html>
