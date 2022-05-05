<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.page.section row="true" name="SECTION: História" class="ch_about_section pad_b_50">

            <div class="row ch_about_wrap">
                <div class="col-md-6 col-xs-12">
                    <div class="ch_about_thumb fromleft wow">
                        {{-- <img src="images/about/about-thumb2.jpg" alt="" class="img-fluid"> --}}
                        {{-- <x-partials.picture titleSlug="et-id-unde-velit-vo-xxx" columns="10" side="right" animation="fromright" dimensionSource="off" data-wow-delay="0.3s"/> --}}
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="ch_about_desc fromright wow">
                        <h3>Dejiny farnosti</h3>
                        <p class="text-justify">
                            Podpoľanie je oblasť situovaná na južných a juhovýchodných svahoch najvyššieho sopečného pohoria na Slovensku - Poľany, územie na rozhraní medzi Slovenským rudohorím a Slovenským stredohorím. Roztratené osídlenie po svahoch nečinného vulkánu predstavuje špecifiká, ktoré výrazne ovplyvňovali život miestnych obyvateľov. Táto rozsiahla časť Zvolenskej kotliny dostala svoj rázovitý charakter vďaka kopaničiarskej kolonizácii 17. storočia. Centrom tejto kolonizácie na území Vígľašského panstva sa stala Detva, ktorá bola založená priamo na podnet svojho zemepána. Sťahovali sa sem obyvatelia okolitých dedín, klčovali lesy na okolí majera a stavali si domy. Farnosť v Detve bola oficiálne zriadená v roku 1644.
                        </p>
                        <a href="{{ secure_url('o-nas/historia/dejiny-farnosti') }}" class="about_btn read_btn">Čítať ďalej</a>
                    </div>
                </div>
            </div>

            <div class="row about_box_wrap">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="about_box_inner rotate wow">
                        <i class="flaticon flaticon-church"></i>
                        <h4>Farári</h4>
                        <p>Správcovia detvianskej farnosti od jej založenia v roku 1644</p>
                        <a href="#" class="read_m_link">Čítať ďalej<i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="about_box_inner rotate wow" data-wow-delay=".3s">
                        <i class="flaticon flaticon-goal"></i>
                        <h4>Kapláni</h4>
                        <p>Kapláni, ktorí pôsobili v Detve od začiatku 20. storočia podnes</p>
                        <a href="#" class="read_m_link">Čítať ďalej<i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="about_box_inner rotate wow" data-wow-delay=".6s">
                        <i class="flaticon flaticon-cemetery-cross"></i>
                        <h4>Povolania</h4>
                        <p>Kňazi, rehoľníci a rehoľníčky pochádzajúci z detvianskej farnosti</p>
                        <a href="#" class="read_m_link">Čítať ďalej<i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="about_box_inner rotate wow" data-wow-delay=".9s">
                        <i class="flaticon flaticon-multiple-users-silhouette"></i>
                        <h4>Spomíname</h4>
                        <p>Na cintoríne v Detve sú pochovaní štyria rímskokatolícki kňazi</p>
                        <a href="#" class="read_m_link">Čítať ďalej<i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

    </x-frontend.page.section>

    <x-frontend.page.section name="SECTION: Významné osobnosti"  row="true" class="ch_ministry_section pad_t_50">

        <x-frontend.page.section-header header="Významné osobnosti"/>

        <x-partials.page-card routeStaticPages="
            o-nas.historia.anton-prokop,
            o-nas.historia.imrich-durica,
            o-nas.historia.jozef-zavodsky,
            o-nas.historia.karol-anton-medvecky,
            o-nas.historia.jan-strban,
            o-nas.historia.jozef-buda
        "/>

    </x-frontend.page.section>

    <x-frontend.page.section row="true" name="SECTION: Ďalšie" class="pad_t_50 pad_b_80">

        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="blog_item_cover frombottom wow">
                <div class="blog_thumb">
                    {{-- <x-partials.picture titleSlug="historicka-pohladnica" columns="10" side="right" animation="fromright" dimensionSource="off" data-wow-delay="0.3s"/> --}}
                    {{-- <img src="images/blog/blog_1.jpg" alt="" class="w-100"> --}}
                    <!-- overlay -->
                    <div class="blog_overlay">
                        <a href="blog-single.html" class="link_icon"><i class="fas fa-link"></i></a>
                    </div>
                    <!-- overlay -->
                </div>
                <div class="blog_desc">
                    <h3><a href="blog-single.html">„Chudobienec“</a></h3>
                    <p>
                        Katolícka cirkev v Detve mala výdavky nielen na kostol a faru, ale aj na sociálne ustanovizne, ktoré sa nachádzali v jej správe. Karol Anton Medvecký ich nazýva „ustanovizne kresťanskej lásky“. Medzi ne patril „špitál“, t. j. cirkevný chudobinec, resp. starobinec a o čosi neskôr postavený sirotinec. Farnosť v Detve plnila vďaka miestnemu chudobincu aj zdravotnícko-charitatívnu funkciu. Charitatívne zariadenie poskytovalo strechu nad hlavou a stravu pre najbiednejších v okolí už od prvej polovice 18. storočia.
                    </p>
                    <a href="blog-single.html" class="read_m_link">
                        Čítať ďalej
                        <i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="blog_item_cover frombottom wow">
                <div class="blog_thumb">
                    {{-- <x-partials.picture titleSlug="historicka-pohladnica" columns="10" side="right" animation="fromright" dimensionSource="off" data-wow-delay="0.3s"/> --}}
                    {{-- <img src="images/blog/blog_1.jpg" alt="" class="w-100"> --}}
                    <!-- overlay -->
                    <div class="blog_overlay">
                        <a href="blog-single.html" class="link_icon"><i class="fas fa-link"></i></a>
                    </div>
                    <!-- overlay -->
                </div>
                <div class="blog_desc">
                    <h3><a href="blog-single.html">Vianoce v Detve</a></h3>
                    <p>
                        Polnočnej svätej omše sa každoročne v Detve zúčastňuje množstvo veriacich nielen z detvianskej farnosti, ale aj zo širokého okolia. Spev počas polnočnej omše znie mohutne, v niektorých častiach svätej omše kostol doslova buráca a ľudia sa tešia z každej piesne. Vianočná polnočná svätá omša v Detve sa formovala na začiatku 20. storočia. Popretkávaná ľudovými koledami sa traduje už niekoľko desiatok rokov. Polnočná svätá omša v Detve je okrem duchovného aj umeleckým zážitkom pre milovníkov ľudovej kultúry.
                    </p>
                    <a href="blog-single.html" class="read_m_link">
                        Čítať ďalej
                        <i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="blog_item_cover frombottom wow">
                <div class="blog_thumb">
                    {{-- <x-partials.picture titleSlug="historicka-pohladnica" columns="10" side="right" animation="fromright" dimensionSource="off" data-wow-delay="0.3s"/> --}}
                    {{-- <img src="images/blog/blog_1.jpg" alt="" class="w-100"> --}}
                    <!-- overlay -->
                    <div class="blog_overlay">
                        <a href="blog-single.html" class="link_icon"><i class="fas fa-link"></i></a>
                    </div>
                    <!-- overlay -->
                </div>
                <div class="blog_desc">
                    <h3><a href="blog-single.html">Štatistiky farnosti</a></h3>
                    <p>
                        Za najstarší druh štatistiky možno považovať sčítanie ľudu, ktoré má na našom území pôvod v stredoveku. Prvé moderné sčítanie ľudu v Uhorsku bolo v roku 1869. Skôr než boli v roku 1895 zavedené štátne matriky vedené na matričných úradoch, boli oficiálnymi, resp. úradnými matrikami cirkevné matriky. To čo platilo v minulosti, platí v podstate aj dnes, matriky sú úradné knihy zápisov o narodeniach, sobášoch a úmrtiach. Okrem týchto rímskokatolícke farnosti evidujú taktiež matriky birmovaných a prvoprijímajúcich.
                    .</p>
                    <a href="blog-single.html" class="read_m_link">
                        Čítať ďalej
                        <i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

    </x-frontend.page.section>

</x-frontend.layout.master>

