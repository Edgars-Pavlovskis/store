@extends('layouts.backend')


@section('css')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endsection

@section('js')
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
                {{$current->title[App::currentLocale()]}}
                <a href="{{ route('categories-edit', ['alias'=>$current->alias]) }}"><i class="fa-solid fa-pen-to-square ms-2"></i></a>
            @else
                Categories
            @endif
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            @if (isset($current->id))
                {{$current->description[App::currentLocale()]}}
            @else
                Create new preoducts category
            @endif
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="javascript:void(0)">Categories</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              View
            </li>

            @if (isset($current->id))
                <li class="breadcrumb-item" aria-current="page">
                    {{$current->title[App::currentLocale()]}}
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
                <i class="fa-solid fa-caret-left me-1"></i> Go Upper
            </button>
        </a>
    @endif

    <a href="/admin/categories/create/{{isset($current->alias)?$current->alias:''}}">
        <button type="button" class="btn btn-alt-success me-1 mb-3">
            <i class="fa fa-fw fa-plus me-1"></i> Add Category
        </button>
    </a>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="/admin/categories/show/{{isset($category->alias)?$category->alias:''}}">
                <div class="block-content block-content-full d-flex flex-row-reverse align-items-center justify-content-between">
                    <img class="img-avatar img-avatar48" src="/storage/categories/{{$category->image}}" alt="">
                    <div class="me-3">
                        <p class="fw-semibold mb-0">{{$category->title[App::currentLocale()]}}</p>
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
                Dynamic Table <small>DataTables Responsive Mode</small>
              </h3>
            </div>
            <div class="block-content block-content-full pt-2">
                <a href="/admin/products/create/{{$current->alias}}">
                    <button type="button" class="btn btn-alt-success me-1 mb-3">
                        <i class="fa fa-fw fa-plus me-1"></i> Add Product
                    </button>
                </a>
              <!-- DataTables init on table by adding .js-dataTable-responsive class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
              <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                <thead>
                  <tr>
                    <th class="text-center"></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th style="width: 15%;">Access</th>
                    <th style="width: 15%;">Registered</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fs-sm">1</td>
                    <td class="fw-semibold fs-sm">Betty Kelley</td>
                    <td class="fs-sm">customer1@example.com</td>
                    <td>
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Trial</span>
                    </td>
                    <td>
                      <span class="text-muted fs-sm">8 days ago</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fs-sm">2</td>
                    <td class="fw-semibold fs-sm">Danielle Jones</td>
                    <td class="fs-sm">customer2@example.com</td>
                    <td>
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                    </td>
                    <td>
                      <span class="text-muted fs-sm">6 days ago</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fs-sm">3</td>
                    <td class="fw-semibold fs-sm">Andrea Gardner</td>
                    <td class="fs-sm">customer3@example.com</td>
                    <td>
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                    </td>
                    <td>
                      <span class="text-muted fs-sm">4 days ago</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fs-sm">4</td>
                    <td class="fw-semibold fs-sm">Jose Parker</td>
                    <td class="fs-sm">customer4@example.com</td>
                    <td>
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Business</span>
                    </td>
                    <td>
                      <span class="text-muted fs-sm">5 days ago</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center fs-sm">5</td>
                    <td class="fw-semibold fs-sm">Jose Parker</td>
                    <td class="fs-sm">customer5@example.com</td>
                    <td>
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">VIP</span>
                    </td>
                    <td>
                      <span class="text-muted fs-sm">6 days ago</span>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
          <!-- Dynamic Table Responsive -->

    @endif













  </div>
  <!-- END Page Content -->
@endsection
