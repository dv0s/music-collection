@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-wrap flex-row w-full">
    <div class="row flex flex-wrap flex-col w-2/3 my-2">
        
        <h1 class="text-3xl">{{ $song->title }}</h1>
        <div class="flex flex-wrap flex-row w-full">
            <div class="p-4">
                <h4 class="uppercase text-sm">Genre</h4>
                <span class="text-xl">{{ $song->album->genre->name }}</span>
            </div>
            <div class="p-4">
                <h4 class="uppercase text-sm">Album</h4>
                <span class="text-xl">{{ $song->album->title }}</span>
            </div>

            <div class="p-4">
                <h4 class="uppercase text-sm">Artiest</h4>
                <span class="text-xl">{{ $song->album->artist->name }}</span>
            </div>
        </div>
        
    </div>

    <div class="row w-1/3">
        <a class="text-blue-400 hover:text-blue-500 hover:underline flex flex-row items-center h-12 px-4 rounded-lg bg-gray-100" href="{{ route('song-edit', [$song->id]) }}">
            <svg class="w-6 h-6" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span class="ml-3">Terug</span>
        </a>
        <a class="text-blue-400 hover:text-blue-500 hover:underline flex flex-row items-center h-12 px-4 rounded-lg bg-gray-100" href="{{ route('song-edit', [$song->id]) }}">
            <svg class="w-6 h-6" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
            </svg>
            <span class="ml-3">Nummer aanpassen</span>
        </a>
    </div>
</div>
@endsection