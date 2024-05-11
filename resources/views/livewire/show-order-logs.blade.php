<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">{{__('orders.logs')}}</h3>
    </div>
    <div class="block-content">
        <table class="table table-borderless table-striped table-vcenter fs-sm">
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td class="fs-base" style="width: 80px;">
                        <span class="badge bg-primary">{{__('orders.order.text')}}</span>
                    </td>
                    <td style="width: 220px;">
                        <span class="fw-semibold">{{date_format($log->created_at,"d/m/Y H:i")}}</span>
                    </td>
                    <td>
                        <a href="javascript:void(0)">{{$log->name}}</a>
                    </td>
                    <td class="">{{$log->text}}</td>
                </tr>
            @endforeach

            <!--
            <tr>
            <td class="fs-base">
                <span class="badge bg-primary">Order</span>
            </td>
            <td>
                <span class="fw-semibold">January 17, 2020 - 17:36</span>
            </td>
            <td>
                <a href="javascript:void(0)">Support</a>
            </td>
            <td class="text-warning">Preparing Order</td>
            </tr>
            <tr>
            <td class="fs-base">
                <span class="badge bg-success">Payment</span>
            </td>
            <td>
                <span class="fw-semibold">January 16, 2020 - 18:10</span>
            </td>
            <td>
                <a href="javascript:void(0)">John Parker</a>
            </td>
            <td class="text-success">Payment Completed</td>
            </tr>
            <tr>
            <td class="fs-base">
                <span class="badge bg-danger">Email</span>
            </td>
            <td>
                <span class="fw-semibold">January 16, 2020 - 10:35</span>
            </td>
            <td>
                <a href="javascript:void(0)">Support</a>
            </td>
            <td class="text-danger">Missing payment details. Email was sent and awaiting for payment before processing</td>
            </tr>
        -->

        </tbody>
        </table>
    </div>
</div>
