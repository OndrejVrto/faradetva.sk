<x-web.page.section
    name="BANER"
    class="static-page pad_t_30"
>
    @isset($header)
        <div class="heading_section wh_headline my-0">
            <h1 class="mb-0">{{ $header }}</h1>
        </div>
    @endisset
</x-web.page.section>
