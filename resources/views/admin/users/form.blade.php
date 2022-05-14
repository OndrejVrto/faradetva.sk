@php
    $config_select = [
        "placeholder" => "Vyber roly ...",
        "allowClear" => 'true',
    ];
@endphp
@php
    $controlerName = 'users';
    $columns = 9;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = null;
    if ( isset( $user) ) {
        $typeForm = 'edit';
        $identificator = $user->slug;
        $createdInfo = $user->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $user->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $user->getFirstMedia($user->collectionName) ?? '';
    }
@endphp

<x-admin.form
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
        <div class="col-xl-6">

            <x-adminlte-input
                name="name"
                label="Celé meno"
                enableOldSupport="true"
                value="{{ $user->name ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-signature"></i>
                    </div>
                </x-slot>
                @error('slug')
                    <x-slot:errorManual>
                        {{ $errors->first('slug') }}
                    </x-slot>
                @enderror
            </x-adminlte-input>

        </div>
        <div class="col-xl-6">

            <x-adminlte-input
                name="nick"
                label="Prezývka / Nick"
                enableOldSupport="true"
                value="{{ $user->nick ?? '' }}"
                >
                <x-slot:prependSlot>
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
                enableOldSupport="false"
                {{-- value="{{ $user->password ?? '' }}" --}}
                >
                <x-slot:prependSlot>
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
                enableOldSupport="false"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-unlock"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
    </div>

    <hr class="bg-orange mt-4">

    <div class="form-row">
        <div class="col-xl-8">

            <x-adminlte-input
                name="email"
                label="E-mail"
                enableOldSupport="true"
                value="{{ $user->email ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-at"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input
                name="phone"
                label="Telefón"
                placeholder="(+421) 905 123 456"
                enableOldSupport="true"
                value="{{ $user->phone ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-mobile-alt fa-lg"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input
                name="twiter_name"
                label="Twitter"
                placeholder="@mojemeno"
                enableOldSupport="true"
                value="{{ $user->twiter_name ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input
                name="facebook_url"
                label="Facebook (url)"
                enableOldSupport="true"
                value="{{ $user->facebook_url ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input
                name="www_page"
                label="Osobná www stránka (url)"
                enableOldSupport="true"
                value="{{ $user->www_page ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-brands fa-html5"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
        <div class="col-xl-4">

            <hr class="d-xl-none bg-orange mt-4">
            <x-admin.form.crop label="Fotka alebo avatar" minWidth="100" minHeight="100" maxSize="460*460" :media_file_name="$media_file_name" />

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
        <x-slot:prependSlot>
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

</x-admin.form>

@role('Super Administrátor')
    @push('js')
        <script @nonce>
            toggleChceckerAll({
                button: '[name="all_permission"]',
                items: '.permission',
            });
        </script>
    @endpush
@endrole
