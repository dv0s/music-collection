@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-col flex-wrap w-full">
    <h1 class="text-3xl mb-6 w-full">
        <a href="{{ route('genre-home') }}" class="text-blue-500 hover:text-blue-600 flex flex-row w-full">
            <svg class="w-6 h-6 mt-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="ml-3">{{ $genre->name }}</span>
        </a>
    </h1>

    <div class="w-full">
        <section class="w-full flex flex-col flex-wrap">
            <h2 class="uppercase text-xl text-gray-800 ml-3">
                Albums
            </h2>
            <div class="flex flex-col flex-wrap ml-3 py-2 px-6">
                @foreach ($genre->albums as $album)
                <a href="{{ route('album-show', [$album->id]) }}" class="text-blue-500 hover:text-blue-600 text-lg mb-1">
                    {{ $album->title }} 
                </a>
                <span class="italic text-xs mb-3"> - by <a class="text-blue-500 hover:text-blue-600 text-base" href="{{ route('artist-show', [$album->artist->id]) }}">{{ $album->artist->name }}</a></span>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection