@section('title', 'Overenie mailu')
@section('description', 'Stránka po overení mailu pre odber noviniek.')
@section('keywords', 'novinky, články, správy, informácie, farnosť Detva, oznamy, odhlásenie odberu, subscription')

<x-web.layout.master>

    <x-web.sections.banner
        header="Overenie mailu"
    />

    <x-web.page.section name="INFO - Verification email" class="static-page pad_b_50">
        <x-web.page.subsection title="Ďakujeme {{ $subscriber->name }}">

            <p>Váš e-mail<span class="mx-2 link-template">{{ $subscriber->email }}</span> bol overený.</p>

        </x-web.page.subsection>
    </x-web.page.section>

</x-web.layout.master>
