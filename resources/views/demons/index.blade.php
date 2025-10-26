@extends('layouts.nav')

@section('title', 'Demon List')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">

        <!-- Title + Add Button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Demon Compendium</h1>

            <a href="{{ route('demons.create') }}"
               class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Add Demon
            </a>
        </div>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('demons.index') }}" class="flex justify-center mb-8">
            <div class="flex items-center space-x-2 w-full sm:w-auto">
                <input
                    type="text"
                    name="q"
                    placeholder="Search demons..."
                    value="{{ request('q') }}"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-72 focus:outline-none focus:ring-2 focus:ring-red-400"
                />
                <button
                    type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">
                    Search
                </button>
                @if(request('q'))
                    <a href="{{ route('demons.index') }}"
                       class="text-sm text-gray-600 underline ml-2">Clear</a>
                @endif
            </div>
        </form>

        <!-- Demon Row Layout -->
        <div class="relative">
            <ul class="flex flex-row gap-6 overflow-x-auto pb-4 px-2 snap-x snap-mandatory scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100">

                @forelse($demon as $demons)
                    <li class="list-none flex-shrink-0 snap-center w-52 sm:w-56 md:w-64 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-transform transform hover:-translate-y-1">
                        <a href="{{ route('demons.show', $demons->id) }}" class="block">
                            @php $img = $demons->image ?? $demons->image_url; @endphp

                            <div class="w-full bg-gray-100 flex items-center justify-center overflow-hidden">
                                @if($img)
                                    <img
                                        src="{{ asset('storage/' . $img) }}"
                                        alt="{{ $demons->name }}"
                                        class="w-full h-32 object-cover rounded-t-lg transition-transform duration-200 hover:scale-105"
                                        loading="lazy">
                                @else
                                    <div class="w-full h-64 flex items-center justify-center text-gray-400">
                                        No image
                                    </div>
                                @endif
                            </div>
                        </a>

                        <div class="p-3 text-center">
                            <a href="{{ route('demons.show', $demons->id) }}"
                               class="block text-lg font-semibold text-gray-900 hover:text-red-600 transition truncate">
                                {{ $demons->name }}
                            </a>

                            @if($demons->race)
                                <p class="text-sm text-gray-500 mt-1">{{ $demons->race->name ?? $demons->race }}</p>
                            @endif
                        </div>
                    </li>
                @empty
                    <p class="text-center text-gray-500 w-full">No demons found.</p>
                @endforelse
            </ul>
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center">
            {{ $demon->appends(request()->only('q'))->links() }}
        </div>
    </div>
@endsection
