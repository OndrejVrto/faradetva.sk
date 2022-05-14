<x-web.layout.master :pageData="$pageData">

    {{-- Všetky oznamy --}}

    <x-web.page.section name="NOTICE" class="static-page pad_b_30">

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
