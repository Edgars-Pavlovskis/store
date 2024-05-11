@extends('layouts.backend')



@section('css')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">

@endsection

@section('js_end')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

   <!-- Page JS Helpers (Tooltip) -->
  <script type="module">
    One.helpersOnLoad(['bs-tooltip']);
  </script>


@vite(['resources/js/pages/datatables.js'])

@endsection

@section('content')

  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
                {{__('orders.navi.main')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                {{__('orders.navi.all')}}
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/orders/show/">{{__('orders.navi.main')}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{__('orders.list')}}
            </li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->



  <!-- Page Content -->
  <div class="content">


     <!-- All Orders -->
     <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('orders.list')}} <small>{{__('orders.list-additional')}}</small>
            </h3>
          <div class="block-options">
            <div class="dropdown">
              <button type="button" class="btn-block-option" id="dropdown-ecom-filters" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (is_numeric($filter) && $filter >= 0)
                    {{__('orders.status.'.$filter)}} <i class="fa fa-angle-down ms-1"></i>
                @else
                    {{__('orders.filter-by-status')}} <i class="fa fa-angle-down ms-1"></i>
                @endif
              </button>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                @foreach (config('shop.backend.order-statuses') as $index => $status)
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('orders-show', ['filter' => $index]) }}">
                        {{__('orders.status.'.$index)}}
                        <span class="badge {{$status['bg-class']}} rounded-pill">{{$ordersByStatus[$index]??0}}</span>
                    </a>
                @endforeach
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('orders-show') }}">
                    {{__('orders.show-all')}}
                    <span class="badge bg-primary rounded-pill">{{$totalOrders}}</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="block-content">
          <!-- Search Form -->
          <form action="{{ url()->current() }}" method="GET" >
            <div class="mb-4">
              <div class="input-group">
                <input type="text" class="form-control form-control-alt" id="txt-orders-search" name="search" placeholder="{{__('orders.search')}}.." value="{{$search}}">
                <span class="input-group-text bg-body border-0">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </div>
          </form>
          <!-- END Search Form -->

          <!-- All Orders Table -->
          <div class="table-responsive">
            <table class="table table-borderless table-striped table-vcenter">
              <thead>
                <tr>
                  <th class="text-center" style="width: 100px;">#</th>
                  <th class="d-none d-sm-table-cell text-center">{{__('orders.registred')}}</th>
                  <th>{{__('orders.current-status')}}</th>
                  <th class="d-none d-xl-table-cell">{{__('orders.customer')}}</th>
                  <th class="d-none d-xl-table-cell text-center">{{__('orders.table.products')}}</th>
                  <th class="d-none d-sm-table-cell text-end">{{__('orders.table.value')}}</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $order)
                    <tr>
                    <td class="text-center fs-sm">
                        <a class="fw-semibold" href="{{route('show-order',['key'=>$order->key])}}">
                            <strong>{{date_format($order->created_at,"dmY")}}-{{$order->id}}</strong>
                        </a>
                    </td>
                    <td class="d-none d-sm-table-cell text-center fs-sm">{{date_format($order->created_at,"d/m/Y H:i")}}</td>
                    <td>
                        <span class="badge {{config('shop.backend.order-statuses.'.$order->status.'.bg-class')}}">{{__('orders.status.'.$order->status)}}</span> <!--bg-danger  bg-success  bg-info  bg-warning -->
                    </td>
                    <td class="d-none d-xl-table-cell fs-sm">
                        <strong>{{$order->name}} {{$order->surname}}</strong> [{{$order->email}}]
                    </td>
                    <td class="d-none d-xl-table-cell text-center fs-sm">
                        {{count($order->cart)}}
                    </td>
                    <td class="d-none d-sm-table-cell text-end fs-sm">
                        <strong>{{number_format($order->total, 2)}} €</strong>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-alt-secondary" href="{{route('show-order', ['key' => $order->key])}}" data-bs-toggle="tooltip" title="{{__('orders.show')}}">
                            <i class="fa fa-fw fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" title="{{__('admin.tooltips.delete')}}" onclick="Livewire.dispatch('confirmDeleteExternal', { itemId: '{{$order->id}}', itemName: '{{__('orders.order.no')}} #{{date_format($order->created_at,'dmY')}}-{{$order->id}}', model: 'Orders', parent: '' })">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                    </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- END All Orders Table -->


            @if ($orders->lastPage() > 1)
                <nav aria-label="Photos Search Navigation">
                    <ul class="pagination pagination-sm justify-content-end mt-2">
                        <li class="page-item {{ $orders->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['page' => $orders->currentPage() - 1])) }}"><span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span></a>
                        </li>
                        @for ($i = 1; $i <= $orders->lastPage(); $i++)
                            <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['page' => $i])) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $orders->currentPage() == $orders->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['page' => $orders->currentPage() + 1])) }}"><span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span></a>
                        </li>
                    </ul>
                </nav>
            @endif


        </div>
      </div>
      <!-- END All Orders -->



  </div>
  <!-- END Page Content -->
  @livewire('delete-confirmation')
@endsection
