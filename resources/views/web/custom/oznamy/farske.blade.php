<x-web.layout.master :pageData="$pageData">

    {{-- Farské oznamy --}}
    <x-web.sections.notice typeNotice="Church" />

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II -" row="true" class="bg-alt-gray pad_t_80 pad_b_50">

        <x-partials.card-bubble
            title="Rozpis lektorov"
            class="bg-white"
            classColumns="col-12 col-sm-6 col-lg-4 mb-4"
            buttonText="Zobraziť"
            delay=1
            url="{{ secure_url('o-nas/pastoracia/lektori#rozpis') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="logo-lektorska-sluzba" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Rozpis lektorov vo farskom kostole počas aktuálnych dvoch týždňov.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Rozpis akolytov"
            class="bg-white"
            classColumns="col-12 col-sm-6 col-lg-4 mb-4"
            buttonText="Zobraziť"
            delay=2
            url="{{ secure_url('o-nas/pastoracia/akolyti#rozpis') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="logo-akolyta" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Rozpis služieb akolytov vo farskom kostole na aktuálne dva týždne.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Príprava snúbencov"
            class="bg-white"
            classColumns="col-12 col-sm-6 col-lg-4 mb-4"
            buttonText="Zobraziť"
            delay=3
            url="{{ secure_url('duchovny-zivot/sviatosti/manzelstvo#rozpis') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="logo-snubenci" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Prednášky v&nbsp;rámci blízkej prípravy na prijatie manželstva v dekanáte Detva.
            </x-slot:teaser>
        </x-partials.card-bubble>

    </x-web.page.section>

    <x-web.sections.last-article :count="2"/>

    <div class="section bg-alt-gray">
        <x-web.sections.about-website />
    </div>


</x-web.layout.master>
