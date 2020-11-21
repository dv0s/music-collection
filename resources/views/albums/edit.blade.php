@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    <script type="text/javascript">
        $('.select2').select2();
    </script>
@endpush

@section('main')
<div class="flex flex-col flex-wrap w-full">
    <h1 class="text-2xl text-gray-800 mb-6">{{ $album->title }} aanpassen</h1>

    <form action="{{ route('album-update', [$album->id]) }}" method="POST" class="w-full" id="album">
        @csrf
        @method('PUT')

        <div class="flex flex-row flex-wrap">
            <section class="w-1/2 flex flex-col flex-wrap">
                <x-form-input type="text" name="title" id="title" label="Album titel" :value="old('title') ?? $album->title"></x-form-input>
                <x-form-input type="date" name="released_at" id="released_at" label="Samengekomen op" :value="old('released_at') ?? $album->released_at->format('Y-m-d')" ></x-form-input>
                <x-form-textarea name="description" id="description" label="Beschrijving" :value="old('description') ?? $album->description"></x-form-textarea>

                <div class="flex-row">
                    <a class="bg-gray-200 hover:bg-gray-300 px-4 py-2 uppercase text-sm font-semibold ml-3" href="{{ url()->previous() }}">Terug</a>
                    <button class="bg-blue-500 px-4 py-2 uppercase text-sm font-semibold text-white hover:bg-blue-600 ml-3">Save</button>
                </div>

            </section>
            <section class="w-1/2 flex flex-col flex-wrap">
                <div class="container pl-4 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="artist_id">
                        Artiesten
                    </label>
                    <select name="artist_id" id="artist_id" class="select2 w-full">
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}" {{ $album->artist_id == $artist->id ? 'selected' : ''  }}>{{ $artist->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="container pl-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="genre_id">
                        Genre
                    </label>
                    <select name="genre_id" id="genre_id" class="select2 w-full">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ $album->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </section>
        </div>
    </form>

</div>
@endsection