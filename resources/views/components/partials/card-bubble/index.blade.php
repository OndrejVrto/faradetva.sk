@props([
    'title' => null,
    'url' => '#',
    'delay' => 1,
    'buttonText' => 'Čítať ďalej',
    'classColumns' => 'col-12 col-sm-6 col-lg-3 mb-4',
])

<div class="{{ $classColumns }}">
    <a href="{{ $url }}">
        <div {{ $attributes->merge(['class' => 'about_box_inner mb-0 rotate wow h-100 d-flex flex-column']) }} data-wow-delay="{{ $delay*0.3 }}s">
            {!! $icon !!}

            <h4 class="link-template">
                {!! $title !!}
            </h4>

            <p>
                {{ $teaser }}
            </p>

            <span class="read_m_link mt-auto">
                {{ $buttonText }}
                <i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i>
            </span>

        </div>
    </a>
</div>
