@props([
    'type' => 'right',
    'columns' => 3,
    'name' => null,
    'title' => null,
    'collection' => 'picture',
    'model'
])
@php
    try {
        $data = $model->files->where('slug', $name)->first();
        $url = $data->getFirstMediaUrl($collection);
        $alt = $data->description;
        $source = $data->source;
        $author = $data->author;
    } catch (\Throwable $th) {
        $alt = 'Obrázok neexistuje!';
        $url = 'http://via.placeholder.com/300x150';
        $source = 'Obrázok neexistuje!';
        $author = null;
    }
// dd($data);
    $classes = 'position-relative mb-3 wow rounded-3 col-md-'.($columns-1).' col-lg-'.$columns.' ';
    $classes .= ($type == 'right') ? 'ms-sm-4 float-sm-end fromright' : 'me-sm-4 float-sm-start fromleft';
@endphp
<div class="{{ $classes }}">
    @if($source OR $author)
        <div class="img-article img-article-{{ $type }}">
            @isset($source)
                Zdroj:&nbsp;&nbsp;{{ $source }}
            @endisset
            @isset($author)
                &nbsp;&nbsp;Autor:&nbsp;&nbsp;{{ $author }}
            @endisset
        </div>
    @endif
    <img class="img-fluid"
        src="{{ $url }}"
        alt="{{ $alt }}"
        @isset($title)
            title="{{ $title }}"
        @endisset
    />
</div>
