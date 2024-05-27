@section('service-area')
    <div class="service-area">
        <div class="container">
            <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('assets/images/icons/service1.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">{{__('frontend.footer.delivery-header')}}</h6>
                            <p>{{__('frontend.footer.delivery-text')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('assets/images/icons/service2.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">{{__('frontend.footer.moneyback-header')}}</h6>
                            <p>{{__('frontend.footer.moneyback-text')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('assets/images/icons/service3.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">{{__('frontend.footer.return-header')}}</h6>
                            <p>{{__('frontend.footer.return-text')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('assets/images/icons/service4.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">{{__('frontend.footer.support-header')}}</h6>
                            <p>{{__('frontend.footer.support-text')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
