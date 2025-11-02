@extends('layouts.nav')


@section('title', 'Welcome to the Demon Compendium')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-10">

        <!-- Hero Section -->
        <div class="text-center mb-10">
            <h1 class="font-semibold text-gray-700">Welcome to my Demon Compendium</h1>
            <p class="text-gray-700 text-lg mb-6">
                A compendium of entities spanning the world and many variations of storytelling.
            </p>

            @guest
                <div class="space-x-4">
                    <a href="{{ route('login') }}"
                       class="bg-red-600 text-white px-6 py-3 rounded-lg shadow hover:bg-red-700 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow hover:bg-gray-300 transition">
                        Register
                    </a>
                </div>
            @else
                <a href="{{ route('demons.index') }}"
                   class="bg-red-600 text-white px-6 py-3 rounded-lg shadow hover:bg-red-700 transition">
                    View Demon List
                </a>
            @endguest
        </div>

        <!-- Stats or Overview Section -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center mb-12">
            <div class="bg-white shadow rounded-2xl py-6 px-4">
                <h2 class="text-2xl font-bold text-red-600 mb-2">{{ $totalDemons ?? '0' }}</h2>
                <p class="text-gray-600">Total Demons Recorded</p>
            </div>
            <div class="bg-white shadow rounded-2xl py-6 px-4">
                <h2 class="text-2xl font-bold text-red-600 mb-2">{{ $totalRaces ?? '0' }}</h2>
                <p class="text-gray-600">Races Documented</p>
            </div>
            <div class="bg-white shadow rounded-2xl py-6 px-4">
                <h2 class="text-2xl font-bold text-red-600 mb-2">{{ $totalUsers ?? '0' }}</h2>
                <p class="text-gray-600">Contributors</p>
            </div>
        </div>

        <!-- Featured or Recent Demons -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Recently Added Demons</h2>

            @if(isset($recentDemons) && $recentDemons->count() > 0)
                <div class="grid gap-6" style="display: grid; grid-template-columns: repeat(5, minmax(0, 1fr));">
                    @foreach($recentDemons as $demon)
                        <a href="{{ route('demons.show', $demon->id) }}"
                           class="block bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                            <div class="aspect-[4/5] bg-gray-100">
                                @if($demon->image_url)
                                    <img src="{{ asset('storage/' . $demon->image_url) }}"
                                         alt="{{ $demon->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-400">
                                        No image
                                    </div>
                                @endif
                            </div>
                            <div class="p-3 text-center">
                                <h3 class="font-semibold text-gray-800 truncate">{{ $demon->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $demon->origin }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">No demons have been added yet.</p>
            @endif
        </div>

        <!-- Call to Action -->
        @auth
            <div class="text-center">
                <a href="{{ route('demons.create') }}"
                   class="bg-red-600 text-white px-6 py-3 rounded-lg shadow hover:bg-red-500 transition">
                    Add a New Demon
                </a>
            </div>
        @endauth

    </div>
@endsection
