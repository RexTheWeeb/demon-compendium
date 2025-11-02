@extends('layouts.nav')
@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10">
        <h1 class="font-semibold text-gray-700">User Profile</h1>

        <div class="bg-white shadow-lg rounded-2xl p-6">
            <p><span class="font-semibold text-gray-700">Name:</span> {{ $user->name }}</p>
            <p><span class="font-semibold text-gray-700">Email:</span> {{ $user->email }}</p>
            <p><span class="font-semibold text-gray-700">Joined:</span> {{ $user->created_at->format('F j, Y') }}</p>
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Your Added Demons</h2>

            @if($user->demons->isEmpty())
                <p class="text-gray-500">You haven’t added any demons yet.</p>
            @else
                <div class="grid gap-6" style="display: grid; grid-template-columns: repeat(5, minmax(0, 1fr));">
                    @foreach($user->demons as $demon)
                        @php
                            $img = $demon->image ?? $demon->image_url;
                            if ($img && !Str::startsWith($img, ['http://', 'https://'])) {
                                $img = asset('storage/' . $img);
                            }
                        @endphp

                        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                            <a href="{{ route('demons.show', $demon->id) }}">
                                <img src="{{ $img }}" alt="{{ $demon->name }}" class="w-full h-48 object-cover">
                            </a>
                            <div class="p-4 flex flex-col flex-1">
                                <h3 class="font-semibold text-gray-900 text-lg mb-1">{{ $demon->name }}</h3>
                                <p class="text-gray-600 text-sm mb-3">{{ $demon->race->name ?? 'Unknown Race' }}</p>
                                <a href="{{ route('demons.show', $demon->id) }}"
                                   class="mt-auto text-red-600 hover:text-red-800 font-medium">View Details →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
