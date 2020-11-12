@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-col">
    <h1 class="text-2xl">Songs home</h1>

    <div class="py-8 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Length</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Album</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Artist</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($songs as $song)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4"><a href="{{ route('song-show', $song->id) }}">{{ $song->title }}</a></td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $song->length }}</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="#">{{ $song->album->title }}</a></td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="#">{{ $song->artist->name }}</a></td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection