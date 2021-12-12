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
					<form id="edit-form" method="post" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
				@endif

					@csrf

					<div class="row">

						<div class="col-xl-4 order-xl-2">
							<x-adminlte-input name="title" label="Titulok článku" placeholder="Nadpis článku ..." value="{{ $news->title ?? old('title') }}" >
								<x-slot name="prependSlot">
									<div class="input-group-text bg-gradient-red">
										<i class="fas fa-font"></i>
						</div>
								</x-slot>
							</x-adminlte-input>

							<x-adminlte-select2 name="category_id" label="Kategória článku" data-placeholder="Vyber kategóriu článku ...">
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

							{{-- TODO: Na miesto placeholder vložiť názov súborov z databazy --}}
							<x-adminlte-input-file id="file_news" name="file_news[]" label="Prílohy článku" placeholder="Vlož prílohy článku ...">
								<x-slot name="prependSlot">
									<div class="input-group-text bg-gradient-red">
										<i class="fas fa-file-import"></i>
						</div>
								</x-slot>
							</x-adminlte-input-file>
							<x-adminlte-input-file id="file_news" name="file_news[]" label="Prílohy článku" placeholder="Vlož prílohy článku ...">
								<x-slot name="prependSlot">
									<div class="input-group-text bg-gradient-red">
										<i class="fas fa-file-import"></i>
					</div>
								</x-slot>
							</x-adminlte-input-file>

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

						<div class="col-xl-8 order-xl-1">
							<x-adminlte-text-editor id="Summernote" name="content" label="Obsah článku" placeholder="Text článku ..." :config="$config_Sumernote">
								{{ $news->content ?? old('content') }}
							</x-adminlte-text-editor>

							@isset($news->file)
							<div class="form-group">
								<label for="filesList">Zoznam priložených súborov</label>
								<ul class="">
								@foreach ($news->file as $file)
									<li>
										<a 	download
											target="_blank"
											href="{{ $file->absolutePath }}"
											title="@isset($file->description){{ $file->description }}@else Súbor: {{ $file->name }}@endisset">
											{{ $file->name }}
										</a>
									</li>
								@endforeach
								</ul>
							</div>
							@endisset
						</div>
					</div>
					<div class="row col-xl-6 m-auto">
						<div class="col-7">
							<x-adminlte-button class="btn-flat btn-block" type="submit" label="{{ $button_text }}" theme="success" icon="fas fa-lg fa-save mr-2"/>
						</div>
						<div class="col-5">
							<a href="{{ route('news.index') }}" class="btn btn-outline-secondary btn-flat btn-block">Späť</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
