<?php
$homeLinks = [
    ['name' => 'Personal Blog', 'route' => 'home'],
    ['name' => 'Business Blog', 'route' => 'home'],
];

$pagesLinks = [
    ['name' => 'About Us', 'route' => 'home'],
    ['name' => 'Info', 'route' => 'home'],
    ['name' => 'Tags', 'route' => 'home'],
];
?>

    <!--suppress XmlUnboundNsPrefix -->
<header class="bg-white text-black shadow-md">
    <div class="main-container mx-auto flex items-center justify-between p-4">
        <div class="flex items-center space-x-4">
            <a href="{{ route('home') }}" class="flex items-center text-lg font-semibold text-gray-700">
                <img src="{{ asset('storage/layout/saturn-logo.png') }}" alt="Logo" class="h-10 mr-2">
                {{ config('app.name') }}
            </a>

            <div class="flex space-x-4">
                <div x-data="{ open: false }" class="relative" @mouseleave="open = false">
                    <button @mouseenter="open = true" class="flex items-center space-x-2 text-gray-500 py-2">
                        <span>Home</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <ul x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 mt-10 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
                        @foreach($homeLinks as $link)
                            <li class="">
                                <a href="{{ route($link['route']) }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
                                    {{ $link['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div x-data="{ open: false }" class="relative" @mouseleave="open = false">
                    <button @mouseenter="open = true" class="flex items-center space-x-2 text-gray-500 py-2">
                        <span>Pages</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <ul x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 mt-10 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
                        @foreach($pagesLinks as $link)
                            <li>
                                <a href="{{ route($link['route']) }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
                                    {{ $link['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <div class="flex items-center space-x-4" >
        @guest
                <a href="{{ route('loginView') }}" class="text-gray-800 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded">
                    Login
                </a>
                <a href="{{ route('registerView') }}" class="text-gray-800 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded">
                    Register
                </a>
        @endguest
        @auth
                <a href="{{route('home')}}"><img src="{{auth()->user()->avatar ? "/storage/users/avatars/{{ auth()->user()" : "https://picsum.photos/640/640" }}" alt="avatar" class="w-10 h-10 rounded-full"></a>
                <a href="{{ route('logout') }}" class="text-gray-800 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded">Logout</a>
        @endauth
        </div>

    </div>
</header>
