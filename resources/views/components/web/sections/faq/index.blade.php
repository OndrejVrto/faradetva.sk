<x-web.page.section
    name="FAQ"
    row="true"
    class="ch_pasters_section pad_t_50 pad_b_50"
>
    <x-web.page.section-header header="Otázky a odpovede" />

    <div class="row">
        @foreach ($faqs as $faq)
            <h5 class="text-church-template">{{ $faq['question'] }}</h5>
            <div class="text-church-template-blue">{!! $faq['answer'] !!}</div>
        @endforeach
    </div>
</x-web.page.section>
