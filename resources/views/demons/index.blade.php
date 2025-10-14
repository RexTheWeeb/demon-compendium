@extends('layouts.nav')
@section('content')
    @foreach($demon as $demons)
        <li>Name: {{ $demons->name }}</li>
        <li>Origin: {{ $demons->origin }}</li>
        <li>Race: {{ $demons->race }}</li>
        <li>Alignment: {{ $demons->alignment }}</li>
        <li>Description: {{ $demons->description }}</li>
        <img src="{{ $demons->image_url }}" alt="{{ $demons->name }}">
    @endforeach
@endsection
