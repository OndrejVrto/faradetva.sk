<section class="widget widget_search">
    <form id="search-form" class="search-form" action="{{ route('article.search') }}">
        @csrf
        <label>
            <input type="text" id="search-form-q" name="searchNews" placeholder="Hľadať v článkoch ..." class="search-field">
        </label>
        <input type="submit" class="search-submit" value="Hľadať">
    </form>
</section>
