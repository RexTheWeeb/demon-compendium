@extends('layouts.nav')
@section('content')
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
        <div>
            <label for="race">Race:</label>
            <input type="text" id="race" name="race" required>
        </div>
        <div>
            <label for="alignment">Alignment:</label>
            <input type="text" id="alignment" name="alignment" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" required>
        </div>
        <div>
            <label for="added_by">Added by:</label>
            <input type="text" id="added_by" name="added_by" required>
        </div>
        <button type="submit">Create Demon</button>
    </form>
@endsection
