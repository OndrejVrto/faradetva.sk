<x-web.page.section
    name="ABOUT_THIS_WEBSITE"
    row="true"
    class="ch_blog_section pad_t_80 pad_b_50"
>

    <x-web.page.section-header header="Spoznaj našu farnosť" />

    <x-partials.page-card
        countPages=3
        {{-- TODO:  Remove this routeStaticPages tag in production --}}
        routeStaticPages="duchovny-zivot.sveteniny.ministeria, duchovny-zivot.sveteniny.putovanie, duchovny-zivot.sveteniny.index"
    />

</x-web.page.section>
