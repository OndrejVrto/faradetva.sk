<x-web.page.section
    name="ABOUT_THIS_WEBSITE"
    row="true"
    class="ch_blog_section pad_t_80 pad_b_50"
    data-no-index="true"
>

    <x-web.page.section-header header="Spoznaj našu farnosť" />

    <x-partials.page-card countPages=6 />

    <div class="d-flex justify-content-center pad_t_30">
        <a href="{{ secure_url('prehlad-vsetkych-stranok') }}" class="link-template fs-5">
            Prehľad všetkých stránok
        </a>
    </div>

</x-web.page.section>
