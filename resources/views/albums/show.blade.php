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
        <a href="{{ route('album-home') }}" class="text-blue-500 hover:text-blue-600 flex flex-row w-full">
            <svg class="w-6 h-6 mt-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="ml-3">{{ $album->title }}</span>
        </a>
    </h1>

    <div class="w-full flex flex-row">
        <section class="w-1/2 flex flex-col flex-wrap">
            <h2 class="uppercase text-base text-gray-800 ml-3">
                Uitgekomen op
            </h2>
            <div class="flex flex-col flex-wrap ml-3 py-2 px-6 mb-6">
                <span class="text-lg mb-1">
                    {{ $album->released_at->formatLocalized('%A, %d %B %Y') }} 
                </span>
            </div>

            <h2 class="uppercase text-base text-gray-800 ml-3 mb-3">
                Beschrijving
            </h2>
            <div class="flex flex-col flex-wrap py-2 px-3">
                <span class="text-sm mb-1">
                    {!! $album->description !!} 
                </span>
            </div>
        </section>
        <section class="w-1/2 flex flex-col flex-wrap">
            <h2 class="uppercase text-xl text-gray-800 ml-3">
                Nummers
            </h2>
            <div class="flex flex-col flex-wrap ml-3 py-2 px-6">
                @foreach ($album->songs as $song)
                <a href="{{ route('album-show', [$song->id]) }}" class="text-blue-500 hover:text-blue-600 text-lg mb-1 flex flex-row">
                    <svg class="w-6 h-6 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                    <span>{{ $song->title }}</span> 
                </a>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection