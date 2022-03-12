<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$breadCrumb"
        titleSlug="kalvaria"
        dimensionSource="full"
    />

    <x-frontend.sections.contact />
    <x-frontend.sections.map-google />

</x-frontend.layout.master>
