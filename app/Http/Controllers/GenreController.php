<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!is_null(request()->get('search'))) {
            $genres = Genre::where('name', 'LIKE', '%' . request()->get('search') . '%')->get();
            return view('genres.index', compact('genres'));
        }

        $genres = Genre::paginate(15);
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!request()->user()->can('create-genre') && !request()->user()->hasRole(config('app.superuser_role')))
        {
            return abort(403);
        }

        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!request()->user()->can('create-genre') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required'
        ]);

        $genre = new Genre();
        $genre->name = Str::title($request->name);
        $genre->slug = Str::slug($request->name);
        $genre->save();

        return redirect()->route('genre-home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        if (!request()->user()->can('edit-genre') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        if (!request()->user()->can('edit-genre') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required'
        ]);

        $genre->name = Str::title($request->name);
        $genre->slug = Str::slug($request->name);
        $genre->save();

        return redirect()->route('genre-home')->with('success', "Het genre is aangepast!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!request()->user()->can('delete-genre') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $genre = Genre::find($request->genre_id);

        if($genre->albums->count() > 0){
            return redirect()->route('genre-home')->with('warning', 'Kan het genre niet verwijderen als er nog albums bestaan binnen het genre');
        }

        Genre::find($request->genre_id)->delete();
        return redirect()->route('genre-home')->with('success', "Het genre \"$genre->name\" is verwijderd!");
    }
}
