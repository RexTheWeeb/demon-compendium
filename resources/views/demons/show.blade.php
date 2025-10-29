@extends('layouts.nav')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10">

        {{-- Header --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $demon->name }}</h1>
            <p class="text-gray-600 italic">Origin: {{ $demon->origin }}</p>
        </div>

        {{-- Image Section --}}
        @php
            // Handle both storage and external URLs
            $img = $demon->image ?? $demon->image_url;
            if ($img && !Str::startsWith($img, ['http://', 'https://'])) {
                $img = asset('storage/' . $img);
            }
        @endphp

        <div class="flex justify-center mb-8">
            @if($img)
                <div class="rounded-xl overflow-hidden shadow-md bg-gray-100 max-w-md">
                    <img
                        src="{{ $img }}"
                        alt="{{ $demon->name }}"
                        class="w-full h-80 object-cover"
                    >
                </div>
            @else
                <div
                    class="w-full h-80 flex items-center justify-center text-gray-400 bg-gray-100 rounded-lg shadow-inner">
                    No image available
                </div>
            @endif
        </div>

        {{-- Details Card --}}
        <div class="bg-white shadow-lg rounded-2xl p-6 mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <p><span class="font-semibold text-gray-700">Race:</span> {{ $demon->race->name }}</p>
                <p><span class="font-semibold text-gray-700">Alignment:</span> {{ $demon->race->alignment }}</p>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
                <p class="text-gray-700 leading-relaxed">{{ $demon->description }}</p>
            </div>
        </div>

        {{-- Buttons --}}
        @auth
            <div class="flex justify-between items-center">
                <a href="{{ route('demons.index') }}"
                   class="text-red-600 hover:text-red-800 font-semibold transition">← Back to list</a>

                <div class="flex items-center space-x-3">
                    <a href="{{ route('demons.edit', $demon->id) }}"
                       class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-yellow-600 transition">Edit</a>

                    <!-- Delete button triggers modal -->
                    <button
                        type="button"
                        onclick="openModal()"
                        class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 transition">
                        Delete
                    </button>
                    @endauth
                </div>
            </div>

            <!-- Confirmation Modal -->
            <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full text-center">
                    <h2 class="text-xl font-semibold mb-4">Are you sure?</h2>
                    <p class="text-gray-600 mb-6">This action cannot be undone. The demon will be permanently
                        deleted.</p>

                    <div class="flex justify-center space-x-4">
                        <button
                            type="button"
                            onclick="closeModal()"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">
                            Cancel
                        </button>

                        <form method="POST" action="{{ route('demons.destroy', $demon->id) }}">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Simple modal toggle script --}}
            <script>
                function openModal() {
                    document.getElementById('deleteModal').classList.remove('hidden');
                    document.getElementById('deleteModal').classList.add('flex');
                }

                function closeModal() {
                    document.getElementById('deleteModal').classList.remove('flex');
                    document.getElementById('deleteModal').classList.add('hidden');
                }
            </script>


    </div>
@endsection
