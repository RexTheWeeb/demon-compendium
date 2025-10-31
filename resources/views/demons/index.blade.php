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
        <form method="GET" action="{{ route('demons.index') }}"
              class="bg-white rounded-lg shadow-md p-4 mb-6 flex flex-wrap gap-4 items-center justify-center">
            <!-- Search -->
            <input type="text" name="q" placeholder="Search demons..." value="{{ request('q') }}"
                   class="border rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-red-400"/>

            <!-- Race filter -->
            <select name="race_id" class="border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-400">
                <option value="">All Races</option>
                @foreach($races as $race)
                    <option value="{{ $race->id }}" {{ request('race_id') == $race->id ? 'selected' : '' }}>
                        {{ $race->name }}
                    </option>
                @endforeach
            </select>

            <!-- Alignment filter -->
            <select name="alignment" class="border rounded-md px-3 py-2 focus:ring-2 focus:ring-red-400">
                <option value="">All Alignments</option>
                @foreach($alignments as $align)
                    <option value="{{ $align }}" {{ request('alignment') == $align ? 'selected' : '' }}>
                        {{ $align }}
                    </option>
                @endforeach
            </select>

            <!-- Origin filter -->
            <select name="origin"
                    class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400">
                <option value="">All Origins</option>
                @foreach($origins as $origin)
                    <option value="{{ $origin }}" {{ request('origin') === $origin ? 'selected' : '' }}>
                        {{ $origin }}
                    </option>
                @endforeach
            </select>

            <!-- Buttons -->
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                Apply Filters
            </button>

            @if(request()->hasAny(['q','race_id','alignment','origins']))
                <a href="{{ route('demons.index') }}" class="text-sm text-gray-600 underline ml-2">Clear</a>
            @endif
        </form>


        <!-- Demon Row Layout -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <ul class="grid gap-6" style="display: grid; grid-template-columns: repeat(5, minmax(0, 1fr));">

                @foreach($demon as $demons)
                    <li class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col text-center hover:shadow-lg hover:-translate-y-1 transition transform duration-200">
                        <a href="{{ route('demons.show', $demons->id) }}" class="block">
                            @php $img = $demons->image ?? $demons->image_url; @endphp

                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center overflow-hidden">
                                @if($img)
                                    <img src="{{ asset('storage/' . $img) }}"
                                         alt="{{ $demons->name }}"
                                         class="w-full h-full object-cover"
                                         loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        No image
                                    </div>
                                @endif
                            </div>
                        </a>

                        <div class="p-3 flex-1 flex flex-col">
                            <a href="{{ route('demons.show', $demons->id) }}"
                               class="text-base font-semibold text-gray-900 hover:underline mb-1 truncate">
                                {{ $demons->name }}
                            </a>
                            @if($demons->race)
                                <p class="text-sm text-gray-500 mt-1">{{ $demons->race->name ?? $demons->race }}</p>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="mt-8 flex justify-center">
                {{ $demon->appends(request()->only('q'))->links() }}
            </div>
        </div>


        <!-- Pagination -->
        <div class="mt-10 flex justify-center">
            {{ $demon->appends(request()->only('q'))->links() }}
        </div>
    </div>
@endsection
