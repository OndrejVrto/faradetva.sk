<div class="form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"
        title="Zaškrtni keď chceš aby sa zobrazovala správa na stránke.">
        <input
            name="active"
            type="checkbox"
            class="custom-control-input"
            id="customSwitch3"

            @if (!is_null(Session::get('news_old_input_checkbox')))
                {{ Session::get('news_old_input_checkbox') == 1 ? 'checked' : '' }}
            @else
                @if( isset($news) )
                    {{ $news->active == 1 ? 'checked' : '' }}
                @else
                    checked
                @endif
            @endif

        >
        <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
    </div>
</div>
