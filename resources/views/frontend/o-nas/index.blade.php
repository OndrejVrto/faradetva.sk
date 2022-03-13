<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_t_50 pad_b_50">

    <x-frontend.page.section-header :header="$pageData['header']" class="my-0"/>

    <div class="row text-left">
        <div class="col-lg-4 m-auto">

            <x-frontend.page.subsection title="O nás / História">
                <x-frontend.page.text-segment type="right">
                    <ol>
                        <li><a href="{{ url('o-nas/historia-farnosti') }}">História farnosti Detva</a></li>
                        <li class="pb-2"><a href="{{ url('o-nas/vianoce-v-detve') }}">Vianoce v Detve</a></li>
                        <span>Významné osobnosti</span>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/imrich-durica') }}">Imrich Ďurica</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/jozef-zavodsky') }}">Jozef Závodský</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/prof-thdr-jozef-buda') }}">prof. Jozef Búda</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/anton-prokop') }}">Anton Prokop</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/mons-jan-strban') }}">Mons. Ján Štrbáň</a></li>
                        <li class="pb-2"><a href="{{ url('o-nas/historia/vyznamne-osobnosti/karol-anton-medvecky') }}">Karol Anton Medvecký</a></li>
                        <span>Patrón farnosti</span>
                        <li><a href="{{ url('o-nas/patron-farnosti') }}">Svätý František</a></li>
                    </ol>
                </x-frontend.page.text-segment>
            </x-frontend.page.subsection>

        </div>
    </div>

    </x-frontend.page.section>
</x-frontend.layout.master>
