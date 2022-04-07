@section('title', 'Overenie mailu')
@section('description', 'Stránka po overení mailu pre odber noviniek.')
@section('keywords', 'novinky, články, správy, informácie, farnosť Detva, oznamy, odhlásenie odberu, subscription')

<x-frontend.layout.master>

    <x-frontend.sections.banner
        header="Overenie mailu"
    />

    <x-frontend.page.section name="INFO - Verification email" class="static-page pad_b_50">
        <x-frontend.page.subsection title="Ďakujeme {{ $subscriber->name }}">

            <p>Váš e-mail<span class="mx-2 link-template">{{ $subscriber->email }}</span> bol overený.</p>

        </x-frontend.page.subsection>
    </x-frontend.page.section>

</x-frontend.layout.master>
