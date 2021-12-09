<li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-header pb-0 pt-3 {{ $item['class'] ?? '' }}">

    {{ is_string($item) ? $item : $item['header'] }}

</li>
