<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct()
    {
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
            $albums = Album::where('title', 'LIKE', '%' . request()->get('search') . '%')->get();
            return view('albums.index', compact('albums'));
        }

        $albums = Album::paginate(15);
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!request()->user()->can('create-album') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $artists = Artist::all();
        $genres = Genre::all();

        return view('albums.create', compact('artists', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!request()->user()->can('create-album') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $request->validate([
            'title' => 'required',
            'released_at' => 'required|date'
        ]);

        $album = new Album();
        $album->artist_id = $request->artist_id;
        $album->genre_id = $request->genre_id;
        $album->title = Str::title($request->title);
        $album->slug = Str::slug($request->title);
        $album->released_at = $request->released_at;
        $album->description = $request->description;

        $album->save();

        return redirect()->route('album-home')->with('success', "Album is aangemaakt");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {   
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        if (!request()->user()->can('edit-album') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $artists = Artist::all();
        $genres = Genre::all();

        return view('albums.edit', compact('album', 'artists', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        if (!request()->user()->can('edit-album') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $request->validate([
            'title' => 'required',
            'released_at' => 'required|date'
        ]);

        $album->artist_id = $request->artist_id;
        $album->genre_id = $request->genre_id;
        $album->title = Str::title($request->title);
        $album->slug = Str::slug($request->title);
        $album->released_at = $request->released_at;
        $album->description = $request->description;

        $album->save();

        return redirect()->route('album-home')->with('success', "Het album is aangepast!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!request()->user()->can('delete-album') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $album = Album::find($request->album_id);

        if ($album->songs->count() > 0) {
            return redirect()->route('album-home')->with('warning', 'Kan het album niet verwijderen als er nog nummers in het album staan');
        }

        Album::find($request->album_id)->delete();
        return redirect()->route('album-home')->with('success', "Het album \"$album->name\" is verwijderd!");
    }
}
