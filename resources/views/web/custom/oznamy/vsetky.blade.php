<x-web.layout.master :pageData="$pageData">

    {{-- Všetky oznamy --}}

    <x-web.page.section name="NOTICE" class="static-page pad_b_30">
        <p>
            Zatiaľ túto stránku nepotrebujeme pretože časy konania svätých omší sa zverejňujú
            v <a href="{{ secure_url('duchovny-zivot/sviatosti') }}">oznamoch</a> na každý týždeň.
        </p>
        <p>
            Oznamy pre akolytov sa zverejňujú v rámci <a href="{{ secure_url('o-nas/pastoracia/akolyti') }}">podstránky</a> o akolytoch.
        </p>
        <p>
            Oznamy pre lektorov sa zverejňujú v rámci <a href="{{ secure_url('o-nas/pastoracia/lektori') }}">podstránky</a> o lektoroch.
        </p>

        <x-web.page.subsection title="Farské oznamy">
            <x-web.sections.notice typeNotice="Church" />
        </x-web.page.subsection>

        <x-web.page.subsection title="Rozpisy lektorov">
            <x-web.sections.notice typeNotice="Lecturer" />
        </x-web.page.subsection>

        <x-web.page.subsection title="Rozpisy akolytov">
            <x-web.sections.notice typeNotice="Acolyte" />
        </x-web.page.subsection>

    </x-web.page.section>
</x-web.layout.master>
