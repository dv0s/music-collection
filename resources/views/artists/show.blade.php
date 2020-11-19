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
        <a href="{{ route('artist-home') }}" class="text-blue-500 hover:text-blue-600 flex flex-row w-full">
            <svg class="w-6 h-6 mt-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="ml-3">{{ $artist->name }}</span>
        </a>
    </h1>

    <div class="w-full flex flex-row">
        <section class="w-1/2 flex flex-col flex-wrap">
            <h2 class="uppercase text-base text-gray-800 ml-3">
                Samengekomen op
            </h2>
            <div class="flex flex-col flex-wrap ml-3 py-2 px-6 mb-6">
                <span class="text-lg mb-1">
                    {{ $artist->formed_at->formatLocalized('%A, %d %B %Y') }} 
                </span>
            </div>

            <h2 class="uppercase text-base text-gray-800 ml-3 mb-3">
                Beschrijving
            </h2>
            <div class="flex flex-col flex-wrap py-2 px-3">
                <span class="text-sm mb-1">
                    {!! $artist->description !!} 
                </span>
            </div>
        </section>
        <section class="w-1/2 flex flex-col flex-wrap">
            <h2 class="uppercase text-xl text-gray-800 ml-3">
                Albums
            </h2>
            <div class="flex flex-col flex-wrap ml-3 py-2 px-6">
                @foreach ($artist->albums as $album)
                <a href="{{ route('album-show', [$album->id]) }}" class="text-blue-500 hover:text-blue-600 text-lg mb-1 flex flex-row">
                    <svg class="w-6 h-6 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>{{ $album->title }}</span> 
                </a>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection