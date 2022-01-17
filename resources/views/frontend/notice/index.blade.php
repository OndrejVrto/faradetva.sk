@extends('frontend._layouts.page')

@section('title', 'Hľadať' )
@section('meta_description', 'Vyhľadávanie medzi čLánkami.' )
@section('content_header', 'Hľadaný výraz: XXX' )

{{-- @section('content_breadcrumb')
    {{ Breadcrumbs::render('article.show', $oneNews, $oneNews->title )}}
@stop --}}

@section('content')

<!-- blog section Start -->
<div class="section ch_blog_section">
    <div class="container">
        <div class="heading_section wh_headline">
            <h1>Farské oznamy</h1>
        </div>
        <div class="row mt-1">
            @dump($notice)
        </div>
        <div class="row mt-3">

        </div>
    </div>
</div>
<!-- blog section End -->

@endsection
