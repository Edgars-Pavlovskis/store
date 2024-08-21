@section('footer')
    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-2">
        <!-- Start Footer Top Area  -->
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">{{__('frontend.navi-about')}}</h5>
                            <div class="logo">
                                <a href="/">
                                    <img style="height:50px;" class="light-logo" src="assets/img/alba-red.png" alt="Logo Images">
                                </a>
                            </div>
                            <div class="inner">
                                <p>Piedāvājam plašu augstas kvalitātes preču klāstu jūsu darba vajadzībām - no pildspalvām un bloknotiem līdz printeriem un biroja mēbelēm. Ērta iepirkšanās, ātra piegāde un izcils klientu serviss. Iepērcieties pie mums un padariet savu darba vidi efektīvāku un patīkamāku!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->

                    <!-- Start Single Widget  -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">{{__('frontend.quicklinks')}}</h5>
                            <div class="inner">
                                <ul>
                                    <!-- <li><a href="{{route('pages-about')}}">{{__('frontend.navi-about')}}</a></li> -->
                                    <li><a href="{{route('pages-privacy')}}">{{__('frontend.navi-privacy')}}</a></li>
                                    <li><a href="{{route('pages-rules')}}">{{__('frontend.navi-rules')}}</a></li>
                                    <li><a href="{{route('pages-delivery')}}">{{__('frontend.navi-delivery')}}</a></li>
                                    <li><a href="{{route('pages-contacts')}}">{{__('frontend.navi-contacts')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">{{__('frontend.navi-contacts')}}</h5>
                            <div class="inner">
                                <ul class="support-list-item">
                                    <li><a href="javascript:void(0)"><i class="fa-solid fa-globe"></i> Brāļu Skrindu iela 17, Rēzekne, LV-4601</a></li>
                                    <li><a href="mailto:info@birojamunskolai.lv"><i class="fal fa-envelope-open"></i> info@birojamunskolai.lv</a></li>
                                    <li><a href="tel:+37128372929"><i class="fal fa-phone-alt"></i> (+371) 28372929</a></li>
                                    <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-12">
                        <div class="social-share">
                            <a target="blank" href="https://www.facebook.com/AlbaRezekne"><i class="fab fa-facebook-f"></i></a>
                            <a target="blank" href="https://www.instagram.com/albabirojapasaule?igsh=OTNvcXYyOG1qc3Bx"><i class="fab fa-instagram"></i></a>
                            <a target="blank" href="https://www.tiktok.com/@alba_veikali?_t=8nA4lr9ToEj&_r=1"><i class="fa-brands fa-tiktok"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-end">
                            <ul class="quick-link">
                                <li>© {{date('Y')}}. Developed by <a target="_blank" href="https://raimita.lv/">raimita.lv</a>.</li>
                                <!-- Developed with &#x2764;&#xfe0f; by -->
                            </ul>
                        </div>
                    </div>
                    <!--
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{asset('assets/images/icons/cart/cart-1.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('assets/images/icons/cart/cart-2.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('assets/images/icons/cart/cart-5.png')}}" alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                -->
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- End Footer Area  -->
@endsection
