<?php

use App\Http\Controllers\Overlord\PermissionController;
use App\Models\Permission;
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

Route::group(['middleware' => 'role:overlord'], function(){
    Route::get('/roles', [App\Http\Controllers\PermissionController::class, 'permission'])->name('permissions');
    Route::get('/upgrade-overlord', [App\Http\Controllers\PermissionController::class, 'upgrade_overlord'])->name('upgrade');
});

Route::group(['middleware' => 'role:deejay'], function(){
    Route::get('/deejay', function(){
        return "Only for deejays";
    });
});

Route::group(['middleware' => 'role:manager'], function(){
    Route::get('/manager', function(){
        return "Only for managers";
    });
});


# Overlord Section
Route::group(['middleware' => 'role:overlord'], function(){
    Route::prefix('overlord-permission-')->group(function(){
        Route::get('/permissions', [App\Http\Controllers\Overlord\PermissionController::class, 'index'])->name('home');
        Route::get('/permission/create', [App\Http\Controllers\Overlord\PermissionController::class], 'create')->name('create');
        Route::post('/permission/create', [App\Http\Controllers\Overlord\PermissionController::class, 'store'])->name('store');
        Route::get('/permission/edit/{role}', [App\Http\Controllers\Overlord\PermissionController::class, 'edit'])->name('edit');
        Route::put('/permission/edit/{role}', [App\Http\Controllers\Overlord\PermissionController::class, 'update'])->name('update');
        Route::delete('/permission/trash/{role}', [App\Http\Controllers\Overlord\PermissionController::class, 'trash'])->name('trash');
        Route::get('/permission/{role}', [App\Http\Controllers\Overlord\PermissionController::class, 'show'])->name('show');
    });

    Route::prefix('overlord-role-')->group(function () {
        Route::get('/roles', [App\Http\Controllers\Overlord\RoleController::class, 'index'])->name('home');
        Route::get('/role/create', [App\Http\Controllers\Overlord\RoleController::class], 'create')->name('create');
        Route::post('/role/create', [App\Http\Controllers\Overlord\RoleController::class, 'store'])->name('store');
        Route::get('/role/edit/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'edit'])->name('edit');
        Route::put('/role/edit/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'update'])->name('update');
        Route::delete('/role/trash/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'trash'])->name('trash');
        Route::get('/role/{role}', [App\Http\Controllers\Overlord\RoleController::class, 'show'])->name('show');
    });
});
