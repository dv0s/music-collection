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
    <div class="flex flex-col flex-wrap">
        <h1 class="text-2xl mb-6">{{ $user->name }} aanpassen</h1>
        <form method="POST" action="{{ route('overlord-users-update', [$user->id]) }}">
            @csrf
            @method('PUT')

            <x-form-input type="text" name="name" id="first_name" label="naam" :value="old('name') ?? $user->name" required="true" />

            <x-form-input name="email" type="email" label="e-mailadres" :value="old('email') ?? $user->email" id="email" helper="" />
            <x-form-select name="roles[]" label="rollen" :options="$roles" id="roles" helper="" />

            <button type="submit" class="px-4 py-2 bg-blue-500 text-xs text-white uppercase">Save</button>
        </form>
    </div>
@endsection