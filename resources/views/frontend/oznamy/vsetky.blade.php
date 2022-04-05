<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.page.section name="NOTICE" class="static-page pad_b_30">

        <x-frontend.page.subsection title="Rozpisy lektorov">
            <x-frontend.sections.notice typeNotice="Lecturer" />
        </x-frontend.page.subsection>

        <x-frontend.page.subsection title="Rozpisy akolytov">
            <x-frontend.sections.notice typeNotice="Acolyte" />
        </x-frontend.page.subsection>

        <x-frontend.page.subsection title="Farské oznamy">
            <x-frontend.sections.notice typeNotice="Church" />
        </x-frontend.page.subsection>

    </x-frontend.page.section>
</x-frontend.layout.master>
