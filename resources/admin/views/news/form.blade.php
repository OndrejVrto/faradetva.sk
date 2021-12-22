@php
	$config_Sumernote = [
		'height' => '240',                 // set editor height
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
		<div class="card">
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
									<option
										value="{{ $category->id }}"
										title="{{ $category->description }}"
										@if( $category->id == ($news->category_id ?? '') OR $category->id == old('category_id'))
										selected
										@endif
										>
										{{ $category->title }}
									</option>
								@endforeach

								@endif
							</x-adminlte-select2>

							<x-adminlte-input-file class="border-right-none" name="news_picture" label="Obrázok na titulku" placeholder="Vložiť obrázok ...">
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
								<option
									value="{{ $tag->id }}"
									title="{{ $tag->description }}"
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
						</div>
					</div>

					@isset($news)
					@if ( count($news->file) > 0 )

						<div class="add-files-group">
							<label>Zoznam už vložených príloh</label>

							@foreach ($news->file as $file)
							<div class="form-row pb-3">
								<div class="col-12 col-md-4">
									<a 	download="{{ $file->name }}"
										class="btn btn-default bg-gradient-yellow w-100"
										href="{{ $file->absolutePath }}"
										title="Stiahnuť súbor: {{ $file->name }}@isset($file->description) - {{ $file->description }}@endisset"
									>
										{{ $file->name }}
										<span class="ml-2 text-muted">
											({{ $file->sizeFileHuman }})
										</span>
									</a>
								</div>
								<div class="col-10 col-md-7 pr-0 pr-md-1">
									<x-adminlte-input
										name="fileDescription_old[{{ $file->id }}]"
										placeholder="Vložiť popis ..."
										value="{{ $file->description ?? old('fileDescription_old[' .$file->id. ']') }}"
										class="input-group-sm"
										fgroupClass="mb-0"
									>
										<x-slot name="prependSlot">
											<div class="input-group-text bg-gradient-gray" title="Popis súboru">
												<i class="fas fa-comment"></i>
											</div>
										</x-slot>
									</x-adminlte-input>
								</div>
								<div class="col-2 col-md-1 pl-0 pl-md-1">
									<x-adminlte-button class="buttonDelete bg-gradient-red w-100" icon="fas fa-trash-alt" title="Vymazať súbor" />
								</div>
							</div>
							@endforeach

						</div>
					@endif
					@endisset

					<div class="add-files-group">
						<label>Nové prílohy</label>
						<div class="form-row pb-3 d-none" id="addFileInput">
							<div class="col-12 col-md-4">
								<x-adminlte-input-file
									name="files_new[]"
									placeholder="Nová príloha ..."
									errorKey="files_new.*"
									fgroupClass="mb-0"
								>
									<x-slot name="prependSlot">
										<div class="input-group-text bg-gradient-red">
											<i class="fas fa-file-import"></i>
										</div>
									</x-slot>
								</x-adminlte-input-file>
							</div>
							<div class="col-10 col-md-7 pr-0 pr-md-1">
								<x-adminlte-input
									name="filesDescription_new[]"
									placeholder="Vložiť popis ..."
									class="input-group-sm"
									fgroupClass="mb-0"
								>
									<x-slot name="prependSlot">
										<div class="input-group-text bg-gradient-gray" title="Popis súboru">
											<i class="fas fa-comment"></i>
										</div>
									</x-slot>
								</x-adminlte-input>
							</div>
							<div class="col-2 col-md-1 pl-0 pl-md-1">
								<x-adminlte-button class="buttonDelete bg-gradient-red w-100" icon="fas fa-trash-alt" title="Vymazať súbor" />
							</div>
						</div>
					</div>

					<div class="form-row">
						<x-adminlte-button class="px-5 bg-gradient-blue" icon="fas fa-plus" title="Pridať ďalší súbor" id="addFileSubmit" />
					</div>

					<div class="row col-xl-6 pt-4 m-auto">
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
