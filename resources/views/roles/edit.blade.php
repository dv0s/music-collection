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
    <h1 class="text-2xl mb-6">Rol aanpassen</h1>

    <form method="POST" action="{{ route('overlord-role-update', [$role->id]) }}" class="w-full flex flex-row flex-wrap">
        @csrf
        @method('PUT')

        <div class="flex flex-col flex-wrap w-1/2">
            <div class="flex flex-col flex-wrap w-full">
                <x-form-input type="text" name="name" id="name" label="naam" :value="old('name') ?? $role->name" required="true" />
            </div>
        </div>

        <div class="flex flex-col flex-wrap w-1/2">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="roles">
                    Toestemmingen
                </label>
                @foreach ($permissions as $permission)
                <x-form-checkbox name="permissions[]" :label="$permission->name" :id="$permission->slug" :value="$permission->id" :is-checked="$role->permissions()->where('permission_id', $permission->id)->exists()"/>
                @endforeach
            </div>
        </div>
        <button type="submit" class="px-4 py-2 ml-3 mt-4 bg-blue-500 text-xs text-white uppercase bold">
            Save
        </button>
    </form>
</div>
@endsection