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
                🜏 Demon Compendium
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-gray-200 transition">Home</a>
                <a href="{{ route('demons.index') }}" class="hover:text-gray-200 transition">Demon List</a>
                <a href="/contact" class="hover:text-gray-200 transition">Contact</a>
            </div>

            <!-- Auth Links -->
            <div class="hidden md:flex space-x-4">
                <a href="{{ route('login') }}"
                   class="bg-white text-red-600 px-3 py-1 rounded-md hover:bg-gray-100 font-medium">Login</a>
                <a href="{{ route('register') }}"
                   class="bg-gray-900 px-3 py-1 rounded-md hover:bg-gray-800 font-medium">Register</a>
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
        <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-red-800">Login</a>
        <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-red-800">Register</a>
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

<!-- Simple mobile toggle -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

</body>
</html>
