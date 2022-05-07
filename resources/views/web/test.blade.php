<x-web.layout.master :pageData="$pageData">

    @include('web.icons')

    <x-web.page.section name="PICTURE" class="static-page pad_b_50">

        <x-partials.picture titleSlug="cb" side="left" animation="fromleft" dimensionSource="medium" />
        <x-web.page.text-segment animation="fromleft">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. A suscipit id iste doloremque iusto rem cumque aliquam tenetur corrupti voluptatem. Soluta dignissimos, quos molestias tempora laborum maxime magnam error enim libero! Pariatur magni sunt iusto rerum exercitationem sapiente labore animi quas totam ad molestias tenetur, quo quod quam nemo a, maxime eos. Sequi deleniti maxime alias, beatae ullam fugit est perspiciatis modi repellendus veritatis quas illum aspernatur consectetur culpa quibusdam quae commodi molestias impedit, earum, blanditiis quisquam ipsa dolorum. Quo eligendi ipsa vero omnis sequi, inventore adipisci necessitatibus harum sint possimus, ipsam deleniti, at culpa illo. In velit, culpa ullam quaerat enim, iusto non earum eius esse porro, natus error aliquid corrupti dignissimos fugit officia aut qui illum placeat tempore quia soluta? Facilis ex illo fuga. Quaerat nihil possimus magni dolores vitae consectetur eaque ex natus voluptatum. Explicabo quasi, molestias voluptatum ipsum, aliquam quibusdam nihil natus nam iure numquam totam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia odit voluptatum sit dolore expedita distinctio optio eius veniam eaque quaerat. Asperiores repellat sunt minus. Repellat ea fuga non veniam excepturi aliquam illum, quidem distinctio quis est mollitia aspernatur ab consequatur dolorum rerum neque sequi odit.
            </p>
        </x-web.page.text-segment>
        {{-- <x-partials.picture titleSlug="obr1" side="right" animation="sonarEffect" dimensionSource="medium" data-wow-delay="0.3s" class="mt-1"/> --}}
        <x-partials.picture titleSlug="obr1" side="right" animation="fromright" dimensionSource="medium" data-wow-delay="0.3s"/>
        <x-web.page.text-segment animation="fromleft">
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe pariatur esse laboriosam cum eaque asperiores rerum natus ea perferendis, officia quia sequi culpa, eos nobis harum iure, dolores praesentium perspiciatis ipsam sunt corrupti fuga architecto. Architecto excepturi dignissimos ab eveniet nesciunt voluptas inventore ipsam similique fuga veniam sequi nobis nemo odit incidunt, consequuntur animi magni sed repellat nulla quaerat cupiditate eaque! Illum architecto illo at animi dolorem ut cupiditate voluptatibus dolores, incidunt mollitia itaque hic quidem repellat dignissimos debitis odio eum sint? Laudantium, ratione. Maiores officia eveniet doloribus minus accusamus molestias beatae doloremque suscipit, voluptatibus alias sit at. Esse, deserunt ab voluptatibus sed dolores aut tempore nemo alias. Natus deleniti accusantium est veritatis minima atque esse ullam nostrum recusandae voluptate. Vel iusto sapiente, omnis ut ad odit animi, nisi quae maiores, inventore optio tempore quos laborum accusamus deserunt illo sint odio illum. Voluptatibus deserunt blanditiis debitis autem ipsa quidem cumque accusamus possimus ducimus, odio dicta veniam officiis, voluptatem eius! Tempore quidem quod voluptatem! Praesentium dolore molestias consequuntur id veniam eius mollitia a! Tempora nulla sed perspiciatis porro velit ducimus, mollitia facilis qui aliquam! Quas aliquam rem cum praesentium consequatur omnis id, facere harum quaerat perspiciatis doloremque? Et unde voluptates necessitatibus.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae libero necessitatibus dolores provident perferendis voluptate praesentium dolorem sint modi! Numquam architecto, dicta porro saepe a harum alias quo, deserunt eveniet aperiam quam mollitia! Officia praesentium saepe, laudantium totam quaerat dolore sit nisi! Et assumenda fuga quos necessitatibus iure quibusdam, corrupti voluptas nostrum laboriosam nobis corporis magnam odit optio architecto ab eaque doloribus veritatis accusantium atque dicta? Magni at hic asperiores commodi fugiat neque nulla aliquam quisquam veniam fugit repudiandae animi tenetur assumenda officia perspiciatis, sed rerum nostrum reiciendis quo natus minima enim eos autem. Voluptatem, in qui molestiae adipisci est necessitatibus assumenda consectetur expedita, praesentium libero facilis, quia sequi culpa ipsam voluptatum? Amet distinctio, minus consequuntur animi, obcaecati quidem provident delectus ipsa incidunt corrupti laudantium vero necessitatibus dolor labore id nobis, quas aliquid! Quisquam explicabo, dolore amet recusandae exercitationem quasi magnam, ipsam mollitia sint, fuga neque nisi est voluptatem accusantium architecto consequuntur sequi eveniet aspernatur? Sint qui veniam, neque, labore repellat perspiciatis dignissimos quaerat sed quidem consectetur quod vel nesciunt aperiam modi exercitationem cupiditate illo! Quo dolorum ratione quis laudantium eveniet consequatur nesciunt esse incidunt.
            </p>
        </x-web.page.text-segment>
        {{-- <x-partials.picture titleSlug="cb" side="left" animation="fromleft" dimensionSource="medium"/> --}}
        {{-- <x-partials.picture titleSlug="obr1" side="right" animation="sonarEffect" dimensionSource="medium" data-wow-delay="0.3s" class="pt-5 mt-5"/> --}}
    </x-web.page.section>

    {{-- <x-web.page.section name="SUBSCRIBE" class="ch_skills_section pad_t_50 pad_b_50">
        <x-web.page.section-header header="Odoberať rozpisy akolytov" class="mb-3"/>
        @livewire('subscribe-form', ['modelName' => 'NoticeAcolyte', 'section' => true])
    </x-web.page.section> --}}

    <x-web.page.section name="IMPORTANT PERSONALITIES" class="ch_ministry_section pad_t_50">

        {{-- <x-web.page.section-header header="Významné osobnosti farnosti" />

        <x-partials.page-card routeStaticPages="
            o-nas.pastoracia.akolyti,
            o-nas.historia.imrich-durica,
            o-nas.historia.jozef-zavodsky,
            o-nas.historia.karol-anton-medvecky,
            o-nas.historia.jan-strban,
            o-nas.historia.jozef-buda
        "/>

        <x-web.page.section-header header="Pastorácia" />

        <x-partials.page-card routeStaticPages="
            o-nas.pastoracia.akolyti,
            o-nas.pastoracia.farari-v-detve,
            o-nas.pastoracia.farska-rada,
            o-nas.pastoracia.kaplani-v-detve,
            o-nas.pastoracia.kostolnici,
            o-nas.pastoracia.lektori,
            o-nas.pastoracia.ministranti,
            o-nas.pastoracia.organisti-spevaci,
            o-nas.pastoracia.spevokoly-a-dychovka,
            o-nas.pastoracia.vyucovanie-nabozenstva,
        "/> --}}

    </x-web.page.section>

    <x-web.page.section name="SUBSCRIBE 2" class="ch_skills_section pad_t_50 pad_b_50">

        <x-web.page.section-header header="Odoberať novinky" class="mb-3"/>

        {{-- <x-web.page.subsection title="Články">
            @livewire('subscribe-form', ['modelName' => 'News', 'section' => true])
        </x-web.page.subsection>

        <x-web.page.subsection title="Farské oznamy">
            @livewire('subscribe-form', ['modelName' => 'NoticeChurch', 'section' => true])
        </x-web.page.subsection>

        <x-web.page.subsection title="Rozpisy akolytov">
            @livewire('subscribe-form', ['modelName' => 'NoticeAcolyte', 'section' => true])
        </x-web.page.subsection>

        <x-web.page.subsection title="Rozpisy lektorov">
            @livewire('subscribe-form', ['modelName' => 'NoticeLecturer', 'section' => true])
        </x-web.page.subsection> --}}

    </x-web.page.section>


    <x-web.page.section name="GRAPHS" row="true" class="ch_about_section pad_t_50">

        <x-web.page.section-header header="Štatistiky" />

        <x-partials.statistics-graph names="
            krsty,
            {{-- prve-svate-prijimanie,
            birmovanie,
            sobase,
            pohreby,
            scitanie-obyvatelov-detvy,
            scitanie-rimsko-katolikov-v-meste-detva --}}
        "/>
    </x-web.page.section>

    <x-web.sections.pray />

    <x-web.sections.skills />

    <x-web.page.section name="PAGE: ({{$pageData['title']}} - Texty) -" class="static-page pad_t_50">

        <x-web.page.section-header header="Texty a prílohy" />

        <x-web.page.subsection title="Lorem ipsum dolor et my">
            {{-- <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="small"/> --}}
            <x-web.page.text-segment animation="fromright">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa voluptates asperiores quo quas illo ducimus autem error nam. Nulla incidunt veniam ratione ipsa expedita magni quibusdam repellat nobis iusto. Similique? Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero dolorum aspernatur laboriosam, quas laudantium quaerat consectetur dicta placeat ipsam delectus quae obcaecati. Assumenda, officia vitae. Ipsam doloribus fugit recusandae perferendis. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod voluptate corrupti molestiae earum nihil quasi porro dicta harum saepe, nisi, quibusdam adipisci quos fugit officia iste, itaque quidem quisquam dolore.
                </p>
            </x-web.page.text-segment>

            {{-- <x-partials.picture titleSlug="cb" side="left" animation="fromleft" dimensionSource="medium"/> --}}
            {{-- <x-partials.picture titleSlug="obr1" side="right" animation="sonarEffect" dimensionSource="medium" data-wow-delay="0.3s" class="pt-5 mt-5"/> --}}
{{--
            <x-web.page.text-segment animation="fromleft">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. A suscipit id iste doloremque iusto rem cumque aliquam tenetur corrupti voluptatem. Soluta dignissimos, quos molestias tempora laborum maxime magnam error enim libero! Pariatur magni sunt iusto rerum exercitationem sapiente labore animi quas totam ad molestias tenetur, quo quod quam nemo a, maxime eos. Sequi deleniti maxime alias, beatae ullam fugit est perspiciatis modi repellendus veritatis quas illum aspernatur consectetur culpa quibusdam quae commodi molestias impedit, earum, blanditiis quisquam ipsa dolorum. Quo eligendi ipsa vero omnis sequi, inventore adipisci necessitatibus harum sint possimus, ipsam deleniti, at culpa illo. In velit, culpa ullam quaerat enim, iusto non earum eius esse porro, natus error aliquid corrupti dignissimos fugit officia aut qui illum placeat tempore quia soluta? Facilis ex illo fuga. Quaerat nihil possimus magni dolores vitae consectetur eaque ex natus voluptatum. Explicabo quasi, molestias voluptatum ipsum, aliquam quibusdam nihil natus nam iure numquam totam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia odit voluptatum sit dolore expedita distinctio optio eius veniam eaque quaerat. Asperiores repellat sunt minus. Repellat ea fuga non veniam excepturi aliquam illum, quidem distinctio quis est mollitia aspernatur ab consequatur dolorum rerum neque sequi odit.
                </p>
            </x-web.page.text-segment> --}}
        </x-web.page.subsection>

        <x-web.page.subsection title="Prílohy" icon="fas fa-paperclip me-3">
            <x-partials.attachment nameSlugs="
                excel-stary,
                obrazok-gif,
                gimp,
                zip"
            />
        </x-web.page.subsection>

    </x-web.page.section>

    <x-web.page.section name="MINISTIES" class="ch_ministry_section pad_t_50">

        <x-web.page.section-header header="Spoločenstvá"/>

        {{-- <x-partials.page-card routeStaticPages="
            spolocenstva.frantiskansky-svetstky-rad,
            spolocenstva.marianske-veceradlo,
            spolocenstva.rad-bosych-karmelitanok,
            spolocenstva.ruzencove-bratstvo,
            spolocenstva.svetsky-rad-bosych-karmelitanov,
            spolocenstva.zdruzenie-salezianskych-spolupracovnikov,
            spolocenstva.hnutie-krestanskych-rodin,
            spolocenstva.katolicka-charizmaticka-obnova,
            spolocenstva.sluzobnici-jezisovho-velknazskeho-srdca,
        " /> --}}

    </x-web.page.section>

    <x-web.page.section name="ALBUM" class="static-page pad_t_30 pad_b_10">

        {{-- <x-partials.photo-gallery titleSlug="testovacia" dimensionSource="medium"/> --}}

        <x-partials.photo-gallery titleSlug="historia-farnosti-detva" dimensionSource="medium"/>

        <x-web.page.subsection title="Podnadpis sekcie">

            {{-- <x-partials.picture titleSlug="obr1" side="right" animation="sonarEffect" dimensionSource="medium" data-wow-delay="0.3s" class="pt-5 mt-5"/> --}}

            <x-web.page.text-segment animation="fromleft">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe pariatur esse laboriosam cum eaque asperiores rerum natus ea perferendis, officia quia sequi culpa, eos nobis harum iure, dolores praesentium perspiciatis ipsam sunt corrupti fuga architecto. Architecto excepturi dignissimos ab eveniet nesciunt voluptas inventore ipsam similique fuga veniam sequi nobis nemo odit incidunt, consequuntur animi magni sed repellat nulla quaerat cupiditate eaque! Illum architecto illo at animi dolorem ut cupiditate voluptatibus dolores, incidunt mollitia itaque hic quidem repellat dignissimos debitis odio eum sint? Laudantium, ratione. Maiores officia eveniet doloribus minus accusamus molestias beatae doloremque suscipit, voluptatibus alias sit at. Esse, deserunt ab voluptatibus sed dolores aut tempore nemo alias. Natus deleniti accusantium est veritatis minima atque esse ullam nostrum recusandae voluptate. Vel iusto sapiente, omnis ut ad odit animi, nisi quae maiores, inventore optio tempore quos laborum accusamus deserunt illo sint odio illum. Voluptatibus deserunt blanditiis debitis autem ipsa quidem cumque accusamus possimus ducimus, odio dicta veniam officiis, voluptatem eius! Tempore quidem quod voluptatem! Praesentium dolore molestias consequuntur id veniam eius mollitia a! Tempora nulla sed perspiciatis porro velit ducimus, mollitia facilis qui aliquam! Quas aliquam rem cum praesentium consequatur omnis id, facere harum quaerat perspiciatis doloremque? Et unde voluptates necessitatibus.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae libero necessitatibus dolores provident perferendis voluptate praesentium dolorem sint modi! Numquam architecto, dicta porro saepe a harum alias quo, deserunt eveniet aperiam quam mollitia! Officia praesentium saepe, laudantium totam quaerat dolore sit nisi! Et assumenda fuga quos necessitatibus iure quibusdam, corrupti voluptas nostrum laboriosam nobis corporis magnam odit optio architecto ab eaque doloribus veritatis accusantium atque dicta? Magni at hic asperiores commodi fugiat neque nulla aliquam quisquam veniam fugit repudiandae animi tenetur assumenda officia perspiciatis, sed rerum nostrum reiciendis quo natus minima enim eos autem. Voluptatem, in qui molestiae adipisci est necessitatibus assumenda consectetur expedita, praesentium libero facilis, quia sequi culpa ipsam voluptatum? Amet distinctio, minus consequuntur animi, obcaecati quidem provident delectus ipsa incidunt corrupti laudantium vero necessitatibus dolor labore id nobis, quas aliquid! Quisquam explicabo, dolore amet recusandae exercitationem quasi magnam, ipsam mollitia sint, fuga neque nisi est voluptatem accusantium architecto consequuntur sequi eveniet aspernatur? Sint qui veniam, neque, labore repellat perspiciatis dignissimos quaerat sed quidem consectetur quod vel nesciunt aperiam modi exercitationem cupiditate illo! Quo dolorum ratione quis laudantium eveniet consequatur nesciunt esse incidunt.
                </p>
            </x-web.page.text-segment>
        </x-web.page.subsection>

    </x-web.page.section>

</x-web.layout.master>
