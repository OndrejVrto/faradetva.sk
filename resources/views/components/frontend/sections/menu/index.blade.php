<x-frontend.page.section
    name="MENU"
    row="true"
    class="header_menu_section"
>

    <div class="col">
        <div class="ch_logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/church_logo.png') }}" alt="logo TODO:">
            </a>
        </div>
        <div class="nav_toggle" id="nav_toggle">
            <i></i>
            <i></i>
            <i></i>
        </div>
        <menu class="header_right_menu" id="header_right_menu">
            <ul class="menu">

                <x-frontend.sections.menu.items />

            </ul>
        </menu>
    </div>

</x-frontend.page.section>
