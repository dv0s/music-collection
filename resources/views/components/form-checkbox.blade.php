<div class="flex flex-row flex-wrap">
    <label for="{{ $id }}" class="flex flex-row flow-wrap mb-2">
        <input type="checkbox" name="{{ $name }}" id="{{ $id }}" class="mr-3 mt-1" value={{ $value }} {{ !$isChecked ?: 'checked' }}>
        <span class="text-gray-800">{{ $label }}</span>
    </label>
</div>