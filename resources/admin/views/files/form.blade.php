<div class="row">
	<div class="col-12 m-auto">
		<div class="card">
			<div class="card-body">

			@if ( $type == 'edit')
				<form id="edit-form" method="post" action="{{ route('files.update', $news->id) }}" enctype="multipart/form-data">
				@method('PATCH')
			@else
				<form id="add-form" method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">
			@endif

			@csrf

					@if ( count($object->file) > 0 )

						<div class="add-files-group">
							<label>Zoznam vložených súborov</label>

							@foreach ($object->file as $file)
							<div class="form-row pb-3">
								<div class="col-12 col-md-4">
									<a 	download="{{ $file->name }}"
										class="btn btn-btn-default bg-gradient-yellow w-100"
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

					<div class="add-files-group">
						<label>Nové súbory</label>
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


					<div class="row col-xl-6 m-auto pt-3">
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
