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
<div class="w-full flex flex-col flex-wrap">
    <h1 class="text-2xl mb-6">Gebruiker toevogen</h1>

    <form method="POST" action="{{ route('overlord-users-store') }}" class="w-full flex flex-row flex-wrap">
        @csrf

        <div class="flex flex-col flex-wrap w-1/2">
            <div class="flex flex-col flex-wrap w-full">
                <x-form-input type="text" name="name" id="name" label="naam" :value="old('name')" required="true" />
                <x-form-input name="email" type="email" label="e-mailadres" :value="old('email')" id="email" required="true" />
                <x-form-input name="password" type="password" label="wachtwoord" :value="old('password')" id="password" required="true" />
                <x-form-input name="password_confirmation" type="password" label="bevestig wachtwoord" :value="old('password_confirmation')" id="password_confirmation" required="true" />

            </div>
        </div>

        <div class="flex flex-col flex-wrap w-1/2">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="roles">
                    Rollen
                </label>
                <select name="roles[]" id="roles" multiple="multiple" class="select2 w-full">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="px-4 py-2 ml-3 mt-4 bg-blue-500 text-xs text-white uppercase bold">
            Save
        </button>
    </form>
</div>
@endsection