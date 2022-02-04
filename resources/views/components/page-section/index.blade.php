@props([
    'title' => null,
])
<div class="row mt-3 ch_about_desc w-auto">
    @isset($title)
        <h3 class="fromright wow" data-wow-delay="0.4s">{{ $title }}</h3>
    @endisset
    <div class="clearfix">
        {{ $slot }}
    </div>
</div>
