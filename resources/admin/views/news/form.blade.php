@php
	$config_Sumernote = [
		'height' => '250',                 // set editor height
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

	$config_select = [
		"placeholder" => " Vyber niekoľko slov popisujúcich obsah ...",
		"allowClear" => 'true',
	];
@endphp

<div class="row">
	<div class="col-12 m-auto">
		<div class="card push-top">
			<div class="card-body">

				@if ( $type == 'edit')
					<form id="edit-form" method="post" action="{{ route('news.update', $news->id) }}">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('news.store') }}">
				@endif

					@csrf

					<div class="row">
						<div class="col-lg-6">
							<x-adminlte-input name="title" label="Titulok článku" placeholder="Názov ..." value="{{ $news->title ?? old('title') }}" />
						</div>
						<div class="col-lg-6">
							<x-adminlte-select2 name="category_id" label="Kategória článku" data-placeholder="Vyber kategóriu ...">
								<x-slot name="prependSlot">
									<div class="input-group-text bg-gradient-red">
										<i class="fas fa-stream"></i>
									</div>
								</x-slot>
								<option/>
								@if ($categories->count())

								@foreach($categories as $category)
									<option value="{{ $category->id }}"
										@if( $category->id == ($news->category_id ?? '') OR $category->id == old('category_id'))
											selected
										@endif
										>
										{{ $category->title }}
									</option>
								@endforeach

								@endif
							</x-adminlte-select2>
						</div>
					</div>
					<diw class="row">
						<div class="col-12">
							<x-adminlte-text-editor id="Summernote" name="content" label="Obsah článku" placeholder="Text článku ..." :config="$config_Sumernote">
								{{ $news->content ?? old('content') }}
							</x-adminlte-text-editor>
						</div>
					</diw>
					<div class="row">
						<div class="col-12">
							{{-- With multiple slots, and plugin config parameter --}}
							<x-adminlte-select2 id="sel2Tag" name="tags[]" label="Kľúčové slová" :config="$config_select" multiple>
								<x-slot name="prependSlot">
									<div class="input-group-text bg-gradient-red">
										<i class="fas fa-tag"></i>
									</div>
								</x-slot>

								@if ($tags->count())

								@foreach($tags as $tag)
									<option value="{{ $tag->id }}"
										@if( in_array($tag->id, old("tags") ?: []) OR in_array($tag->id, $selectedTags) )
											selected
										@endif
										>
										{{ $tag->title }}
									</option>
								@endforeach

								@endif
							</x-adminlte-select2>
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
