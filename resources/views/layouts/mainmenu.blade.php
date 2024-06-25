<ul class="mainmenu">

    <li><a href="/discount-products"><i class="fa-solid fa-certificate me-2"></i>{{__('frontend.discounts')}}</a></li>
    <li><a href="/new-products"><i class="fa-regular fa-calendar-check me-2"></i>{{__('frontend.new-products')}}</a></li>

    @mobile

    <li><a href="{{route('pages-about')}}">{{__('frontend.navi-about')}}</a></li>

    <li class="menu-item-has-children">
        <a href="#">{{__('frontend.navi-info')}}</a>
        <ul class="axil-submenu">
            <li><a href="{{route('pages-privacy')}}">{{__('frontend.navi-privacy')}}</a></li>
            <li><a href="{{route('pages-rules')}}">{{__('frontend.navi-rules')}}</a></li>
            <li><a href="{{route('pages-delivery')}}">{{__('frontend.navi-delivery')}}</a></li>
        </ul>
    </li>


    <li><a href="{{route('pages-contacts')}}">{{__('frontend.navi-contacts')}}</a></li>

    @endmobile

</ul>
