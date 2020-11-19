@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-col flex-wrap w-full">
    <h1 class="text-2xl text-gray-800 mb-6">Genre aanmaken</h1>

    <form action="{{ route('genre-store') }}" method="POST" class="w-full" id="genre">
        @csrf
        <section class="w-1/2 flex flex-row flex-wrap">
            <x-form-input type="text" name="name" id="name" label="Genre naam" :value="old('name')" />
            <button class="bg-blue-500 px-4 py-2 uppercase text-sm font-semibold text-white hover:bg-blue-600 ml-3">Save</button>
        </section>
    </form>

</div>
@endsection