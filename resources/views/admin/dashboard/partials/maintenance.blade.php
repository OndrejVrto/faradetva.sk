<x-admin.dashboard-card
    color="danger"
>
    <x-slot:header>
        <span class="text-danger text-bold">
            <i class="fa-solid fa-person-digging mr-2"></i>
            Mód údržby
        </span>
    </x-slot:header>

    {{-- app maintenance   up - down --}}
    <div class="form-group mb-0">
        <input type="checkbox" name="maintenance" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" disabled>
        <label for="maintenance" class="ml-3">Aplikácia/stránka spustená.</label>
    </div>

</x-admin.dashboard-card>
