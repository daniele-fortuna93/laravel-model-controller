@extends('layouts.main')

@section('titlePage')
{{ $movie->title }}
@endsection

@section('content')
    <h1>{{ $movie->title }}</h1>
    <h2>Regista: {{ $movie->author }}</h2>
    <p>Trama: {{ $movie->description }}</p>
    <p>Durata: {{ $movie->time }}</p>
    <p>Anno uscita: {{ $movie->year }}</p>
    <a href="{{ route('movies.index') }}">Homepage</a>
@endsection

