<x-web.layout.master :pageData="$pageData">

    {{-- Farské oznamy --}}
    <x-web.sections.notice typeNotice="Church" />

    <div class="section bg-alt-gray">
        <x-web.sections.about-website />
    </div>

    <x-web.sections.last-article :count="2"/>

</x-web.layout.master>
