<x-web.layout.master :pageData="$pageData">

    {{-- Bárka --}}

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) -" row="true" class="static-page pad_b_50">

        <x-partials.video-embed
            urlVideo="https://www.youtube.com/watch?v=W4UE2y4APAE"
            :config="[
                'width' => 800,
                'class' => 'd-block mx-auto'
            ]"
        />

    </x-web.page.section>
</x-web.layout.master>
