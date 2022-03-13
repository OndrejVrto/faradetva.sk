@php
    $config_select = [
        "placeholder" => "Vyber roly ...",
        "allowClear" => 'true',
    ];
@endphp
@php
    $controlerName = 'users';
    $columns = 10;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = null;
    if ( isset( $user) ) {
        $typeForm = 'edit';
        $identificator = $user->slug;
        $createdInfo = $user->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $user->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $user->getFirstMedia($user->collectionName)->file_name ?? '';
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš bol účet aktívny.">
            <input type="hidden" name="active" value="0">
            <input
                type="checkbox"
                name="active"
                class="custom-control-input"
                id="Switch1"
                value="1"
                {{ (( $user->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
            >
            <label class="custom-control-label" for="Switch1">Účet aktívny</label>
        </div>

        @role('Super Administrátor')
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš bol účet aktívny.">
                <input type="hidden" name="can_be_impersonated" value="0">
                <input
                    type="checkbox"
                    name="can_be_impersonated"
                    class="custom-control-input"
                    id="Switch2"
                    value="1"
                    {{ (( $user->can_be_impersonated ?? (old('can_be_impersonated') === "0" ? 0 : 1) ) OR old('can_be_impersonated', 0) === 1) ? 'checked' : '' }}
                >
                <label class="custom-control-label" for="Switch2">Účet je možné prisvojiť administrátorom</label>
            </div>
        @endrole
    </div>

    <div class="form-row">
        <div class="col-6">

            <x-adminlte-input
                name="name"
                label="Celé meno"
                {{-- placeholder="Vlož meno ..." --}}
                enableOldSupport="true"
                value="{{ $user->name ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-signature"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
        <div class="col-6">

            <x-adminlte-input
                name="nick"
                label="Prezývka / Nick"
                {{-- placeholder="Prezývka ..." --}}
                enableOldSupport="true"
                value="{{ $user->nick ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-user"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>

    </div>

    <div class="form-row">
        <div class="col-6">

            <x-adminlte-input
                name="password"
                label="Heslo"
                {{-- type="password" --}}
                {{-- placeholder="Vlož heslo ..." --}}
                enableOldSupport="false"
                {{-- value="{{ $user->password ?? '' }}" --}}
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
        <div class="col-6">

            <x-adminlte-input
                name="password_confirmation"
                label="Heslo potvrdenie"
                {{-- type="password" --}}
                {{-- placeholder="Zopakuj heslo ..." --}}
                enableOldSupport="false"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-unlock"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
    </div>

    <div class="form-row">
        <div class="col-6">

            <x-adminlte-input
                name="email"
                label="E-mail"
                {{-- placeholder="E-mail ..." --}}
                enableOldSupport="true"
                value="{{ $user->email ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-at"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
        <div class="col-6">

            <x-adminlte-input-file
                class="border-right-none"
                name="photo_avatar"
                label="Fotka alebo avatar"
                placeholder="{{ $media_file_name }}"
                accept=".jpg,.bmp,.png,.jpeg,.svg"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-file-import"></i>
                    </div>
                </x-slot>
                <x-slot name="noteSlot">
                    Poznámka: veľkosť obrázka minimálne 100x100 px.
                </x-slot>
            </x-adminlte-input-file>

        </div>
    </div>

    <hr class="bg-orange">

    {{-- With multiple slots, and plugin config parameter --}}
    <x-adminlte-select2
        name="role[]"
        id="sel2Tag"
        label="Prideliť uživateľovi Roly alebo jednotlivé Povolenia"
        :config="$config_select"
        multiple
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-chess-queen"></i>
            </div>
        </x-slot>

        @if ($roles->count())
            @foreach($roles as $role)
                <option
                    value="{{ $role->id }}"
                    title="{{ $role->name }}"
                    @if( in_array($role->id, old("role") ?: []) OR in_array($role->id, $userRoles) )
                        selected
                    @endif
                >
                    {{ $role->name }}
                </option>
            @endforeach
        @endif
    </x-adminlte-select2>

    @role('Super Administrátor')
        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby mal užívateľ všetky oprávnenia.">
                <input
                    type="checkbox"
                    class="custom-control-input"
                    id="Switch3"
                    name="all_permission"
                >
                <label class="custom-control-label" for="Switch3">Všetko</label>
            </div>
        </div>

        @foreach($permissions as $alpha => $collections)
            <h4 class="pl-3 text-orange">{{ $alpha }}</h4>
            <div class="row pb-4 no-gutters row-cols-1 row-cols-md-2 row-cols-xl-3">
                @foreach($collections as $permission)
                    <div class="col text-break">
                        <input type="checkbox"
                            name="permission[{{ $permission->id }}]"
                            value="{{ $permission->id }}"
                            class='d-inline permission m-2'
                            {{ in_array($permission->id, $userPermissions)
                                ? 'checked'
                                : '' }}
                        >
                        {{ $permission->name }}
                    </div>
                @endforeach
            </div>
        @endforeach
    @endrole

</x-backend.form>

@role('Super Administrátor')
    @push('js')
        <script @nonce type="text/javascript">
            $(document).ready(function() {
                $('[name="all_permission"]').on('click', function() {

                    if($(this).is(':checked')) {
                        $.each($('.permission'), function() {
                            $(this).prop('checked',true);
                        });
                    } else {
                        $.each($('.permission'), function() {
                            $(this).prop('checked',false);
                        });
                    }
                });
            });
        </script>
    @endpush
@endrole
