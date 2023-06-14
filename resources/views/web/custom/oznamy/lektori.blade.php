<x-web.layout.master :pageData="$pageData">

    {{-- Rozpisy lektorov --}}

    <x-web.page.section name="NOTICE" class="static-page pad_b_30">

        <p>
            Zatiaľ túto stránku nepotrebujeme.
            Oznamy pre lektorov sa zverejňujú v&nbsp;rámci <a href="{{ secure_url('o-nas/pastoracia/lektori') }}">podstránky</a> o&nbsp;lektoroch.
        </p>

        <x-web.page.subsection title="Rozpisy lektorov">
            <x-web.sections.notice typeNotice="Lecturer" />
        </x-web.page.subsection>

    </x-web.page.section>
</x-web.layout.master>
