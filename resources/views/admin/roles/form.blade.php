@php
    $controlerName = 'roles';
    $columns = 10;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $role) ) {
        $typeForm = 'edit';
        $identificator = $role->id;
        $createdInfo = $role->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $role->updated_at->format('d. m. Y \o H:i');
    }
@endphp

<x-admin.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <x-adminlte-input
        name="name"
        label="Názov užívateľskej roly"
        enableOldSupport="true"
        value="{{ $role->name ?? '' }}"
        >
        <x-slot:prependSlot>
            <div class="input-group-text bg-gradient-orange">
                <i class="fa-solid fa-chess-queen"></i>
            </div>
        </x-slot>
        @error('slug')
            <x-slot:errorManual>
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

    <label for="permissions" class="form-label">Udelené povolenia tejto roly</label>
    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby mala táto rola všetky oprávnenia">
            <input
                type="checkbox"
                class="custom-control-input"
                id="customSwitch3"
                name="all_permission"
            >
            <label class="custom-control-label" for="customSwitch3">Všetko</label>
        </div>
        @error('permission')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('permission') }}</strong>
            </span>
        @enderror
    </div>

    @foreach($permissions as $alpha => $collections)
        <h4 class="pl-3 text-orange">{{ $alpha }}</h4>
        <div class="row pb-4 no-gutters row-cols-1 row-cols-md-2 row-cols-xl-3">
            @foreach($collections as $permission)
                <div class="col text-break">
                    <input type="checkbox"
                        name="permission[{{ $permission->name }}]"
                        value="{{ $permission->name }}"
                        class='d-inline permission m-2'
                        {{ in_array($permission->name, $rolePermissions)
                            ? 'checked'
                            : '' }}
                    >
                    {{ $permission->name }}
                </div>
            @endforeach
        </div>
    @endforeach

</x-admin.form>

@push('js')
    <script @nonce>
        toggleChceckerAll({
            button: '[name="all_permission"]',
            items: '.permission',
        });
    </script>
@endpush
