<x-web.layout.master :pageData="$pageData">

    {{-- Rozpisy akolytov --}}

    <x-web.page.section name="NOTICE" class="static-page pad_b_30">

        <p>
            Zatiaľ túto stránku nepotrebujeme.
            Oznamy pre akolytov sa zverejňujú v&nbsp;rámci <a href="{{ secure_url('o-nas/pastoracia/akolyti') }}">podstránky</a> o&nbsp;akolytoch.
        </p>

        <x-web.page.subsection title="Rozpisy akolytov">
            <x-web.sections.notice typeNotice="Acolyte" />
        </x-web.page.subsection>

    </x-web.page.section>
</x-web.layout.master>
