<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.page.section row="true" name="PAGE: ({{$pageData['title']}}) -" class="ch_about_section pad_b_50">

            <!-- heading End -->
            <div class="row ch_about_wrap">
                <div class="col-md-6 col-xs-12">
                    <div class="ch_about_thumb fromleft wow">
                        {{-- <img src="images/about/about-thumb2.jpg" alt="" class="img-fluid"> --}}
                        <x-partials.picture titleSlug="historicka-pohladnica" columns="10" side="right" animation="fromright" dimensionSource="off" data-wow-delay="0.3s"/>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="ch_about_desc fromright wow">
                        <h3>Dejiny farnosti</h3>

                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters..
                        </p>
                        <a href="{{ url('o-nas/historia/dejiny-farnosti') }}" class="about_btn read_btn">Čítať ďalej</a>
                    </div>
                </div>
            </div>

            <div class="row about_box_wrap">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="about_box_inner rotate wow">
                        <i class="flaticon flaticon-church"></i>
                        <h4>Farári v Detve</h4>
                        <p>It is a long established fact that a reader will be distracted by</p>
                        <a href="#" class="read_m_link">Čítať ďalej<i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="about_box_inner rotate wow" data-wow-delay=".3s">
                        <i class="flaticon flaticon-goal"></i>
                        <h4>Kapláni od 1644</h4>
                        <p>It is a long established fact that a reader will be distracted by</p>
                        <a href="#" class="read_m_link">Čítať ďalej<i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="about_box_inner rotate wow" data-wow-delay=".6s">
                        <i class="flaticon flaticon-cemetery-cross"></i>
                        <h4>Duchovné povolania</h4>
                        <p>It is a long established fact that a reader will be distracted by</p>
                        <a href="#" class="read_m_link">Čítať ďalej<i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="about_box_inner rotate wow" data-wow-delay=".9s">
                        <i class="flaticon flaticon-multiple-users-silhouette"></i>
                        <h4>Kňazi pochovaný v Detve</h4>
                        <p>It is a long established fact that a reader will be distracted by</p>
                        <a href="#" class="read_m_link">Čítať ďalej<i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

    </x-frontend.page.section>

    <x-frontend.page.section name="PAGE" row="true" class="ch_ministry_section pad_t_50">

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

    <x-frontend.page.section row="true" name="PAGE " class="pad_t_50 pad_b_80">

        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="blog_item_cover frombottom wow">
                <div class="blog_thumb">
                    <x-partials.picture titleSlug="historicka-pohladnica" columns="10" side="right" animation="fromright" dimensionSource="off" data-wow-delay="0.3s"/>
                    {{-- <img src="images/blog/blog_1.jpg" alt="" class="w-100"> --}}
                    <!-- overlay -->
                    <div class="blog_overlay">
                        <a href="blog-single.html" class="link_icon"><i class="fas fa-link"></i></a>
                    </div>
                    <!-- overlay -->
                </div>
                <div class="blog_desc">
                    <h3><a href="blog-single.html">Štatistiky od r. 2000</a></h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo..</p>
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
                    <x-partials.picture titleSlug="historicka-pohladnica" columns="10" side="right" animation="fromright" dimensionSource="off" data-wow-delay="0.3s"/>
                    {{-- <img src="images/blog/blog_1.jpg" alt="" class="w-100"> --}}
                    <!-- overlay -->
                    <div class="blog_overlay">
                        <a href="blog-single.html" class="link_icon"><i class="fas fa-link"></i></a>
                    </div>
                    <!-- overlay -->
                </div>
                <div class="blog_desc">
                    <h3><a href="blog-single.html">Chudobienec</a></h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo..</p>
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
                    <x-partials.picture titleSlug="historicka-pohladnica" columns="10" side="right" animation="fromright" dimensionSource="off" data-wow-delay="0.3s"/>
                    {{-- <img src="images/blog/blog_1.jpg" alt="" class="w-100"> --}}
                    <!-- overlay -->
                    <div class="blog_overlay">
                        <a href="blog-single.html" class="link_icon"><i class="fas fa-link"></i></a>
                    </div>
                    <!-- overlay -->
                </div>
                <div class="blog_desc">
                    <h3><a href="blog-single.html">Vianoce</a></h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo..</p>
                    <a href="blog-single.html" class="read_m_link">
                        Čítať ďalej
                        <i class="ms-1 fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

    </x-frontend.page.section>

</x-frontend.layout.master>

