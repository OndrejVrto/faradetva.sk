@props([
    'title'      => null,
    'icon'       => null,
    'url'        => '#',
    'delay'      => 1,
    'buttonText' => 'Čítať ďalej',
])

<div class="col-12 col-sm-6 col-lg-3 mb-4">
    <div class="about_box_inner mb-0 rotate wow h-100 d-flex flex-column" data-wow-delay="{{ $delay*0.3 }}s">
        <i class="{{ $icon }}"></i>

        <h4>
            <a href="{{ $url }}" class="link-template">
                {{ $title }}
            </a>
        </h4>

        <p>
            {{ $teaser }}
        </p>

        <a href="{{ $url }}" class="read_m_link mt-auto">
            {{ $buttonText }}
            <i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i>
        </a>

    </div>
</div>
