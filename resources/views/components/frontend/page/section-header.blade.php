@props([
    'header' => '',
])
<!-- HEADER SECTION page Start -->
    <div {{ $attributes->merge(['class' => 'heading_section wh_headline ']) }}>
        <h1>{{ $header }}</h1>
        {{ $slot }}
    </div>
<!-- HEADER SECTION page End -->
