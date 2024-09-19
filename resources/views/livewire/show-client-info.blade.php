<div class="order-cols">
    <div class="row mb-4">
        <div class="col-sm-4 mt-3">
            <!-- Billing Address -->
            <div class="block block-rounded h-100">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{__('orders.order.billing-info')}}</h3>
                </div>
                <div class="block-content">
                    @if (strlen($invoiceName)>0)
                        <div class="fs-4 mb-1">{{$invoiceName}} {{$invoiceSurname}}</div>
                        <address class="fs-sm mb-0">
                        {{$invoiceStreet}}<br>
                        {{$invoiceCity}}<br>
                        {{$invoiceCountry}}, {{$invoiceZip}}<br><br>
                        <i class="fa fa-phone"></i> {{$invoicePhone}}<br>
                        <i class="fa fa-envelope-o"></i> <a href="mailto:{{$invoiceEmail}}">{{$invoiceEmail}}</a>
                        </address>
                    @else
                    -
                    @endif
                </div>
            </div>
            <!-- END Billing Address -->
        </div>
        <div class="col-sm-4 mt-3">
            <!-- Shipping Address -->
            <div class="block block-rounded h-100">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{__('orders.order.shipping-address')}}</h3>
                </div>
                <div class="block-content">
                    @if (strlen($deliveryName)>0)
                        <div class="fs-4 mb-1">{{$deliveryName}} {{$deliverySurname}}</div>
                        <address class="fs-sm mb-0">
                        {{$deliveryStreet}}<br>
                        {{$deliveryCity}}<br>
                        {{$deliveryCountry}}, {{$deliveryZip}}<br><br>
                        <i class="fa fa-phone"></i> {{$deliveryPhone}}
                        </address>
                        <br>
                    @else
                    -
                    @endif
                </div>
            </div>
            <!-- END Shipping Address -->
        </div>
        <div class="col-sm-4 mt-3">
            <!-- Company info -->
            <div class="block block-rounded h-100">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{__('orders.order.company-info')}}</h3>
            </div>
            <div class="block-content">
                @if (strlen($companyname)>0)
                    <div class="fs-4 mb-1">{{$companyname}}</div>
                    <address class="fs-sm mb-0">
                    {{$companyregno}}<br>
                    {{$companybank}}<br>
                    {{$companyaccount}}
                    </address>
                @else
                -
                @endif
            </div>
            </div>
            <!-- END Company info -->
        </div>
    </div>
</div>
