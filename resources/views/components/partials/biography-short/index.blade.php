@props([
    'personList',
    'delay' => 1,
])

@foreach ($personList as $key => $person)
    @php
        if ((isset($person["pohlavie"]) && $person["pohlavie"] === "muzske")) {
            $wordBorn  = "narodený";
            $wordDeath = "zomrel";
            $wordOrd   = "ordinovaný";
            $wordPlace = "pochovaný";
        } else {
            $wordBorn  = "narodená";
            $wordDeath = "zomrela";
            $wordOrd   = "ordinovaná";
            $wordPlace = "pochovaná";
        }
    @endphp
    <div class="col-md-6 col-lg-4 frombottom wow" data-wow-delay="{{ ($key % 3 + 1) * 0.4 }}s">

        <div class="blog_item_cover">

            @isset($person["obrazok"])
                <div class="">
                    <x-partials.picture-responsive :titleSlug="$person['obrazok']" class="img-fluid w-100" descriptionSide="left"/>
                </div>
            @endisset

            <div class="p-3">

                <h3 class="fs-4 text-church-template-blue">
                    {{ $person["meno_a_tituly"] }}
                </h3>

                <div class="">

                    @isset($person["poznamka"])
                        <div><em>{{ $person["poznamka"] }}</em></div>
                    @endisset

                    @isset($person["clen_radu_nazov"])
                        <div><em class="text-primary">{{ $person["clen_radu_nazov"] }}</em></div>
                    @endisset

                    @isset($person["datum_obliecky_vstupu"])
                        <div class="fw-bolder">{{ $person["datum_obliecky_vstupu"] }}</div>
                    @endisset

                    @isset($person["datum_prve_sluby"])
                        <div>prvé sľuby <span class="fw-bolder">{{ $person["datum_prve_sluby"] }}</span></div>
                    @endisset

                    @isset($person["datum_dozivotne_sluby"])
                        <div>doživotné sľuby <span class="fw-bolder">{{ $person["datum_dozivotne_sluby"] }}</span ></div>
                    @endisset

                    @if(isset($person["datum_narodenia"]) && isset($person["miesto_narodenia"]))
                        <div>{{ $wordBorn }} {{ $person["datum_narodenia"] }} v {{ $person["miesto_narodenia"] }}</div>
                    @elseif (isset($person["datum_narodenia"]))
                        <div>{{ $wordBorn }} {{ $person["datum_narodenia"] }}</div>
                    @elseif (isset($person["miesto_narodenia"]))
                        <div>{{ $wordBorn }} v {{ $person["miesto_narodenia"] }}</div>
                    @endif

                    @if(isset($person["datum_ordinovania"]) && isset($person["miesto_ordinovania"]))
                        <div>{{ $wordOrd }} {{ $person["datum_ordinovania"] }} v {{ $person["miesto_ordinovania"] }}</div>
                    @elseif (isset($person["datum_ordinovania"]))
                        <div>{{ $wordOrd }} {{ $person["datum_ordinovania"] }}</div>
                    @elseif (isset($person["miesto_ordinovania"]))
                        <div>{{ $wordOrd }} v {{ $person["miesto_ordinovania"] }}</div>
                    @endif

                    @if(isset($person["datum_umrtia"]) && isset($person["miesto_umrtia"]))
                        <div>{{ $wordDeath }} {{ $person["datum_umrtia"] }} v {{ $person["miesto_umrtia"] }}</div>
                    @elseif (isset($person["datum_umrtia"]))
                        <div>{{ $wordDeath }} {{ $person["datum_umrtia"] }}</div>
                    @elseif (isset($person["miesto_umrtia"]))
                        <div>{{ $wordDeath }} v {{ $person["miesto_umrtia"] }}</div>
                    @endif

                    @isset($person["miesto_pochovania"])
                        <div>{{ $wordPlace }} v {{ $person["miesto_pochovania"] }}</div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endforeach

