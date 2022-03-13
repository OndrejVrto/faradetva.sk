<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.sections.contact />

    <x-frontend.sections.map-google />

</x-frontend.layout.master>
