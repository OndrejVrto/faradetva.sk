@php
    $config_Sumernote = [
        'height' => '300',                 // set editor height
          'minHeight' => 'null',             // set minimum height of editor
          'maxHeight' => 'null',             // set maximum height of editor
          // 'focus' => 'true',                  // set focus to editable area after initializing summernote
        'toolbar' => [
            // [groupName, [list of button]]
            ['misc', ['undo','redo']],
            ['style', ['style','paragraph']],
            ['fontstyle', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol']],
            ['insert', ['link', 'hr']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
    ];
@endphp

<x-adminlte-text-editor
    name="content"
    id="Summernote"
    label="Obsah článku"
    placeholder="Text článku ..."
    :config="$config_Sumernote"
    >
    {{ $news->content ?? old('content') }}
</x-adminlte-text-editor>
