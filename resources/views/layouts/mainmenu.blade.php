<ul class="mainmenu">

    <li><a href="/discount-products"><i class="fa-solid fa-certificate me-2"></i>Akcijas</a></li>
    <li><a href="/new-products"><i class="fa-regular fa-calendar-check me-2"></i>Jaunumi</a></li>

    @mobile

    <li><a href="{{route('pages-about')}}">Par mums</a></li>

    <li class="menu-item-has-children">
        <a href="#">Informācija</a>
        <ul class="axil-submenu">
            <li><a href="{{route('pages-privacy')}}">Privātuma politika</a></li>
            <li><a href="{{route('pages-privacy')}}">Internetveikala lietošanas noteikumi</a></li>
            <li><a href="{{route('pages-privacy')}}">Piegādes nosacījumi</a></li>
        </ul>
    </li>


    <li><a href="{{route('pages-contacts')}}">Kontakti</a></li>

    @endmobile

</ul>
