@extends('layouts.backend')



@section('css')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">

  <style>
    .blue-sortable-class a {
        border: 1px solid rgba(13, 65, 102, 0.45);
    }
  </style>
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
  <script src="{{ asset('js/plugins/sorting/Sortable.min.js') }}"></script>
  <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>

   <!-- Page JS Helpers (Tooltip) -->
   <script type="module">
    One.helpersOnLoad(['bs-tooltip', 'jq-select2']);
  </script>




@vite(['resources/js/pages/datatables.js'])

@endsection


@section('search')
    <form class="d-none d-md-inline-block" action="{{route('categories-search-product')}}" method="GET">

        <div class="input-group input-group-sm">
        <input type="text" class="form-control form-control-alt" placeholder="Search.." value="{{$search}}" id="page-header-search-input2" name="search">
        <span class="input-group-text border-0">
            <i class="fa fa-fw fa-search"></i>
        </span>
        </div>
    </form>
@endsection


@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            {{__('admin.products.products-search')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            {{__('admin.products.search-term')}}: "{{$search}}"
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">

            <li class="breadcrumb-item">
                {{__('admin.products.list')}}
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{__('admin.products.search-results')}}
            </li>

            <li class="breadcrumb-item" aria-current="page">
                "{{$search}}"
            </li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->



  <!-- Page Content -->
  <div class="content">



          <!-- Dynamic Table Responsive -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                {{__('admin.products.list')}} <small>{{__('admin.products.search-results')}}</small>
              </h3>
            </div>
            <div class="block-content block-content-full pt-2">

              <!-- DataTables init on table by adding .js-dataTable-responsive class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
              <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 80px;"><i class="fas fa-image"></i></th>
                    <th class="text-center" style="width: 80px;">ID</th>
                    <th>{{__('admin.products.input-title')}}</th>
                    <th class="text-center">{{__('admin.products.input-price')}}</th>
                    <!-- <th class="text-center">{{__('admin.products.input-stock')}}</th> -->
                    <th class="text-center">{{__('admin.products.input-inner-code')}}</th>
                    <th class="text-center">{{__('admin.actions')}}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="text-center fs-sm"><img class="img-avatar img-avatar48" src="/storage/products/{{$product->image}}" onerror="this.src='/assets/img/default-product.png';" alt=""></td>
                            <td class="text-center fs-sm">{{$product->id}}</td>
                            <td class="fw-semibold fs-sm">
                                <a @if(!$product->active) class="text-danger" @endif href="{{ route('products-edit', ['alias'=>$product->code]) }}">{{$product->title}}</a>
                                <br>
                                @if ($product->new)
                                    <span class="badge bg-primary">{{__('admin.products.status.new')}}</span>
                                @endif
                                @if ($product->special)
                                    <span class="badge bg-success">{{__('admin.products.status.special')}}</span>
                                @endif
                                @if ($product->discount > 0)
                                    <span class="badge bg-danger">-{{$product->discount}}%</span>
                                @endif
                            </td>
                            <td class="fs-sm text-center">
                                {{number_format($product->price, 2)}} €
                            </td>
                            <!--
                            <td class="text-center">
                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">{{$product->stock}}</span>
                            </td>
                            -->
                            <td class="text-center">
                            <span class="text-muted fs-sm">{{$product->inner_code}}</span>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="me-1" href="{{ route('products-edit', ['alias'=>$product->code]) }}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('admin.tooltips.edit')}}">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <a class="me-1" href="{{ route('products-attributes', ['alias'=>$product->code]) }}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('admin.tooltips.attributes')}}">
                                            <i class="fa-regular fa-rectangle-list"></i>
                                        </button>
                                    </a>
                                    <a class="me-1" href="{{ route('products-variations', ['alias'=>$product->code]) }}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('admin.tooltips.variations')}}">
                                            <i class="fa-solid fa-shuffle"></i>
                                        </button>
                                    </a>
                                    <a class="me-1" href="{{ route('products-gallery', ['alias'=>$product->code]) }}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('admin.tooltips.gallery')}}">
                                            <i class="fa-regular fa-images"></i>
                                        </button>
                                    </a>
                                    <a class="me-1" href="{{ route('products-copy', ['alias'=>$product->code]) }}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('admin.tooltips.copy')}}">
                                            <i class="fa-regular fa-copy"></i>
                                        </button>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" title="{{__('admin.tooltips.delete')}}" onclick="Livewire.dispatch('confirmDeleteExternal', { itemId: '{{$product->id}}', itemName: '{{$product->title}}', model: 'Products', parent: '{{$product->parent}}' })">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- Dynamic Table Responsive -->






  </div>
  <!-- END Page Content -->
  @livewire('delete-confirmation')
@endsection
