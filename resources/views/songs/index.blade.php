@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-col w-full">
    <div class="flex flex-wrap flex-row w-full">
        <div class="row w-2/3">
            <h1 class="text-2xl">Nummers overzicht</h1>
        </div>
        <div class="row w-1/3">
            <form action="{{ route('song-search') }}">
                <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                type="search" name="search" placeholder="Search" value="{{ request()->get('search') ?? old('search') ?? "" }}">
                <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                    width="512px" height="512px">
                    <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
                </button>
            </form>
        </div>

        </div>

    </div>

    <div class="py-8 w-full">
        @empty(request()->get('search'))
        <div class="mb-6">
        {{ $songs->onEachSide(3)->links('vendor.pagination.tailwind') }}
        </div>
        @endempty
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm hidden md:visible">Album</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Length</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm hidden md:visible">Rating</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($songs as $song)
                    <tr>
                        <td class="text-left py-3 px-4">
                            <div class="flex flex-col flex-wrap">
                                <a class="hover:text-blue-500 text-lg" href="{{ route('song-show', $song->id) }}">{{ $song->title }}</a>
                                <span class="text-xs italic hidden md:visible">- by <a class="hover:text-blue-500" href="#">{{ $song->album->artist->name }}</a></span>
                            </div>
                        </td>
                        <td class="text-left py-3 px-4 hidden md:visible"><a class="hover:text-blue-500" href="#">{{ $song->album->title }}</a></td>
                        <td class="text-left py-3 px-4">{{ $song->length }}</td>
                        <td class="text-left py-3 px-4 hidden md:visible">
                            <div class="flex flex-row">
                            @for ($i = 0; $i < $song->rating; $i++)
                                <span class="text-yellow-600">
                                    <svg class="w-6 h-6" 
                                            fill="none" 
                                            stroke="currentColor" 
                                            viewBox="0 0 24 24" 
                                            xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                </span>
                            @endfor
                            </div>
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection