<div>
    <select id="{{ $id }}" name="{{ $name }}" class="block mt-1 w-full">
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {{ $value == old($name, $selected) ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
