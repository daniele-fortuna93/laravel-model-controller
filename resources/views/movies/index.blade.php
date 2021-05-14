<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <ul>
        @foreach ($movies as $movie)
            <li>
                <h2>{{ $movie->title }}</h2>
                <h4>{{ $movie->author }}</h4>
                <span>{{ $movie->time }} min</span>
                <a href="{{ route('movies.show',$movie->id) }}">Dettagli film</a>
            </li>
        @endforeach
        </ul>
    </body>
</html>