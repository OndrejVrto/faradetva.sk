<x-web.layout.master>

    <x-web.sections.banner
        header="Otázky a odpovede"
        {{-- :breadcrumb="$pageData['breadCrumb']" --}}
        dimensionSource="full"
    />

    <x-web.page.section
        name="FAQ"
        row="true"
        class="blog_single_page pad_b_50"
    >

        @foreach ($faqs as $faq)
            <div class="mb-3">
                <h5 class="text-church-template">
                    {{ $faq['question'] }}
                </h5>
                <div class="mb-1 text-justify">
                    {!! $faq['answer'] !!}
                </div>

                <div class="d-flex align-items-end flex-wrap flex-lg-nowrap">
                    <ul class="tag-list mt-0">
                        <li>
                            <i class="fa-solid fa-hashtag"></i>
                        </li>
                        @forelse ($faq['pages'] as $page)
                            <li>
                                <a href="{{ $page['url'] }}">{{ $page['title'] }}</a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        @endforeach

    </x-web.page.section>

</x-web.layout.master>
