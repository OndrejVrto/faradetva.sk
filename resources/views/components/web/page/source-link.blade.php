@props([
    'href',
    'name' => null,
    'notice' => null,
    'date' => null,
])
<li>
    @isset($name)
        {!! $name !!}
    @endisset
    <em class="me-1">{!! $slot !!}</em>
    [online].
    @isset($notice)
        {!! $notice !!}
    @endisset
    @isset($date)
        [cit. {{ $date }}].
    @endisset
    <a class="link-template"
        target="_blank"
        rel="external noopener noreferrer"
        href="{!! $href !!}">
        Dostupné na internete
    </a>
</li>
