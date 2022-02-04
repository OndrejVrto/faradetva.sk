@php
    $controlerName = 'roles';
    $columns = 10;
    $uploadFiles = 'false';

    $typeForm = $identificatorEdit = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $role ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $role->id;
        $createdInfo = $role->created_at;
        $updatedInfo = $role->updated_at;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

    <x-adminlte-input
        name="name"
        label="Názov užívateľskej roly"
        {{-- placeholder="Názov užívateľskej roly" --}}
        enableOldSupport="true"
        value="{{ $role->name ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-chess-queen"></i>
            </div>
        </x-slot>
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

</x-admin-form>

@push('js')
    <script type="text/javascript">
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
