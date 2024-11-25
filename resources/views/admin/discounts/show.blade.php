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
          <h1 class="h3 fw-bold mb-1">{{__('admin.navi.banners')}}</h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            {{__('admin.navi.discounts-list')}}
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/discounts/show/">{{__('admin.navi.discounts')}}</a>
            </li>

            <li class="breadcrumb-item" aria-current="page">
                {{__('admin.navi.discounts-list')}}
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->



  <!-- Page Content -->
  <div class="content">

    <a href="/discounts/create/">
        <button type="button" class="btn btn-alt-success me-1 mb-3">
            <i class="fa fa-fw fa-plus me-1"></i> {{__('admin.discounts.add')}}
        </button>
    </a>



     <!-- All Banners Table -->
     <div class="table-responsive">
        <table class="table table-borderless table-striped table-vcenter">
          <thead>
            <tr>
              <th>{{__('discounts.type')}}</th>
              <th class="d-none d-xl-table-cell">{{__('discounts.title')}}</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($discounts as $discount)
                <tr>
                <td>
                    <span class="badge {{config('shop.discounts.templates.'.$discount->type.'.color')}}">{{config('shop.discounts.templates.'.$discount->type.'.title.'.App()->currentLocale()??config('shop.languages.default'))??$discount->type}}</span>
                </td>
                <td class="d-none d-xl-table-cell fs-sm">
                    <strong><a href="{{route('discounts-edit',['id'=>$discount->id])}}">{{$discount->title}}</a></strong>
                </td>
                <td class="text-center">
                    <a class="btn btn-sm btn-alt-secondary" title="{{__('admin.tooltips.delete')}}" onclick="Livewire.dispatch('confirmDeleteExternal', { itemId: '{{$discount->id}}', itemName: '{{$discount->title}}', model: 'Discount', parent: '' })">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- END All Orders Table -->





  </div>
  <!-- END Page Content -->
  @livewire('delete-confirmation')
@endsection
