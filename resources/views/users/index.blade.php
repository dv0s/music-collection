@extends('layouts.app')

@push('style')
    {{--content--}}
@endpush

@push('script')
    {{--content--}}
@endpush

@section('main')
<div class="py-8 w-full">
    <div class="w-full flex flew-row flex-wrap mb-6">
        <a href="route('user-create')" class="text-green-500 flex flex-row">
            <svg class="w-6 h-6" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            <span class="ml-3">Gebruiker aanmaken</span>
        </a>
    </div>
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
        <table class="w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Naam</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm hidden md:block">Email</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Rollen</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm hidden md:block"></th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($users as $user)
                <tr>
                    <td class="text-left py-3 px-4">
                        <div class="flex flex-col flex-wrap">
                            <a class="hover:text-blue-500 text-lg" href="{{-- route('user-show',$user->id) --}}">{{ $user->name }}</a>
                            <span class="text-xs italic hidden sm:block md:hidden">- {{ $user->email }}</span>
                        </div>
                    </td>
                    <td class="text-left py-3 px-4 hidden md:block">{{ $user->email }}</td>
                    <td class="text-left py-3 px-4">
                        @foreach ($user->roles as $role)
                            <span class="text-xs bg-green-500 py-2 px-1 mx-1 text-white">{{ $role->name }}</span>
                        @endforeach    
                    </td>
                    <td class="text-left py-3 px-4 hidden md:block">
                        <div class="flex flex-row">
                            <a href="{{ route('overlord-users-edit', [$user->id]) }}" class="text-sm text-yellow-600 hover:text-yellow-700 hover:underline">edit</a>
                        </div>
                    </td>
                </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>    
@endsection