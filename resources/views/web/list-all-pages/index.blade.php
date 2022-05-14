<x-web.layout.master>

    <x-web.page.section name="ALL PAGES" class="static-page pad_b_50 pad_t_50">

        <x-web.page.subsection>

            <x-web.page.text-segment animation="fromright" class="col-12 col-md-6 col-xl-4 m-auto">

                <ol>
                    <li><a href="{{ route('home') }}">Domovská stránka</a></li>
                    <li><a href="{{ route('article.all') }}">Články</a></li>
                    <li><a href="{{ route('faq') }}">Otázky a odpovede</a></li>

                    @foreach ($pages as $page)

                        <li>
                            <a href="{{ secure_url($page->url) }}" target="_blank">
                                {{ $page->title }}
                            </a>
                        </li>

                    @endforeach

                </ol>

            </x-web.page.text-segment>
        </x-web.page.subsection>

    </x-web.page.section>
</x-web.layout.master>
