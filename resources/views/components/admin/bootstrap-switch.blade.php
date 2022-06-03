@props([
    'label'     => null,
    'value'     => null,
    'off_color' => "danger",
    'on_color'  => "success",
    'name'
])
<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <input type="hidden" name="{{ $name }}" value="0">
    <input  type="checkbox"
            id="{{ $name }}"
            name="{{ $name }}"
            {{-- value="{{ $value }}" --}}
            {{-- checked --}}
            {{ $value === "1" ? 'checked' : '' }}
            {{-- {{ (( $value ?? (old($name) === "0" ? 0 : 1) ) OR old($name, 0) === 1) ? 'checked' : '' }} --}}
            data-bootstrap-switch
            data-off-color="{{ $off_color }}"
            data-on-color="{{ $on_color }}"
    >
    @isset($label)
        <label for="{{ $name }}" class="ml-2">{{ $label }}</label>
    @endisset
</div>


