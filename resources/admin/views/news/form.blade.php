@section('plugins.Summernote', true)
@php
	$config_Sumernote = [
		"height" => "100",
		"toolbar" => [
			// [groupName, [list of button]]
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['table', ['table']],
			['insert', ['link', 'picture', 'video']],
			['view', ['fullscreen', 'codeview', 'help']],
		],
	]
@endphp

<div class="row pt-xl-5">
	<div class="col-12 m-auto">
		<div class="card push-top">
			<div class="card-body">

				@if ( $type == 'edit')
					<form method="post" action="{{ route('news.update', $news->id) }}">
					@method('PATCH')
				@else
					<form method="post" action="{{ route('news.store') }}">
				@endif

					@csrf

					<div class="row">
						<div class="col-lg-9">
							<x-adminlte-input name="title" label="Titulok článku" placeholder="Názov ..." value="{{ $news->title ?? '' }}" />

							<x-adminlte-text-editor id="SummerNoreNews" name="content" label="Obsah článku" igroup-size="sm" placeholder="Text článku ..." :config="$config_Sumernote">
								{{ $news->content ?? '' }}
							</x-adminlte-text-editor>
						</div>

						<div class="col-lg-3">
							{{-- <x-form-select name="category_id" label="Kategória článku" :options="$categories" />

							<x-form-group label="Tagy" inline>
							@foreach ( $tags as $tag )
								<x-form-checkbox class="mr-3" :value="$tag->id" name="tags[]" :label="$tag->title" :id="$tag->id"/>
							@endforeach
							</x-form-group> --}}

							{{-- <x-form-select name="tags_id" multiple label="Tagy" :options="$tags" /> --}}
						</div>
					</div>


					<div class="row px-5">
						<div class="col-8">
							<x-adminlte-button class="btn-flat btn-block" type="submit" label="{{ $button_text }}" theme="success" icon="fas fa-lg fa-save mr-2"/>
						</div>
						<div class="col-4">
							<a href="{{ route('news.index') }}" class="btn btn-outline-secondary btn-flat btn-block">Späť</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
