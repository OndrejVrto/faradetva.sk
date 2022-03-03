<div class="form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"
        title="Zaškrtni keď chceš aby sa zobrazovala správa na stránke.">
            <input type="hidden" name="active" value="0">
            <input
                type="checkbox"
                name="active"
                class="custom-control-input"
                id="customSwitch3"
                value="1"
                {{ (( $news->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
    </div>
</div>
