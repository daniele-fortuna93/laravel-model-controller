@extends('layouts.main')

@section('titlePage')
    Aggiungi Film
@endsection

@section('content')
    <h1>Aggiungi Film</h1>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> 
    </div>
        @endif
        <form action="{{ route('movies.store')}}" method="post" class="form-group">
        @csrf
        @method('POST')
        <label for="title">Titolo</label>
        <input class="form-control" type="text" id="title" name="title" placeholder="Titolo" value="{{ old('title') }}">

        <label for="author">Autore</label>
        <input class="form-control" type="text" id="author" name="author" placeholder="Autore" value="{{ old('author') }}">

        <label for="description">Trama</label>
        <textarea class="form-control" type="text" id="description" name="description" placeholder="Trama..."  cols="30" rows="10">{{ old('description') }}</textarea>
        
        <label for="time">Durata</label>
        <input class="form-control" type="text" id="time" name="time" placeholder="Durata" value="{{ old('time') }}">

        <label for="year">Anno</label>
        <select class="form-control" id="year" name="year">
            @for ($i = 1900; $i < date("Y") + 1; $i++)
            <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor           
        </select>

        <label for="image_path">Image Url</label>
        <input class="form-control" type="text" id="image_path" name="image_path" placeholder="Url" value="{{ old('image_path') }}">

        <input class="btn btn-primary mt-3" type="submit" value="Invia">
    </form>
    <a href="{{ route('movies.index') }}">Homepage</a>
@endsection