@extends('layouts.app')

@section('main')

    @auth
        {{ var_dump(auth()->user()->roles()->name) }}   
    @endauth

    <div class="flex flex-wrap">
        <div class="w-5 h-6 bg-red-100"></div>
        <div class="w-5 h-6 bg-red-200"></div>
        <div class="w-5 h-6 bg-red-300"></div>
        <div class="w-5 h-6 bg-red-400"></div>
        <div class="w-5 h-6 bg-red-500"></div>
        <div class="w-5 h-6 bg-red-600"></div>
        <div class="w-5 h-6 bg-red-700"></div>
        <div class="w-5 h-6 bg-red-800"></div>
        <div class="w-5 h-6 bg-red-900"></div>
    </div>
@endsection
