<div class="w-full px-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="{{ $id ?? $name }}">
        {{ $label ?? $name }}
    </label>
    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
            name="{{ $name }}" id="{{ $id ?? $name }}" type="{{ $type }}" value="{{ old($id) ?? $value }}" />
    <p class="text-gray-600 text-xs italic">{{ $helper ?? null }}</p>
</div>