@props([
    'years',
    'name',
    'description' => null,
])
<li>
    <dt class="text-church-secondary fs-6"><em>{!! $years !!}</em></dt>
    <dd class="mb-4"><span class="fw-bolder fs-5">{{ $name }}</span>
        @if (isset($description))
            <br><em>{!! $description !!}</em>
        @endif
    </dd>
</li>
