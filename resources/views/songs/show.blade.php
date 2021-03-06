@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    <script type="text/javascript">
        function do_delete(form, name)
        {
            if(confirm("Do you really want to delete " +name+ "?")){
                document.getElementById(form).submit();
            }

            return false;
        }

    </script>
@endpush

@section('main')
<div class="flex flex-wrap flex-row w-full">
    <div class="row flex flex-wrap flex-col w-2/3 my-2">
        
        <h1 class="text-3xl">{{ $song->title }}</h1>
        <div class="flex flex-wrap flex-row w-full">
            <div class="p-4">
                <h4 class="uppercase text-sm">Genre</h4>
                <span class="text-xl">
                    <a href="{{ route('genre-show', [$song->album->genre->id]) }}" class="text-blue-500 hover:text-blue-600">{{ $song->album->genre->name }}</a>
                </span>
            </div>
            <div class="p-4">
                <h4 class="uppercase text-sm">Album</h4>
                <span class="text-xl">
                    <a href="{{ route('album-show', [$song->album->id]) }}" class="text-blue-500 hover:text-blue-600">{{ $song->album->title }}</a>
                </span>
            </div>

            <div class="p-4">
                <h4 class="uppercase text-sm">Artiest</h4>
                <span class="text-xl">
                    <a href="{{ route('artist-show', [$song->album->artist->id]) }}" class="text-blue-500 hover:text-blue-600">{{ $song->album->artist->name }}</a>
                </span>
            </div>

            <div class="p-4">
                <h4 class="uppercase text-sm">Uitgebracht op</h4>
                <span class="text-xl">{{ \Carbon\Carbon::parse($song->release)->format('d-m-Y') }}</span>
            </div>
            <div class="p-4">
                <h4 class="uppercase text-sm">Rating</h4>
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
            </div>
        </div>
        
    </div>

    <div class="row w-1/3">
        <a class="text-blue-400 hover:text-blue-500 hover:underline flex flex-row items-center h-12 px-4 rounded-lg bg-gray-100" href="{{ url()->previous() }}">
            <svg class="w-6 h-6" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span class="ml-3">Terug</span>
        </a>
        @permission('edit-song')
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
        @endpermission
        @permission('delete-song')
        <form action="{{ route('song-destroy') }}" 
                class="w-full"
                method="POST" 
                onsubmit="do_delete('delete_{{ $song->id }}', '{{ $song->title }}'); return false" 
                id="delete_{{ $song->id }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="song_id" value="{{ $song->id }}">
            <button class="text-red-400 hover:text-red-500 hover:underline w-full flex flex-row items-center h-12 px-4 rounded-lg bg-gray-100 uppercase">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                <span>nummer verwijderen</span>
            </button>
        </form> 
        @endpermission
    </div>
</div>
@endsection