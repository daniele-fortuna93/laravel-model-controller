<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    // creo un costruttore con dentro un array di controlli da effettuare sui dati inseriti per non ripetere codice
    protected $requestValid;
    public function __construct()
    {
        $year = date('Y') + 1;
        $this->requestValid =[
            'title' => 'required|string|max:80',
            'author' => 'required|string|max:50',
            'description' => 'required|string',
            'time' => 'required|numeric|digits_between:1,3',
            'year' => 'required|numeric|min:1900|max:'.$year
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // reindirizzamento alla index
        $movies = Movie::all();
        return view('movies.index', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // reindirizzamento alla pagina aggiungi film
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Invio al db tutti i dati inseriti solo se hanno superato la validazione

        // validazione dati inseriti dall'utente
        
        // $request->validate($this->requestValid);

        // $data = $request->all();
        // $movieNew = new Movie();
        // $movieNew->title = $data['title'];
        // $movieNew->author = $data['author'];
        // $movieNew->description = $data['description'];
        // $movieNew->time = $data['time'];
        // $movieNew->year = $data['year'];
        // $movieNew->save();

        // versione breve
        $data = $request->all();
        $request->validate($this->requestValid);

        $movieNew = Movie::create($data);
        return redirect()->route('movies.index')->with('message', 'Il film '.  $movieNew->title .' è stato aggiunto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mostro il singolo film

        $movie = Movie::find($id);
        return view('movies.show', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        // reindirizzamento alla pagina di modifica del film specifico
        return view('movies.edit',["movie" => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        // aggiorno i dati del db solo se hanno superato la validazione

        $request->validate($this->requestValid);

        $data = $request->all();
        $movie->update($data);
        return redirect()->route('movies.show', ["movie" => $movie]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {

        // elimino il film specifico
        
        $movie->delete();

        return redirect()->route('movies.index')->with('message', 'Il film '. $movie->title . ' è stato eliminato');
    }
}
