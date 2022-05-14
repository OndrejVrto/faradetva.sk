<li class="nav-item">

    {{-- Search toggle button --}}
    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fa-solid fa-search"></i>
    </a>

    {{-- Search bar --}}
    <div class="navbar-search-block">
        <form class="form-inline" action="{{ $item['href'] }}" method="{{ $item['method'] }}">
            @csrf

            <div class="input-group">

                {{-- Search input --}}
                <input class="form-control form-control-navbar" type="search"
                    @isset($item['id']) id="{{ $item['id'] }}" @endisset
                    name="{{ $item['input_name'] }}"
                    placeholder="{{ $item['text'] }}"
                    aria-label="{{ $item['text'] }}">

                {{-- Search buttons --}}
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa-solid fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>

</li>
