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
                @checked($news->active ?? old('active', true))
            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
    </div>
</div>

<div class="ml-5 form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"
        title="Zaškrtni keď chceš aby bola správa prioritne prvá.">
            <input type="hidden" name="prioritized" value="0">
            <input
                type="checkbox"
                name="prioritized"
                class="custom-control-input"
                id="customSwitch4"
                value="1"
                @checked($news->prioritized ?? old('prioritized', false))
            >
            <label class="custom-control-label" for="customSwitch4">Prioritná správa</label>
    </div>
</div>
