@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
    <h1 class="text-2xl">{{ $song->title }}</h1>
@endsection