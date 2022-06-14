@props([
    'off_color'     => "danger",
    'on_color'      => "success",
    'default_state' => true,
    'value'         => null,
    'label',
    'name'
])
@php
    $error = "ERROR";
    $state = $value ? (bool) $value : (bool) $default_state;

    if (is_null($value)) {
        $value = customConfig('dashboard-checkbox', $name, $error);
        if ($value !== $error) {
            $state = (bool) $value;
        }
    }
@endphp

<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <input type="hidden" name="{{ $name }}" value="0">
    <input  type="checkbox"
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $state ? 'checked' : '' }}
            data-bootstrap-switch
            data-off-color="{{ $off_color }}"
            data-on-color="{{ $on_color }}"
    >

    <label for="{{ $name }}" class="ml-2 @if($value === $error)text-danger @endif">
        {{ $label }}
    </label>
</div>
