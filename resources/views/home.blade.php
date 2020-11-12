@extends('layouts.app')

@section('main')

    @role('overlord')
    <div class="flex flex-wrap">
        <ul class="items-center pr-4">
            <li class="font-bold text-xl">Roles</li>
            <li><a href="{{ route('overlord-role-home') }}">Home</a></li>
            <li><a href="{{ route('overlord-role-create') }}">Create</a></li>
        </ul>

        <ul class="items-center pl-4">
            <li class="font-bold text-xl">Permissions</li>
            <li><a href="{{ route('overlord-permission-home') }}">Home</a></li>
            <li><a href="{{ route('overlord-permission-create') }}">Create</a></li>
        </ul>
    </div>
    @endrole

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
