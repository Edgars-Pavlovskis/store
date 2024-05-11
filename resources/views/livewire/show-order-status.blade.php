<div class="row">

    @foreach (config('shop.backend.order-statuses') as $index => $status)
        <div class="col">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)" wire:click="changeStatus({{$index}})">
            <div class="block-content block-content-full">
                <div class="item item-circle
                    @if($order->status == $index) {{$status['active-bg']}} @else bg-body @endif
                    mx-auto">
                    <i class="
                        @if($order->status == $index) {{$status['active-icon']}} @else fa fa-times text-muted @endif
                    "></i>
                </div>
            </div>
            <div class="block-content py-2 bg-body-light">
                <p class="fw-medium fs-sm
                    @if($order->status == $index) {{$status['active-text']}} @else text-muted @endif
                    mb-0">
                    {{__('orders.status.'.$index)}}
                </p>
            </div>
            </a>
        </div>
    @endforeach

<!--
    <div class="col-6 col-lg-3">
        <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
        <div class="block-content block-content-full">
            <div class="item item-circle bg-success-light mx-auto">
            <i class="fa fa-check text-success"></i>
            </div>
        </div>
        <div class="block-content py-2 bg-body-light">
            <p class="fw-medium fs-sm text-success mb-0">
            Payment
            </p>
        </div>
        </a>
    </div>
    <div class="col-6 col-lg-3">
        <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
        <div class="block-content block-content-full">
            <div class="item item-circle bg-warning-light mx-auto">
            <i class="fa fa-sync fa-spin text-warning"></i>
            </div>
        </div>
        <div class="block-content py-2 bg-body-light">
            <p class="fw-medium fs-sm text-warning mb-0">
            Packaging
            </p>
        </div>
        </a>
    </div>
    <div class="col-6 col-lg-3">
        <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
        <div class="block-content block-content-full">
            <div class="item item-circle bg-body mx-auto">
            <i class="fa fa-times text-muted"></i>
            </div>
        </div>
        <div class="block-content py-2 bg-body-light">
            <p class="fw-medium fs-sm text-muted mb-0">
            Delivery
            </p>
        </div>
        </a>
    </div>
-->

</div>
