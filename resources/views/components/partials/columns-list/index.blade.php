@props([
    'list',
])
<div class="container text-center">
    <ul class="list-unstyled card-columns">

        @forelse ($list as $listItem )

            <li>
                <dt class="text-church-secondary fs-6"><em>{!! $listItem['years'] !!}</em></dt>
                <dd class="mb-4"><span class="fw-bolder fs-5">{{ $listItem['name'] }}</span>
                    @if (isset($listItem['description']))
                        <br><em>{!! $listItem['description'] !!}</em>
                    @endif
                </dd>
            </li>

        @empty
            Zoznam je prázdny.
        @endforelse

    </ul>
</div>
