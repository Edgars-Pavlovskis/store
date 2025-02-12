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
                {{__('clients.navi.main')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                {{__('clients.navi.all')}}
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/clients/show/">{{__('clients.navi.main')}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{__('clients.list')}}
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
                {{__('clients.list')}} <small>{{__('clients.list-additional')}}</small>
            </h3>
          <div class="block-options">
            <div class="dropdown">
              <button type="button" class="btn-block-option" id="dropdown-ecom-filters" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (is_numeric($filter) && $filter >= 0)
                    {{config('discounts.list.' . $filter . '.title.'.App()->currentLocale(), 'notitle')}} <i class="fa fa-angle-down ms-1"></i>
                @else
                    {{__('clients.filter-by-discount')}} <i class="fa fa-angle-down ms-1"></i>
                @endif
              </button>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                @foreach (config('discounts.list') as $index => $discount)
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('clients-show', ['filter' => $index]) }}">
                        {{config('discounts.list.' . $index . '.title.'.App()->currentLocale(), 'notitle')}}
                        &nbsp;<span class="badge {{$discount['bg-class']}} rounded-pill">{{$clientsByDiscount[$index]??0}}</span>
                    </a>
                @endforeach
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('clients-show') }}">
                    {{__('clients.show-all')}}
                    <span class="badge bg-primary rounded-pill">{{$totalClients}}</span>
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
                <input type="text" class="form-control form-control-alt" id="txt-clients-search" name="search" placeholder="{{__('clients.search')}}.." value="{{$search}}">
                <span class="input-group-text bg-body border-0">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </div>
          </form>
          <!-- END Search Form -->

          <!-- All Clients Table -->
          <div class="table-responsive">
            <table class="table table-borderless table-striped table-vcenter">
              <thead>
                <tr>
                  <th class="d-xl-table-cell">{{__('clients.email')}}</th>
                  <th class="d-xl-table-cell">{{__('clients.name')}}</th>
                  <th class="d-none d-xl-table-cell">{{__('clients.current-discount')}}</th>
                  <th class="d-none d-sm-table-cell text-center">{{__('clients.registred')}}</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>

                @foreach ($clients as $client)
                    <tr>
                        <td class="d-xl-table-cell fs-sm">
                            <a class="fw-semibold" href="{{route('show-client',['email'=>$client->email])}}">
                                <strong>{{$client->email}}</strong>
                            </a>
                        </td>
                        <td class="d-xl-table-cell fs-sm">
                            <strong>{{$client->name}}</strong>
                        </td>
                        <td class="d-none d-sm-table-cell text-center fs-sm">
                            <span class="badge {{config('discounts.list.'.$client->discount.'.bg-class')}}">{{config('discounts.list.' . $client->discount . '.title.'.App()->currentLocale(), 'notitle')}}</span>
                        </td>
                        <td class="d-none d-sm-table-cell text-center fs-sm">{{date_format($client->created_at,"d/m/Y H:i")}}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-alt-secondary" href="{{route('show-client', ['email' => $client->email])}}" data-bs-toggle="tooltip" title="{{__('clients.show')}}">
                                <i class="fa fa-fw fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-alt-secondary" title="{{__('admin.tooltips.delete')}}" onclick="Livewire.dispatch('confirmDeleteExternal', { itemId: '{{$client->id}}', itemName: '{!! json_encode($client->name . ' [' . $client->email . ']') !!}', model: 'User', parent: '' })">
                                <i class="fa fa-fw fa-times"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- END All CLients Table -->


            @if ($clients->lastPage() > 1)
                <nav aria-label="Photos Search Navigation">
                    <ul class="pagination pagination-sm justify-content-end mt-2">
                        <li class="page-item {{ $clients->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['page' => $clients->currentPage() - 1])) }}"><span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span></a>
                        </li>
                        @for ($i = 1; $i <= $clients->lastPage(); $i++)
                            <li class="page-item {{ $clients->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['page' => $i])) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $clients->currentPage() == $clients->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['page' => $clients->currentPage() + 1])) }}"><span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span></a>
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
