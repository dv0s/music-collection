@extends('layouts.app')

@section('head-nav')
	@include('layouts.partials.head-nav')
@endsection

@section('main')
@auth
    Welcome {{ auth()->user()->name }}    
@endauth

<ul>
    <li>Show latest added songs</li>
    <li>Show latest added albums</li>
    <li>Show latest added artist</li>
    <li>Show list of genres</li>
</ul>

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
