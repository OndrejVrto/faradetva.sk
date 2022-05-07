@props([
    'header' => null,
])
<!-- HEADER SECTION page Start -->
    <div {{ $attributes->merge(['class' => 'heading_section wh_headline']) }}>
        @isset($header)
            <h1>{{ $header }}</h1>
        @endisset
        {{ $slot }}
    </div>
<!-- HEADER SECTION page End -->
