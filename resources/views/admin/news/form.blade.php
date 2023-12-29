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

<x-admin.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-row">
        <div class="col-xl-5 order-xl-2">
            <input type="hidden" name="timezone" id="timezone">

            <div class="form-row justify-center items-center pl-4 mt-4">
                @include('admin.news.partials.active')
            </div>

            @include('admin.news.partials.title')


            @include('admin.news.partials.category_id')
            @include('admin.news.partials.tags')
            @include('admin.news.partials.teaser')

            <div class="form-row">
                <div class="col-md-6">
                    @include('admin.news.partials.published_at')
                </div>
                <div class="col-md-6">
                    @include('admin.news.partials.unpublished_at')
                </div>
            </div>

            @include('admin.news.partials.dropzones')
        </div>

        <div class="col-xl-7 order-xl-1">
            @include('admin.news.partials.content')
        </div>
    </div>

    <hr class="bg-orange">

    <div class="form-row">
        <div class="col-xl-4">
            <x-admin.form.crop label="Hlavný obrázok na titulku" minWidth="848" minHeight="460" maxSize="1920*1440" :media_file_name="$media_file_name" />
        </div>
        <div class="col-xl-8">
            <x-admin.form.source :source="$source" />
        </div>
    </div>

</x-admin.form>
