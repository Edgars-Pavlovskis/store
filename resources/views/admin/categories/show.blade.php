@extends('layouts.backend')



@section('css')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">

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

   <!-- Page JS Helpers (Tooltip) -->
   <script type="module">
    One.helpersOnLoad(['bs-tooltip']);
  </script>


  <script>
    $( document ).ready(function() {
        var el = document.getElementById('sortable-categories');
        var sortable = Sortable.create(el,{
            animation: 150,
            ghostClass: 'blue-sortable-class',
            easing: "cubic-bezier(1, 0, 0, 1)",
            onUpdate: function (/**Event*/evt) {
                var newOrder = Array.from(evt.from.children).map(function (item, index) {
                    // Update the order attribute on the element
                    item.setAttribute('data-order', index + 1);
                    return {
                        id: item.getAttribute('catID'), // Assuming you have a data-id attribute
                        order: index + 1,
                    };
                });
                $.ajax({ url: '{{ route("categories-update-sorting") }}', type: 'POST', data: { "_token": "{{ csrf_token() }}", order: newOrder } });
            },
        });
    });
  </script>
  <!-- Page JS  Code -->


@vite(['resources/js/pages/datatables.js'])

@endsection

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            @if (isset($current->id))
                {{$current->title}}
                <a href="{{ route('categories-edit', ['alias'=>$current->alias]) }}"><i class="fa-solid fa-pen-to-square fa-xs ms-2"></i></a>
                <a href="javascript:void()" onclick="Livewire.dispatch('confirmDeleteExternal', { itemId: '{{$current->id}}', itemName: '{{$current->title}}', model: 'Categories', parent: '{{$current->parent_alias}}' })"><i class="fa fa-trash fa-xs ms-2"></i></a>
            @else
                {{__('admin.categories.title')}}
            @endif
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            @if (isset($current->id))
                {{$current->description}}
            @else
                {{__('admin.categories.description')}}
            @endif
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/admin/categories/show/">{{__('admin.categories.title')}}</a>
            </li>

            @if (isset($current->id))
                <li class="breadcrumb-item" aria-current="page">
                    {{$current->title}}
                </li>
            @else
                <li class="breadcrumb-item" aria-current="page">
                    {{__('admin.list')}}
                </li>
            @endif
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->



  <!-- Page Content -->
  <div class="content">
    @if (isset($current->id))
        <a href="/admin/categories/show/{{isset($current->parent_alias)?$current->parent_alias:''}}">
            <button type="button" class="btn btn-alt-secondary me-1 mb-3">
                <i class="fa-solid fa-caret-left me-1"></i> {{__('admin.goback')}}
            </button>
        </a>
    @endif

    <a href="/admin/categories/create/{{isset($current->alias)?$current->alias:''}}">
        <button type="button" class="btn btn-alt-success me-1 mb-3">
            <i class="fa fa-fw fa-plus me-1"></i> {{__('admin.categories.add')}}
        </button>
    </a>

    <a href="/admin/categories/attributes/{{isset($current->alias)?$current->alias:''}}">
        <button type="button" class="btn btn-alt-info me-1 mb-3">
            <i class="fa-solid fa-sliders me-1"></i> {{__('admin.attributes.show')}}
        </button>
    </a>

    <div id="sortable-categories" class="row">
        @foreach ($categories as $category)
            <div class="col-md-6 col-xl-3" catID="{{$category->id}}">
                <a class="block block-rounded block-link-shadow" href="/admin/categories/show/{{isset($category->alias)?$category->alias:''}}">
                <div class="block-content block-content-full d-flex flex-row-reverse align-items-center justify-content-between">
                    <img class="img-avatar img-avatar48" src="/storage/categories/{{$category->image}}" alt="">
                    <div class="me-3">
                        <p class="fw-semibold mb-0">{{$category->title}}</p>
                        <p class="fs-sm fw-medium text-muted mb-0">
                            {{$category->alias}}
                        </p>

                    </div>
                </div>
                </a>
            </div>
        @endforeach
    </div>




    @if (isset($current->id))

          <!-- Dynamic Table Responsive -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                {{__('admin.products.list')}} <small>{{__('admin.products.in-choosed-category')}}</small>
              </h3>
            </div>
            <div class="block-content block-content-full pt-2">
                <a href="{{ route('products-create', ['alias'=>$current->alias]) }}">
                    <button type="button" class="btn btn-sm btn-success me-1 mb-3">
                        <i class="fa fa-fw fa-plus me-1"></i> {{__('admin.products.add')}}
                    </button>
                </a>

                @if ($showinnactive)
                    <a href="{{ route('categories-index', ['alias'=>$current->alias, 'showinnactive'=>'']) }}">
                        <button type="button" class="btn btn-sm btn-secondary me-1 mb-3">
                            <i class="fa-solid fa-eye me-1"></i> {{__('admin.Show all')}}
                        </button>
                    </a>
                @else
                    <a href="{{ route('categories-index', ['alias'=>$current->alias, 'showinnactive'=>'show-innactive']) }}">
                        <button type="button" class="btn btn-sm btn-secondary me-1 mb-3">
                            <i class="fa-solid fa-eye-slash me-1"></i> {{__('admin.Show innactive')}}
                        </button>
                    </a>
                @endif





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

    @endif








  </div>
  <!-- END Page Content -->
  @livewire('delete-confirmation')
@endsection
