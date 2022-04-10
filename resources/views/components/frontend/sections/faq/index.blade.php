<x-frontend.page.section
    name="FAQ"
    row="true"
    class="ch_pasters_section pad_t_50 pad_b_50"
>
    <x-frontend.page.section-header header="Otázky a odpovede" />

    <div class="row">
        @foreach ($faqs as $faq)
            <h5 class="text-church-template">{{ $faq['question'] }}</h5>
            <p class="text-church-template-blue">{!! $faq['answer'] !!}</p>
        @endforeach
    </div>
</x-frontend.page.section>
