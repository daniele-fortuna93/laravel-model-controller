<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    public function getAll(){

        $movies = Movie::all();

        return response()->json($movies);
    }

    public function getMovie(Movie $movie){

        return response()->json($movie);
    }
}
