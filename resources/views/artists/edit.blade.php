@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-col flex-wrap w-full">
    <h1 class="text-2xl text-gray-800 mb-6">{{ $artist->name }} aanpassen</h1>

    <form action="{{ route('artist-update', [$artist->id]) }}" method="POST" class="w-full" id="artist">
        @csrf
        @method('PUT')

        <section class="w-1/2 flex flex-row flex-wrap">
            <x-form-input type="text" name="name" id="name" label="Artiesten naam" :value="old('name') ?? $artist->name"></x-form-input>
            <x-form-input type="date" name="formed_at" id="formed_at" label="Samengekomen op" :value="old('formed_at') ?? $artist->formed_at->format('Y-m-d')" ></x-form-input>
            <x-form-textarea name="description" id="description" label="Beschrijving" :value="old('description') ?? $artist->description"></x-form-textarea>

            <a class="bg-gray-200 hover:bg-gray-300 px-4 py-2 uppercase text-sm font-semibold ml-3" href="{{ url()->previous() }}">Terug</a>
            <button class="bg-blue-500 px-4 py-2 uppercase text-sm font-semibold text-white hover:bg-blue-600 ml-3">Save</button>
        </section>
    </form>

</div>
@endsection