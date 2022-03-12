@props([
    'title' => null,
])
<div class="row text-muted ps-5 pt-5">
    @isset($title)
    <h5 class="fromright wow" data-wow-delay="0.2s">{{ $title }}</h5>
    @endisset
    <ul>
        {{ $slot }}
    </ul>
</div>
