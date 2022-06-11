<!-- GLOBAL SEARCH Start - Modal -->
    <section class="modal model_overlay fade" id="modalSearch" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="search_dialog">
                    <div class="model_content">
                        <form id="search-form-all" action="{{ route('search.all') }}">
                            @csrf
                            <div class="form_group">
                                <input type="text" id="inputSearch" name="searchAll" class="search" placeholder="Hľadať ...">
                                <button type="submit" value="Search" class="search_btn"><i class="fa-solid fa-magnifying-glass fa-xl" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
<!-- GLOBAL SEARCH End - Modal -->
