@extends('layouts.backend')

<style>
    .order-cols .row {
        overflow: hidden;
    }
    .order-cols .row [class*="col-"]{
        margin-bottom: -99999px;
        padding-bottom: 99999px;
    }
</style>

@section('content')

  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
                {{__('orders.order.no')}} #{{date_format($order->created_at,"dmY")}}-{{$order->id}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                <strong>{{__('orders.order.from')}}</strong>: {{$order->name}} {{$order->surname}} // {{$order->email}}
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/orders/show/">{{__('orders.navi.main')}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{__('orders.order.no')}} #{{date_format($order->created_at,"dmY")}}-{{$order->id}}
            </li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->



  <!-- Page Content -->
  <div class="content">
    <a href="/orders/show">
        <button type="button" class="btn btn-alt-secondary me-1 mb-3">
            <i class="fa-solid fa-caret-left me-1"></i> {{__('orders.navi.all')}}
        </button>
    </a>
    <!-- Page Content -->
    <div class="content">

        <!-- statuses -->
        @livewire('show-order-status', ['order' => $order])
        <!-- END statuses -->

        <!-- Products -->
        <div class="block block-rounded mb-3">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{__('orders.order.ordered-products')}}</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
            <table class="table table-borderless table-striped table-vcenter fs-sm">
                <thead>
                <tr>
                    <th>{{__('orders.order.product-title')}}</th>
                    <th>{{__('orders.order.inner-code')}}</th>
                    <th class="text-center">{{__('orders.order.quantity')}}</th>
                    <th class="text-end" style="width: 10%;">{{__('orders.order.price')}}</th>
                    <th class="text-end" style="width: 10%;">{{__('orders.order.sum')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($order->cart as $cart)
                    <tr>
                        <td>
                            <a target="blank" href="{{route('frontend-product-show',['alias'=>$cart['code']])}}">{{$cart['title']}}</a>
                            @if (count($cart['variation'])>0)
                                <br>
                                @foreach ($cart['variation'] as $variation)
                                    <small class="text-secondary"><b>{{$variation['name']}}</b>: {{$variation['value']}}</small>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            {{$cart['inner_code']??'-'}}
                        </td>
                        <td class="text-center"><strong>{{$cart['addCount']}}</strong></td>
                        <td class="text-end">{{number_format($cart['price'], 2)}} €</td>
                        <td class="text-end">{{number_format($cart['price']*$cart['addCount'], 2)}} €</td>
                    </tr>
                @endforeach




                <tr>
                    <td colspan="4" class="text-end"><strong>{{__('orders.order.total')}}:</strong></td>
                    <td class="text-end">{{number_format($order->total, 2)}} €</td>
                </tr>
                @if ($order->deliveryPrice > 0)
                <tr>
                    <td colspan="4" class="text-end"><strong>{{__('orders.order.delivery')}}:</strong></td>
                    <td class="text-end">{{number_format($order->deliveryPrice, 2)}} €</td>
                </tr>
                @endif

                <tr class="table-success">
                    <td colspan="4" class="text-end text-uppercase"><strong>{{__('orders.order.total-due')}}:</strong></td>
                    <td class="text-end"><strong>{{number_format($order->deliveryPrice + $order->total, 2)}} €</strong></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
        <!-- END Products -->

        <!-- Customer -->
        <div class="order-cols">
            <div class="row mb-4">
                <div class="col-sm-4 mt-3">
                    <!-- Billing Address -->
                    <div class="block block-rounded h-100">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{__('orders.order.billing-info')}}</h3>
                        </div>
                        <div class="block-content">
                            <div class="fs-4 mb-1">{{$order->name}} {{$order->surname}}</div>
                            <address class="fs-sm mb-0">
                            {{$order->street}}<br>
                            {{$order->city}}<br>
                            {{$order->country}}, {{$order->zip}}<br><br>
                            <i class="fa fa-phone"></i> {{$order->phone}}<br>
                            <i class="fa fa-envelope-o"></i> <a href="mailto:{{$order->email}}">{{$order->email}}</a>
                            </address>
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
                            @if (count($order->delivery)>0)
                                <div class="fs-4 mb-1">{{$order->delivery['name']??''}} {{$order->delivery['surname']??''}}</div>
                                <address class="fs-sm mb-0">
                                {{$order->delivery['street']??''}}<br>
                                {{$order->delivery['city']??''}}<br>
                                {{$order->delivery['country']??''}}, {{$order->delivery['zip']??''}}<br><br>
                                <i class="fa fa-phone"></i> {{$order->delivery['phone']??''}}
                                </address>
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
                        @if (count($order->company)>0)
                            <div class="fs-4 mb-1">{{$order->company['name']??''}}</div>
                            <address class="fs-sm mb-0">
                            {{$order->company['regno']??''}}<br>
                            {{$order->company['bank']??''}}<br>
                            {{$order->company['account']??''}}
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
        <!-- END Customer -->

        <!-- Log Messages -->
        @livewire('show-order-logs', ['id' => $order->id])
        <!-- END Log Messages -->

    </div>
    <!-- END Page Content -->




  </div>
  <!-- END Page Content -->
  @livewire('delete-confirmation')
@endsection
