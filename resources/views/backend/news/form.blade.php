@php
    $controlerName = 'news';
    $columns = 12;
    $uploadFiles = 'true';

    $typeForm = $identificatorEdit = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $news ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $news->slug;
        $createdInfo = $news->createdInfo;
        $createdBy = $news->createdBy;
        $updatedInfo = $news->updatedInfo;
        $updatedBy = $news->updatedBy;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

    <input type="hidden" name="timezone" id="timezone">

    <div class="form-row">
        @include('backend.news.partials.active')
    </div>

    <div class="form-row">
        <div class="col-xl-6">
            @include('backend.news.partials.title')
        </div>
        <div class="col-md-6 col-xl-3">
            @include('backend.news.partials.published_at')
        </div>
        <div class="col-md-6 col-xl-3">
            @include('backend.news.partials.unpublished_at')
        </div>
    </div>

    <div class="form-row">
        <div class="col-xl-4 order-xl-2">
            @include('backend.news.partials.category_id')
            @include('backend.news.partials.tags')
            @include('backend.news.partials.news_picture')
        </div>
        <div class="col-xl-8 order-xl-1">
            @include('backend.news.partials.teaser')
            @include('backend.news.partials.content')
        </div>
    </div>

    @include('backend.news.partials.dropzone_attachment')

</x-admin-form>
