<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.page.subsection title="Rozpisy lektorov">
        <x-frontend.sections.notice typeNotice="Lecturer" />
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Rozpisy akolytov">
        <x-frontend.sections.notice typeNotice="Acolyte" />
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Farské oznamy">
        <x-frontend.sections.notice typeNotice="Church" />
    </x-frontend.page.subsection>

</x-frontend.layout.master>
