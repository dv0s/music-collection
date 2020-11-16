<div class="w-full px-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="{{ $id }}">
        {{ $label }}
    </label>
    <select name="roles[]" id="{{ $id }}" {!! $attributes->merge('class' => 'select2 w-full') !!} {{ $attributes }}>
        @foreach ($options as $opt)
            <option value="{{ $opt->id }}" {!! !$user->hasRole($role->slug) ?: 'selected' !!}>{{ $role->name }}</option>
        @endforeach
    </select>
</div>