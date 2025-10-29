@extends('layouts.nav')

@section('content')
    @auth
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-6 text-center text-gray-800">Add New Demon</h1>

            <form method="POST" action="{{ route('demons.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Name</label>
                    <input type="text" id="name" name="name"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"
                           required>
                </div>

                <!-- Origin -->
                <div>
                    <label for="origin" class="block text-gray-700 font-medium">Origin</label>
                    <input type="text" id="origin" name="origin"
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"
                           required>
                </div>

                <!-- Race -->
                <div>
                    <label for="raceSelect" class="block text-gray-700 font-medium">Race</label>
                    <select name="race_id" id="raceSelect"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"
                            required>
                        <option value="">-- Choose a race --</option>
                        @foreach($races as $race)
                            <option value="{{ $race->id }}" data-alignment="{{ $race->alignment }}">
                                {{ $race->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Alignment -->
                <div>
                    <label for="alignmentInput" class="block text-gray-700 font-medium">Alignment</label>
                    <input type="text" id="alignmentInput" name="alignment" readonly
                           class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 focus:ring-red-400 focus:border-red-400">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                    <textarea id="description" name="description" rows="4" required
                              class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400"></textarea>
                </div>

                <!-- Image -->
                <div>
                    <label for="image_url" class="block text-gray-700 font-medium">Image</label>
                    <input type="file" id="image_url" name="image_url" accept="image/*" required
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-400 focus:border-red-400">
                </div>

                <!-- Submit -->
                <div class="text-right">
                    <button type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 transition">
                        Create Demon
                    </button>
                </div>
            </form>
        </div>

        <script>
            // Script to auto-fill alignment based on selected race
            document.getElementById('raceSelect').addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                const alignment = selected.getAttribute('data-alignment');
                document.getElementById('alignmentInput').value = alignment || '';
            });
        </script>
    @else
        <div class="max-w-xl mx-auto text-center bg-white p-6 rounded-lg shadow-md mt-10">
            <p class="text-gray-700">You must be logged in to add a demon.</p>
            <a href="{{ route('login') }}"
               class="inline-block mt-4 bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                Login
            </a>
        </div>
    @endauth
@endsection
