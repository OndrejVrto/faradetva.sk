<span {{ $attributes->merge(['class' => 'invalid-feedback d-flex align-items-center']) }} role="alert">
    <svg role="img" height="16" width="16" aria-label="Error:" viewBox="0 0 16 16" class="curent-color">
        <path d="M0 8a8 8 0 1116 0A8 8 0 010 8zm7.25-5v7h1.5V3h-1.5zm0 8.526v1.5h1.5v-1.5h-1.5z"></path>
    </svg>
    <strong class="ml-1 me-1">{{ $slot }}</strong>
</span>
