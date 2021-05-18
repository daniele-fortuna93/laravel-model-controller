@extends('layouts.main')

@section('titlePage')
    Home Page
@endsection

@section('content')
    <div class="text-right">
        <a href="{{ route('movies.create') }}"><button type="button" class="btn btn-success mb-3">Aggiungi film</button></a>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table__movie table table-striped">
        <thead>
            <tr>
                <th scope="col">Img</th>
                <th scope="col">Titolo</th>
                <th scope="col">Regista</th>
                <th scope="col">Durata</th>
                <th scope="col">Anno</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td><img class="img__home" src="{{ $movie->image_path }}" alt=""></td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->author }}</td>
                <td>{{ $movie->time }} min</td>
                <td>{{ $movie->year }}</td>
                <td class="actions__table">
                    <a href="{{ route('movies.show',$movie->id) }}"><button type="button" class="btn btn-primary">Info</button></a>
                    <a href="{{ route('movies.edit',$movie->id) }}"><button type="button" class="btn btn-success">Modifica</button></a>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
