@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@section('main')
<div class="flex flex-wrap">


<h1 class="text-3xl">{{ $song->title }} aanpassen</h1>
    <form class="w-full max-w-lg">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Song title
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" value="{{ $song->title }}">
            <p class="text-gray-600 text-xs italic"></p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                E-mail
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email">
            <p class="text-gray-600 text-xs italic"></p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Album
            </label>
                <select name="album" id="album" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 select2">
                    <option value="">Select an album</option>
                    @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->title }}</option>
                    @endforeach
                </select>
            <p class="text-gray-600 text-xs italic"></p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Message
            </label>
            <textarea class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>
            <p class="text-gray-600 text-xs italic"></p>
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-2/3">
            <a href="{{ url()->previous() }}" class="shadow focus:shadow-outline focus:outline-none text-blue-400 border-blue-400 hover:border-blue-500 border font-bold py-2 mr-4 px-4 rounded">
                Terug
            </a>
            <button class="shadow bg-blue-400 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                Opslaan
            </button>
            </div>
            <div class="md:w-2/3"></div>
        </div>
    </form>
</div>
@endsection

@push('script')
    <script type="text/javascript">
        $('.select2').select2();
    </script>
@endpush