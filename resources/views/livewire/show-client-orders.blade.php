<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">{{__('frontend.profile.orders.no')}}</th>
                <th scope="col">{{__('frontend.profile.orders.date')}}</th>
                <th scope="col">{{__('frontend.profile.orders.status')}}</th>
                <th scope="col">{{__('frontend.profile.orders.total')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">#{{date_format($order->created_at,"dmY")}}-{{$order->id}}</th>
                <td>{{date_format($order->created_at,"d.m.Y")}}</td>
                <td><span class="badge {{config('shop.backend.order-statuses.'.$order->status.'.bootstrap-bg')}}">{{__('orders.status.'.$order->status)}}</span></td>
                <td><b>{{number_format($order->total??0, 2)}} €</b> ({{__('frontend.profile.orders.items')}}: {{$order->items??0}})</td>
            </tr>
            @endforeach

        </tbody>

        <!-- <td><a href="#" class="axil-btn view-btn">View</a></td> -->
    </table>


</div>
