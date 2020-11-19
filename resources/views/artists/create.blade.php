@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-col flex-wrap w-full">
    <h1 class="text-2xl text-gray-800 mb-6">Artiest aanmaken</h1>

    <form action="{{ route('artist-store') }}" method="POST" class="w-full" id="artist">
        @csrf
        <section class="w-1/2 flex flex-row flex-wrap">
            <x-form-input type="text" name="name" id="name" label="Artiesten naam" :value="old('name')"></x-form-input>
            <x-form-input type="date" name="formed_at" id="formed_at" label="Samengekomen op" :value="old('formed_at')" ></x-form-input>
            <x-form-textarea name="description" id="description" label="Beschrijving" :value="old('description')"></x-form-textarea>
            
            <button class="bg-blue-500 px-4 py-2 uppercase text-sm font-semibold text-white hover:bg-blue-600 ml-3">Save</button>
        </section>
    </form>

</div>
@endsection