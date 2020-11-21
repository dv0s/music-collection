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
<div class="flex flex-col w-full">
    <div class="flex flex-wrap flex-row w-full">
        <div class="row w-2/3">
            <h1 class="text-2xl">Artiesten Home</h1>
        </div>
        <div class="row w-1/3">
            <form action="{{ route('artist-search') }}">
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
                </div>
            </form>
        </div>
    </div>

    <div class="py-8 w-full">
        @permission('create-artist')
        <a href="{{ route('artist-create') }}" class="flex flew-row flex-wrap text-green-500 mb-2">
            <svg class="w-6 h-6" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>Artist aanmaken</span>
        </a>
        @endpermission
        @empty(request()->get('search'))
        <div class="mb-6">
        {{ $artists->onEachSide(3)->links('vendor.pagination.tailwind') }}
        </div>
        @endempty
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Naam</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Albums</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @if ($artists->isEmpty())
                    <tr>
                        <td colspan="2" class="text-center py-4">
                            Geen resultaten gevonden... <a href="{{ route('artist-home') }}" class="text-blue-500 hover:text-blue-600 hover:underline">Terug naar artists home?</a>
                        </td>
                    </tr>
                    @else
                    @foreach ($artists as $artist)
                    <tr>
                        <td class="text-left py-3 px-4">
                            <div class="flex flex-col flex-wrap">
                                <a class="hover:text-blue-500 text-lg" href="{{ route('artist-show', [$artist->id]) }}">{{ $artist->name }}</a>
                            </div>
                        </td>
                        <td class="text-left py-3 px-4">
                            <div class="flex flex-col flex-wrap">
                                <span class="text-lg">{{ $artist->albums->count() }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-4 w-200">
                            <div class="flex flex-row flex-wrap w-full text-right">
                                @permission('edit-artist')    
                                <a href="{{ route('artist-edit', [$artist->id]) }}" class="text-yellow-500 hover:text-yellow-600 hover:underline text-sm uppercase mt-1 mr-3">edit</a>
                                @endpermission
                                @permission('delete-artist')
                                <form action="{{ route('artist-destroy') }}" 
                                        method="POST" 
                                        onsubmit="do_delete('delete_{{ $artist->id }}', '{{ $artist->name }}'); return false" 
                                        id="delete_{{ $artist->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="artist_id" value="{{ $artist->id }}">
                                    <button class="text-red-400 hover:text-red-500 hover:underline text-sm uppercase mt-1">delete</button>
                                </form>
                                @endpermission
                            </div>
                        </td>
                    </tr>                    
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection