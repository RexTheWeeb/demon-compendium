<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Demon Compendium')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">

<!-- NAVBAR -->
<nav class="bg-red-600 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo / Site Title -->
            <a href="/" class="text-xl font-bold tracking-wide hover:text-gray-200">
                My Demon Compendium
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-gray-200 transition">Home</a>
                <a href="{{ route('demons.index') }}" class="hover:text-gray-200 transition">Demon List</a>
                <a href="/contact" class="hover:text-gray-200 transition">Contact</a>
            </div>

            <!-- User Menu -->
            <div class="relative hidden md:block">
                @auth
                    <button id="user-menu-btn" class="flex items-center space-x-2 focus:outline-none">
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div id="user-dropdown"
                         class="hidden absolute right-0 mt-2 w-40 bg-white text-gray-800 rounded-md shadow-lg overflow-hidden">
                        <a href="{{ route('users.profile') }}"
                           class="block px-4 py-2 text-left hover:bg-gray-100 transition">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="block w-full text-left px-4 py-2 hover:bg-gray-100 transition">
                                Logout
                            </button>
                        </form>
                    </div>

                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="hover:text-gray-200 transition">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-gray-200 transition">Register</a>
                    </div>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden bg-red-700">
        <a href="/" class="block px-4 py-2 hover:bg-red-800">Home</a>
        <a href="{{ route('demons.index') }}" class="block px-4 py-2 hover:bg-red-800">Demon List</a>
        <a href="/contact" class="block px-4 py-2 hover:bg-red-800">Contact</a>

        @auth
            <a href="{{ route('users.profile') }}" class="block px-4 py-2 hover:bg-red-800">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-800">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-red-800">Login</a>
            <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-red-800">Register</a>
        @endauth
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="flex-1 container mx-auto px-4 py-8">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-400 text-center py-4 text-sm">
    © {{ date('Y') }} Demon Compendium. All rights reserved.
</footer>

<!-- Scripts -->
<script>
    // Mobile menu toggle
    document.getElementById('menu-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // User dropdown toggle
    const userMenuBtn = document.getElementById('user-menu-btn');
    const userDropdown = document.getElementById('user-dropdown');
    if (userMenuBtn && userDropdown) {
        userMenuBtn.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    }
</script>

</body>
</html>
