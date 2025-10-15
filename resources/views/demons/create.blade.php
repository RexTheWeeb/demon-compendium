@extends('layouts.nav')
@section('content')
    @auth
        <form method="POST" action="{{ route('demons.store') }}">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="origin">Origin:</label>
                <input type="text" id="origin" name="origin" required>
            </div>
            <label>Race:</label>
            <select name="race_id" id="raceSelect">
                <option value="">-- Choose a race --</option>
                @foreach($races as $race)
                    <option value="{{ $race->id }}" data-alignment="{{ $race->alignment }}">
                        {{ $race->name }}
                    </option>
                @endforeach
            </select><br>
            <div>
                <label>Alignment:</label>
                <input type="text" id="alignmentInput" name="alignment" readonly><br>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div>
                <label for="image_url">Image URL:</label>
                <input type="text" id="image_url" name="image_url" required>
            </div>
            <button type="submit">Create Demon</button>
        </form>
        <script>
            document.getElementById('raceSelect').addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                const alignment = selected.getAttribute('data-alignment');
                document.getElementById('alignmentInput').value = alignment || '';
            });
        </script>
    @endauth
    @guest
        <p>You have to be logged in to access this.</p>
    @endguest
@endsection
