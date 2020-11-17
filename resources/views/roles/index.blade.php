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
<div class="py-8 w-full">
    <div class="w-full flex flew-row flex-wrap mb-6">
        <a href="{{ route('overlord-role-create') }}" class="text-green-500 flex flex-row">
            <svg class="w-6 h-6" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            <span class="ml-3">Rol aanmaken</span>
        </a>
    </div>
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
        <table class="w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Naam</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Toestemmingen</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm hidden md:block"></th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($roles as $role)
                <tr>
                    <td class="text-left py-3 px-4">
                        <div class="flex flex-col flex-wrap">
                            <a class="hover:text-blue-500 text-lg" href="{{ route('overlord-role-show',$role->id) }}">{{ $role->name }}</a>
                            <span class="text-xs italic hidden sm:block md:hidden">- {{ $role->email }}</span>
                        </div>
                    </td>
                    <td class="text-left py-3 px-4">
                        <div class="inline-flex flex-row sm:flex-col">
                        @foreach ($role->permissions as $permission)
                            <span class="text-xs bg-green-500 py-1 px-1 mx-1 text-white">{{ $permission->name }}</span>
                        @endforeach
                        </div>
                    </td>
                    <td class="text-left py-3 px-4 hidden md:block">
                        <div class="flex flex-row">
                            <a href="{{ route('overlord-role-edit', [$role->id]) }}" class="text-sm text-yellow-600 hover:text-yellow-700 hover:underline px-2 mt-0">edit</a>
                            <form action="{{ route('overlord-role-destroy') }}" 
                                    method="POST" 
                                    onsubmit="do_delete('delete_{{ $role->id }}', '{{ $role->name }}'); return false" 
                                    id="delete_{{ $role->id }}">
                                @csrf
                                @method("DELETE")
                                <input type="hidden" name="role_id" value="{{ $role->id }}">
                                <button type="submit" class="text-sm text-red-600 hover:text-red-700 hover:underline px-2 mt-0">delete</button>
                            </form>
                        </div>
                    </td>
                </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>    
@endsection