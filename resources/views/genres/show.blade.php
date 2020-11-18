@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-col flex-wrap w-full">
    <h1 class="text-3xl">{{ $genre->name }}</h1>

    <div class="w-full">
        <section class="w-full flex flex-col flex-wrap">
            <h2 class="uppercase text-xl text-gray-800 ml-3">
                Albums
            </h2>
            <div class="flex flex-col flex-wrap ml-3 p-6">
                @foreach ($genre->albums as $album)
                <a href="{{ route('album-show', [$album->id]) }}">
                    {{ $album->title }} 
                </a>
                <span> - by <a href="{{ route('artist-home', [$album->artist->id]) }}">{{ $album->artist->name }}</a></span>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection