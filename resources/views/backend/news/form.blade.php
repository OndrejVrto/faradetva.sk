@php
    $controlerName = 'news';
    $columns = 12;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = $source = null;
    if ( isset( $news ) ) {
        $typeForm = 'edit';
        $identificator = $news->slug;
        $createdInfo = $news->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $news->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $news->getFirstMedia($news->collectionName) ?? '';
        $source = $news->source;
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
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
            @include('backend.news.partials.teaser')
            @include('backend.news.partials.category_id')
            @include('backend.news.partials.tags')
            @include('backend.news.partials.dropzone_attachment')
        </div>
        <div class="col-xl-8 order-xl-1">
            @include('backend.news.partials.content')
        </div>
    </div>

    <hr class="bg-orange">

    <div class="form-row">
        <div class="col-xl-4">
            <x-backend.form.crop label="Hlavný obrázok na titulku" minWidth="848" minHeight="460" maxSize="1920*1440" :media_file_name="$media_file_name" />
        </div>
        <div class="col-xl-8">
            <x-backend.form.source :source="$source" />
        </div>
    </div>

</x-backend.form>
