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

Route::get('/genres', [App\Http\Controllers\GenreController::class, 'index'])->name('genre-home');
Route::get('/artists', [App\Http\Controllers\ArtistController::class, 'index'])->name('artist-home');
Route::get('/albums', [App\Http\Controllers\AlbumController::class, 'index'])->name('album-home');
Route::get('/songs', [App\Http\Controllers\SongController::class, 'index'])->name('song-home');

Route::name('song-')->prefix('song')->group(function () {
    Route::get('/{song}', [App\Http\Controllers\SongController::class, 'show'])->name('show');
    // Route::get('/{song}', 'SongController@show')->name('show');
});

Route::group(['middleware' => 'role:overlord'], function(){
    Route::get('/roles', [App\Http\Controllers\PermissionController::class, 'permission'])->name('permissions');
    Route::get('/upgrade-overlord', [App\Http\Controllers\PermissionController::class, 'upgrade_overlord'])->name('upgrade');
});

# Overlord Section
Route::group(['middleware' => 'role:overlord'], function(){
    Route::name('overlord-permission-')->group(function(){
        Route::get('/settings/permissions', [App\Http\Controllers\Overlord\PermissionController::class, 'index'])->name('home');
        Route::get('/settings/permission/create', [App\Http\Controllers\Overlord\PermissionController::class], 'create')->name('create');
        Route::post('/settings/permission/create', [App\Http\Controllers\Overlord\PermissionController::class, 'store'])->name('store');
        Route::get('/settings/permission/edit/{role}', [App\Http\Controllers\Overlord\PermissionController::class, 'edit'])->name('edit');
        Route::put('/settings/permission/edit/{role}', [App\Http\Controllers\Overlord\PermissionController::class, 'update'])->name('update');
        Route::delete('/settings/permission/trash/{role}', [App\Http\Controllers\Overlord\PermissionController::class, 'trash'])->name('trash');
        Route::get('/settings/permission/{role}', [App\Http\Controllers\Overlord\PermissionController::class, 'show'])->name('show');
    });

    Route::name('overlord-role-')->group(function () {
        Route::get('/settings/roles', [App\Http\Controllers\Overlord\RoleController::class, 'index'])->name('home');
        Route::get('/settings/role/create', [App\Http\Controllers\Overlord\RoleController::class], 'create')->name('create');
        Route::post('/settings/role/create', [App\Http\Controllers\Overlord\RoleController::class, 'store'])->name('store');
        Route::get('/settings/role/edit/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'edit'])->name('edit');
        Route::put('/settings/role/edit/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'update'])->name('update');
        Route::delete('/settings/role/trash/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'trash'])->name('trash');
        Route::get('/settings/role/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'show'])->name('show');
    });
});
