@extends('layouts.nav')
@section('content')
    <h1>{{ $demon->name }}</h1>
    <p>Origin: {{ $demon->origin }}</p>
    <p>Race: {{ $demon->race }}</p>
    <p>Alignment: {{ $demon->alignment }}</p>
    <p>Description: {{ $demon->description }}</p>
    <img src="{{ $demon->image_url }}" alt="{{ $demon->name }}">
    <p><a href="{{ route('demons.edit', $demon->id) }}">Edit Demon</a></p>
    <p><a href="{{ route('demons.index') }}">← Back to list</a></p>
@endsection
