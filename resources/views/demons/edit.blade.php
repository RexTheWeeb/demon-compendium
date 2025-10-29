@extends('layouts.nav')

@section('content')
    @auth
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-6 text-center text-gray-800">Edit Demon</h1>

            <form method="POST" action="{{ route('demons.update', $demon->id) }}" enctype="multipart/form-data"
                  class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $demon->name) }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"
                           required>
                </div>

                <!-- Origin -->
                <div>
                    <label for="origin" class="block text-gray-700 font-medium">Origin</label>
                    <input type="text" id="origin" name="origin" value="{{ old('origin', $demon->origin) }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"
                           required>
                </div>

                <!-- Race -->
                <div>
                    <label for="race_id" class="block text-gray-700 font-medium">Race</label>
                    <select id="race_id" name="race_id"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"
                            required>
                        <option value="">-- Select a Race --</option>
                        @foreach($races as $race)
                            <option value="{{ $race->id }}"
                                @selected($race->id == $demon->race_id)>
                                {{ $race->name }} ({{ $race->alignment }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Alignment -->
                <div>
                    <label for="alignment" class="block text-gray-700 font-medium">Alignment</label>
                    <input type="text" id="alignment" name="alignment"
                           value="{{ old('alignment', $demon->alignment) }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"
                           readonly>
                </div>
                
                <!-- Description -->
                <div>
                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"
                              required>{{ old('description', $demon->description) }}</textarea>
                </div>

                <div>
                    <label for="image" class="block text-gray-700 font-medium">Image</label>
                    <input type="file" id="image" name="image" accept="image/*"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400">
                    @if($demon->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $demon->image) }}" alt="{{ $demon->name }}"
                                 class="w-32 h-32 object-cover rounded-md border">
                        </div>
                    @endif
                </div>

                <div class="text-right">
                    <button type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 transition">
                        Update Demon
                    </button>
                </div>
            </form>
        </div>
    @else
        <p class="text-center text-gray-600">You must be logged in to edit demons.</p>
    @endauth
@endsection
