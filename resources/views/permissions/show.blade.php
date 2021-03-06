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
<div class="flex flex-col flex-wrap">
    <span class="uppercase text-sm text-gray-800 mx-3 mb-2">naam toestemming</span>
    <span class="font-semibold text-gray-900 text-2xl ml-3 mb-6">{{ $permission->name }}</span>
    
    <span class="uppercase text-sm text-gray-800 mx-3 mb-2">rollen</span>
    <div class="flex flex-row flex-wrap mb-6">
        @foreach ($permission->roles as $role)
        <span class="text-white bg-green-500 p-1 text-xs mr-2">{{ $role->name }}</span>
        @endforeach
    </div>

    <span class="uppercase text-sm text-gray-800 mx-3 mb-2">acties</span>
    <div class="flex flex-row flex-wrap mb-6">
        <a href="{{ route('overlord-permission-edit', $permission->id) }}"
            class="bg-yellow-600 hover:bg-yellow-700 text-white text-sm uppercase font-semibold flex flex-row p-4 mr-4">
            <svg class="w-5 h-5" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            <span>Aanpassen</span>
        </a>

        <form action="{{ route('overlord-permission-destroy') }}" 
                method="POST" 
                onsubmit="do_delete('delete_{{ $permission->id }}', '{{ $permission->name }}'); return false" 
                id="delete_{{ $permission->id }}">
            @csrf
            @method("DELETE")
            <input type="hidden" name="permission_id" value="{{ $permission->id }}">
            <button type="submit" class="text-sm bg-red-600 hover:bg-red-700 text-white uppercase font-semibold flex flex-row p-4">
                <svg class="w-5 h-5" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24" 
                        xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span>Delete</span>
            </button>
        </form>
    </div>
</div>
@endsection