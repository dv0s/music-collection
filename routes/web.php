<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/init', [App\Http\Controllers\PermissionController::class, 'init'])->name('init');

Route::group(['middleware' => 'role:overlord'], function(){
    Route::get('/roles', [App\Http\Controllers\PermissionController::class, 'permission'])->name('permissions');
    Route::get('/upgrade-overlord', [App\Http\Controllers\PermissionController::class, 'upgrade_overlord'])->name('upgrade');
});

# GENRES
Route::get('/genres', [App\Http\Controllers\GenreController::class, 'index'])->name('genre-home');
Route::get('/genres/{search?}', [App\Http\Controllers\GenreController::class, 'index'])->name('genre-search');
Route::prefix('genre')->name('genre-')->group(function(){
    Route::get('/create', [App\Http\Controllers\GenreController::class, 'create'])->name('create');
    Route::post('/create', [App\Http\Controllers\GenreController::class, 'store'])->name('store');
    Route::get('/edit/{genre}', [App\Http\Controllers\GenreController::class, 'edit'])->name('edit');
    Route::put('/edit/{genre}', [App\Http\Controllers\GenreController::class, 'update'])->name('update');
    Route::delete('/destory', [App\Http\Controllers\GenreController::class, 'destroy'])->name('destroy');
    Route::get('/genre/{genre}', [App\Http\COntrollers\GenreController::class, 'show'])->name('show');
});

# ARTISTS
Route::get('/artists', [App\Http\Controllers\ArtistController::class, 'index'])->name('artist-home');
Route::get('/artists/{search?}', [App\Http\Controllers\ArtistController::class, 'index'])->name('artist-search');
Route::prefix('artist')->name('artist-')->group(function(){
    Route::get('/create', [App\Http\Controllers\ArtistController::class, 'create'])->name('create');
    Route::post('/create', [App\Http\Controllers\ArtistController::class, 'store'])->name('store');
    Route::get('/edit/{artist}', [App\Http\Controllers\ArtistController::class, 'edit'])->name('edit');
    Route::put('/edit/{artist}', [App\Http\Controllers\ArtistController::class, 'update'])->name('update');
    Route::delete('/destory', [App\Http\Controllers\ArtistController::class, 'destroy'])->name('destroy');
    Route::get('/{artist}', [App\Http\Controllers\ArtistController::class, 'show'])->name('show');
});

# ALBUMS
Route::get('/albums', [App\Http\Controllers\AlbumController::class, 'index'])->name('album-home');
Route::get('/albums/{search?}', [App\Http\Controllers\AlbumController::class, 'index'])->name('album-search');
Route::prefix('album')->name('album-')->group(function () {
    Route::get('/create', [App\Http\Controllers\AlbumController::class, 'create'])->name('create');
    Route::post('/create', [App\Http\Controllers\AlbumController::class, 'store'])->name('store');
    Route::get('/edit/{album}', [App\Http\Controllers\AlbumController::class, 'edit'])->name('edit');
    Route::put('/edit/{album}', [App\Http\Controllers\AlbumController::class, 'update'])->name('update');
    Route::delete('/destroy', [App\Http\Controllers\AlbumController::class, 'destroy'])->name('destroy');
    Route::get('/{album}', [App\Http\Controllers\AlbumController::class, 'show'])->name('show');
});

# SONGS
Route::get('/songs', [App\Http\Controllers\SongController::class, 'index'])->name('song-home');
Route::get('/songs/{search?}', [App\Http\Controllers\SongController::class], 'index')->name('song-search');
Route::prefix('song')->name('song-')->group(function(){
    Route::get('/create', [App\Http\Controllers\SongController::class, 'create'])->name('create');
    Route::post('/create', [App\Http\Controllers\SongController::class, 'store'])->name('store');
    Route::get('/edit/{song}', [App\Http\Controllers\SongController::class, 'edit'])->name('edit');
    Route::put('/edit/{song}', [App\Http\Controllers\SongController::class, 'update'])->name('update');
    Route::delete('/destroy', [App\Http\Controllers\SongController::class, 'destroy'])->name('destroy');
    Route::get('/{song}', [App\Http\Controllers\SongController::class, 'show'])->name('show');
});

# Overlord Section
Route::name('overlord-')->middleware('role:overlord')->group(function(){
    Route::name('permission-')->group(function(){
        Route::get('/settings/permissions', [App\Http\Controllers\Overlord\PermissionController::class, 'index'])->name('home');
        Route::get('/settings/permission/create', [App\Http\Controllers\Overlord\PermissionController::class, 'create'])->name('create');
        Route::post('/settings/permission/create', [App\Http\Controllers\Overlord\PermissionController::class, 'store'])->name('store');
        Route::get('/settings/permission/edit/{permission}', [App\Http\Controllers\Overlord\PermissionController::class, 'edit'])->name('edit');
        Route::put('/settings/permission/edit/{permission}', [App\Http\Controllers\Overlord\PermissionController::class, 'update'])->name('update');
        Route::delete('/settings/permission/destroy', [App\Http\Controllers\Overlord\PermissionController::class, 'destroy'])->name('destroy');

        Route::get('/settings/permission/{permission}', [App\Http\Controllers\Overlord\PermissionController::class, 'show'])->name('show');
    });

    Route::name('role-')->group(function () {
        Route::get('/settings/roles', [App\Http\Controllers\Overlord\RoleController::class, 'index'])->name('home');
        Route::get('/settings/role/create', [App\Http\Controllers\Overlord\RoleController::class, 'create'])->name('create');
        Route::post('/settings/role/create', [App\Http\Controllers\Overlord\RoleController::class, 'store'])->name('store');
        Route::get('/settings/role/edit/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'edit'])->name('edit');
        Route::put('/settings/role/edit/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'update'])->name('update');
        Route::delete('/settings/role/destroy', [App\Http\Controllers\Overlord\RoleController::class, 'destroy'])->name('destroy');
        
        Route::get('/settings/role/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'show'])->name('show');
    });

    Route::name('users-')->group(function(){
        Route::get('/settings/users/', [App\Http\Controllers\Overlord\UserController::class, 'index'])->name('home');
        Route::get('/settings/user/create', [App\Http\Controllers\Overlord\UserController::class, 'create'])->name('create');
        Route::post('/settings/user/create', [App\Http\Controllers\Overlord\UserController::class, 'store'])->name('store');
        Route::get('/settings/user/edit/{user}', [App\Http\Controllers\Overlord\UserController::class, 'edit'])->name('edit');
        Route::put('/settings/user/edit/{user}', [App\Http\Controllers\Overlord\UserController::class, 'update'])->name('update');
        Route::delete('/settings/user/delete', [App\Http\COntrollers\Overlord\UserController::class, 'destroy'])->name('destroy');

        Route::get('/settings/user/{user}', [App\Http\Controllers\Overlord\UserController::class, 'show'])->name('show');
    });
});
