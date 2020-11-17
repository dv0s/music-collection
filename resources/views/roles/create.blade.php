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
    <h1 class="text-2xl mb-6">Rol toevoegen</h1>

    <form method="POST" action="{{ route('overlord-role-store') }}" class="w-full flex flex-row flex-wrap">
        @csrf

        <div class="flex flex-col flex-wrap w-1/2">
            <div class="flex flex-col flex-wrap w-full">
                <x-form-input type="text" name="name" id="name" label="naam" :value="old('name')" required="true" />
            </div>
        </div>

        <div class="flex flex-col flex-wrap w-1/2">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="roles">
                    Toestemmingen
                </label>
                <select name="permissions[]" id="permissions" multiple="multiple" class="select2 w-full">
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
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