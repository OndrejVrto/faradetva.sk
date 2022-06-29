<x-web.layout.master>

        <x-web.sections.banner
            header="PGS test"
            {{-- titleSlug="pgs-logo" --}}
        />

        <x-web.page.section name="PGS TEST" class="static-page pad_b_80 pad_t_50">

            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('psg.test') }}">

                        <div class="row">
                            <div class="col-6">
                                <x-adminlte-input
                                    name="count"
                                    label="Počet vrstiev"
                                    enableOldSupport="true"
                                    value="{{ $count }}"
                                >
                                </x-adminlte-input>
                            </div>

                            <div class="col-6">
                                <x-adminlte-input
                                    name="color"
                                    type="color"
                                    label="Farba stromčeka"
                                    enableOldSupport="true"
                                    value="#{{ $color }}"
                                >
                                </x-adminlte-input>
                            </div>
                        </div>

                        <button class="mt-4 btn btn-primary" type="submit">
                            Sprav nám Vianoce
                        </button>
                        <a href="{{ route('psg.test') }}" class="mt-4 btn btn-secondary">
                            I feel happy
                        </a>
                    </form>
                </div>
                <div class="col-md-6 mx-5 px-5">
                    <div style="color: #{{ $color }};">
                        @foreach ($tree as $layer)
                            <pre class="my-0">{{ $layer }}</pre>
                        @endforeach
                    </div>
                </div>

            </div>
        </x-web.page.section>
</x-web.layout.master>
