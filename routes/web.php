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
Route::get('/roles', [App\Http\Controllers\PermissionController::class, 'permission'])->name('permissions');

Route::group(['middleware' => 'role:deejay'], function(){
    Route::get('/deejay', function(){
        return "Only for deejays";
    });
});

Route::group(['middleware' => 'role:manager'], function(){
    Route::get('/admin', function(){
        return "Admin- Only";
    });
});