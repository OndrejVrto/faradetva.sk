<div class="modal model_overlay fade" id="modalSearch" tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="search_dialog">
                <div class="model_content">
                    <form id="search-form-all" action="{{ route('search.all') }}">
                        @csrf
                        <div class="form_group">
                            <input type="text" id="inputSearch" name="searchAll" class="search" placeholder="Hľadať ...">
                            <button type="submit" value="Search" class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
	</div>
</div>

@push('js')
    <script>
        var myModal = document.getElementById('modalSearch');
        var myInput = document.getElementById('inputSearch');

        myModal.show();

    </script>
@endpush
