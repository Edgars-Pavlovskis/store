<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">{{__('clients.logs')}}</h3>
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

        </tbody>
        </table>
    </div>
</div>
