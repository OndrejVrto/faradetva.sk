@can(
    'static-pages.index',
)
    <x-backend.dashboard-card
        color="purple"
        header="Zoznam statických stránok"
        flex="false"
    >
        @foreach($pages as $page)
            <div class="row py-1">
                <div class="col-4">
                    @if ($page->check_url == 1)
                        <i class="fas fa-check fa-lg text-success mr-3"></i>
                    @else
                        <i class="far fa-times-circle fa-lg text-danger mr-3"></i>
                    @endif
                    {{ $page->title }}
                </div>
                <div class="col-8">
                    <a href="{{ config('app.url').'/'.$page->url }}" target="_blank" rel="noopener noreferrer">
                        <span class="small text-info">{{ config('app.url').'/'}}</span>{{ $page->url }}
                    </a>
                </div>
            </div>
        @endforeach
    </x-backend.dashboard-card>
@endcan
