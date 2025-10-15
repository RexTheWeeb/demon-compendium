@extends('layouts.nav')
@section('content')

    <h1>Demon List</h1>
    <a href="{{ route('demons.create') }}">Add New Demon</a>

    <ul>
        @foreach($demon as $demons)
            <li>
                <a href="{{ route('demons.show', $demons->id) }}">
                    {{ $demons->name }}
                </a>
            </li>
            <img src="{{ $demons->image_url }}" alt="{{ $demons->name }}">
        @endforeach
    </ul>
@endsection
