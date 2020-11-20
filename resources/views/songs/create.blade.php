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
    <h1 class="text-2xl text-gray-800 mb-6">Nummer aanmaken</h1>

    <form action="{{ route('song-store') }}" method="POST" class="w-full" id="album">
        @csrf

        <div class="flex flex-row flex-wrap">
            <section class="w-1/2 flex flex-col flex-wrap">
                <x-form-input type="text" name="title" id="title" label="Titel" :value="old('title')"></x-form-input>
                <x-form-input type="date" name="release" id="release" label="Uitgebracht" :value="old('release')" ></x-form-input>
                <x-form-input type="time" name="length" id="length" label="Duur" :value="old('length')" step="1"></x-form-input>
                <x-form-input type="number" name="rating" id="rating" label="Rating" :value="old('rating') ?? '1'" min="1" max="5"></x-form-input>

                <div class="flex-row">
                    <a class="bg-gray-200 hover:bg-gray-300 px-4 py-2 uppercase text-sm font-semibold ml-3" href="{{ url()->previous() }}">Terug</a>
                    <button class="bg-blue-500 px-4 py-2 uppercase text-sm font-semibold text-white hover:bg-blue-600 ml-3">Save</button>
                </div>

            </section>
            <section class="w-1/2 flex flex-col flex-wrap">
                <div class="container pl-4 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="artist_id">
                        Album
                    </label>
                    <select name="album_id" id="album_id" class="select2 w-full">
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}">{{ $album->title }}</option>
                        @endforeach
                    </select>
                </div>
            </section>
        </div>
    </form>

</div>
@endsection