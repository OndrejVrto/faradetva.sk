<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$breadCrumb"
        titleSlug="vyzdoba-kostola-a-kaplnky, torta"
        dimensionSource="full"
    />

    <x-frontend.sections.notice typeNotice="Church" />
    <x-frontend.sections.notice typeNotice="Lecturer" />
    <x-frontend.sections.notice typeNotice="Acolyte" />

</x-frontend.layout.master>
