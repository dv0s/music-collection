<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!is_null(request()->get('search')))
        {
            $songs = Song::where('title', 'LIKE', '%'.request()->get('search').'%')->get();
            return view('songs.index', compact('songs'));
        }

        $songs = Song::paginate(15);
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!request()->user()->can('create-song') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $albums = Album::all();

        return view('songs.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!request()->user()->can('create-song') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $request->validate([
            'title' => 'required',
            'release' => 'required|date',
            'length' => 'required'
        ]);

        $song = new Song();
        $song->album_id = $request->album_id;
        $song->title = Str::title($request->title);
        $song->slug = Str::slug($request->title);
        $song->release = $request->release;
        $song->length = $request->length;
        $song->rating = $request->rating;
        
        $song->save();

        return redirect()->route('song-home')->with('success', "Nummer is aangemaakt");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $albums = Album::all();
        return view('songs.edit', compact('song', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        if (!request()->user()->can('edit-song') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $request->validate([
            'title' => 'required',
            'release' => 'required|date',
            'length' => 'required'
        ]);

        $song->album_id = $request->album_id;
        $song->title = Str::title($request->title);
        $song->slug = Str::slug($request->title);
        $song->release = $request->release;
        $song->length = $request->length;
        $song->rating = $request->rating;

        $song->save();

        return redirect()->route('song-home')->with('success', "$song->title is aangepast");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!request()->user()->can('edit-song') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }
        $song = Song::find($request->song_id);
        $song->delete();
        return redirect()->route('song-home')->with('success', "$song->title is succesvol verwijderd");
    }
}
