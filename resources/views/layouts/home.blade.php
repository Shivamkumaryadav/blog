<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <script src="{{ asset('resources/js/app.js') }}"> </script>
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <script src="{{ asset('resources/js/app.js') }}"> </script> --}}

    
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">
    <div class="px-5 py-3 md:px-10 md:sticky top-0 z-30 bg-slate-500 shadow-sm">
        <div class="flex justify-between items-center gap-5">
            <div className=" font-bold">
                <a href="{{ url('/') }}" class="text-3xl text-white">
                    My Blog
                </a>
            </div>
            <div id="navbar" class=" hidden md:flex gap-10">

                <div id="navbar-link" class="flex gap-10">
                    <div id="close-navbar" class="flex justify-end md:hidden text-4xl font-semibold">
                        &times;
                    </div>

                    <x-sidebar-link :href="url('/')" :active="Request::is('/')">
                        Home
                    </x-sidebar-link>



                    @if(Auth::check())
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex font-semibold items-center px-3 py-3 border border-transparent text-sm leading-4  rounded-md text-black bg-gray-200 hover:bg-gradient-to-r from-[#F8586D] to-[#EB287D] hover:text-white focus:outline-none transition ease-in-out duration-150">
                                    {{-- getting users first name here --}}
                                    @php
                                    $name = Auth::user()->name;
                                    $firstName = explode(' ', $name)
                                    @endphp
                                    <div>{{ $firstName[0] }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                @admin
                                <x-dropdown-link :href="url('/admin/dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                                @endadmin

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endif

                    {{-- hide for authenticated user --}}
                    @if(!Auth::user())
                    <x-sidebar-link :href="url('/register')" :active="Request::path() == 'register' ">
                        Register
                    </x-sidebar-link>
                    <x-sidebar-link :href="url('/login')" :active="Request::path() == 'login' ">
                        Login
                    </x-sidebar-link>
                    @endif
                    <x-sidebar-link :href="url('contact')" :active="Request::is('contact')">
                        Contact
                    </x-sidebar-link>
                    @auth
                    <div class="md:hidden">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="w-full text-center  px-3 py-2 bg-gray-200  hover:bg-gradient-to-r from-[#F8586D] to-[#EB287D] font-semibold rounded-lg hover:cursor-pointer hover:text-white" type="submit">Logout</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
            <div id="navbar-open" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </div>
        </div>
    </div>
    {{-- main content --}}
    @yield('content')


    <x-session />
</body>

</html>
