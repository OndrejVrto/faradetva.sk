@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb float-sm-right">
        @foreach ($breadcrumbs as $breadcrumb)

			@if (!isset($breadcrumb->icon))
				@if (!is_null($breadcrumb->url) && !$loop->last)
					<li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
				@else
					<li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
				@endif
			@else
				@if (!is_null($breadcrumb->url) && !$loop->last)
					<li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}"><i class="{{ $breadcrumb->icon }}"></i></a></li>
				@else
					<li class="breadcrumb-item active"><i class="{{ $breadcrumb->icon }}"></i></li>
				@endif
			@endif

        @endforeach
    </ol>
@endunless
