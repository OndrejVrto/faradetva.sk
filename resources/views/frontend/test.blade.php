@extends('frontend._layouts.static-page')
@push('content_header')
    {{-- Prepend content Header --}}
    <x-banner
        :header="$pageData['header']"
        :breadcrumb="$breadCrumb"
        titleSlug="vyzdoba-kostola-a-kaplnky, torta"
        dimensionSource="full"
    />
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')
    <x-page-section title="Rozpisy lektorov">
        <x-notice typeNotice="Lecturer"/>
    </x-page-section>

    <x-page-section title="Rozpisy akolytov">
        <x-notice typeNotice="Acolyte"/>
    </x-page-section>

    <x-page-section title="Farské oznamy">
        <x-notice typeNotice="Church"/>
    </x-page-section>

    {{-- <x-page-section.header :header="$pageData['header']" class="my-0"/> --}}

    <x-page-section>
        <x-picture titleSlug="cb" arrival="right" dimensionSource="small"/>
        <x-page-section.text type="right">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa voluptates asperiores quo quas illo ducimus autem error nam. Nulla incidunt veniam ratione ipsa expedita magni quibusdam repellat nobis iusto. Similique? Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero dolorum aspernatur laboriosam, quas laudantium quaerat consectetur dicta placeat ipsam delectus quae obcaecati. Assumenda, officia vitae. Ipsam doloribus fugit recusandae perferendis. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod voluptate corrupti molestiae earum nihil quasi porro dicta harum saepe, nisi, quibusdam adipisci quos fugit officia iste, itaque quidem quisquam dolore.
            </p>
        </x-page-section.text>
        <x-picture titleSlug="obr1" arrival="left" dimensionSource="medium"/>
        <x-page-section.text type="left">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. A suscipit id iste doloremque iusto rem cumque aliquam tenetur corrupti voluptatem. Soluta dignissimos, quos molestias tempora laborum maxime magnam error enim libero! Pariatur magni sunt iusto rerum exercitationem sapiente labore animi quas totam ad molestias tenetur, quo quod quam nemo a, maxime eos. Sequi deleniti maxime alias, beatae ullam fugit est perspiciatis modi repellendus veritatis quas illum aspernatur consectetur culpa quibusdam quae commodi molestias impedit, earum, blanditiis quisquam ipsa dolorum. Quo eligendi ipsa vero omnis sequi, inventore adipisci necessitatibus harum sint possimus, ipsam deleniti, at culpa illo. In velit, culpa ullam quaerat enim, iusto non earum eius esse porro, natus error aliquid corrupti dignissimos fugit officia aut qui illum placeat tempore quia soluta? Facilis ex illo fuga. Quaerat nihil possimus magni dolores vitae consectetur eaque ex natus voluptatum. Explicabo quasi, molestias voluptatum ipsum, aliquam quibusdam nihil natus nam iure numquam totam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia odit voluptatum sit dolore expedita distinctio optio eius veniam eaque quaerat. Asperiores repellat sunt minus. Repellat ea fuga non veniam excepturi aliquam illum, quidem distinctio quis est mollitia aspernatur ab consequatur dolorum rerum neque sequi odit.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-photo-gallery titleSlug="historia-farnosti-detva" dimensionSource="medium"/>

    <x-page-section title="Podnadpis sekcie">
        {{-- <x-page-section.img columns="4" type="right" alt="" url="{{ asset('images/only-for-debug/sv-francisco/Saint_Francis_of_Assisi_by_Jusepe_de_Ribera.jpg') }}" /> --}}
        <x-page-section.text type="left">
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe pariatur esse laboriosam cum eaque asperiores rerum natus ea perferendis, officia quia sequi culpa, eos nobis harum iure, dolores praesentium perspiciatis ipsam sunt corrupti fuga architecto. Architecto excepturi dignissimos ab eveniet nesciunt voluptas inventore ipsam similique fuga veniam sequi nobis nemo odit incidunt, consequuntur animi magni sed repellat nulla quaerat cupiditate eaque! Illum architecto illo at animi dolorem ut cupiditate voluptatibus dolores, incidunt mollitia itaque hic quidem repellat dignissimos debitis odio eum sint? Laudantium, ratione. Maiores officia eveniet doloribus minus accusamus molestias beatae doloremque suscipit, voluptatibus alias sit at. Esse, deserunt ab voluptatibus sed dolores aut tempore nemo alias. Natus deleniti accusantium est veritatis minima atque esse ullam nostrum recusandae voluptate. Vel iusto sapiente, omnis ut ad odit animi, nisi quae maiores, inventore optio tempore quos laborum accusamus deserunt illo sint odio illum. Voluptatibus deserunt blanditiis debitis autem ipsa quidem cumque accusamus possimus ducimus, odio dicta veniam officiis, voluptatem eius! Tempore quidem quod voluptatem! Praesentium dolore molestias consequuntur id veniam eius mollitia a! Tempora nulla sed perspiciatis porro velit ducimus, mollitia facilis qui aliquam! Quas aliquam rem cum praesentium consequatur omnis id, facere harum quaerat perspiciatis doloremque? Et unde voluptates necessitatibus.
            </p>
            {{-- <img class="img-fluid col-md-3 col-lg-2 mb-3 me-sm-4 float-sm-start rounded-3" src="{{ asset('images/only-for-debug/sv-francisco/11008.jpg') }}" alt=""> --}}
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae libero necessitatibus dolores provident perferendis voluptate praesentium dolorem sint modi! Numquam architecto, dicta porro saepe a harum alias quo, deserunt eveniet aperiam quam mollitia! Officia praesentium saepe, laudantium totam quaerat dolore sit nisi! Et assumenda fuga quos necessitatibus iure quibusdam, corrupti voluptas nostrum laboriosam nobis corporis magnam odit optio architecto ab eaque doloribus veritatis accusantium atque dicta? Magni at hic asperiores commodi fugiat neque nulla aliquam quisquam veniam fugit repudiandae animi tenetur assumenda officia perspiciatis, sed rerum nostrum reiciendis quo natus minima enim eos autem. Voluptatem, in qui molestiae adipisci est necessitatibus assumenda consectetur expedita, praesentium libero facilis, quia sequi culpa ipsam voluptatum? Amet distinctio, minus consequuntur animi, obcaecati quidem provident delectus ipsa incidunt corrupti laudantium vero necessitatibus dolor labore id nobis, quas aliquid! Quisquam explicabo, dolore amet recusandae exercitationem quasi magnam, ipsam mollitia sint, fuga neque nisi est voluptatem accusantium architecto consequuntur sequi eveniet aspernatur? Sint qui veniam, neque, labore repellat perspiciatis dignissimos quaerat sed quidem consectetur quod vel nesciunt aperiam modi exercitationem cupiditate illo! Quo dolorum ratione quis laudantium eveniet consequatur nesciunt esse incidunt.
            </p>
        </x-page-section.text>
    </x-page-section>
@endsection

