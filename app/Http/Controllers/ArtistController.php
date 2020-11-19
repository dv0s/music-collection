<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArtistController extends Controller
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
            $artists = Artist::where('name', 'LIKE', '%' . request()->get('search') . '%')->get();
            return view('artists.index', compact('artists'));
        }

        $artists = Artist::paginate(15);
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!request()->user()->can('create-artist') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!request()->user()->can('create-artist') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required',
            'formed_at' => 'required|date'
        ]);

        $artist = new Artist();
        $artist->name = Str::title($request->name);
        $artist->slug = Str::slug($request->name);
        $artist->formed_at = $request->formed_at;
        $artist->description = $request->description;

        $artist->save();

        return redirect()->route('artist-home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        if (!request()->user()->can('edit-artist') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        if (!request()->user()->can('edit-artist') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required',
            'formed_at' => 'required|date'
        ]);

        $artist->name = Str::title($request->name);
        $artist->slug = Str::slug($request->name);
        $artist->formed_at = $request->formed_at;
        $artist->description = $request->description;

        $artist->save();

        return redirect()->route('artist-home')->with('success', "Het artist is aangepast!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!request()->user()->can('delete-artist') && !request()->user()->hasRole(config('app.superuser_role'))) {
            return abort(403);
        }

        $artist = Artist::find($request->artist_id);

        if ($artist->albums->count() > 0) {
            return redirect()->route('artist-home')->with('warning', 'Kan de artiest niet verwijderen als er nog albums bestaan van de artiest');
        }

        Artist::find($request->artist_id)->delete();
        return redirect()->route('artist-home')->with('success', "Het artist \"$artist->name\" is verwijderd!");
    }
}
