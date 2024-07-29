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


@vite(['resources/js/pages/datatables.js'])

@endsection

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            {{__('admin.attributes.show')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            {{__('admin.attributes.group')}}: <b>@if (isset($current)) {{$current->title}} @else {{__('admin.attributes.maingroup')}} @endif</b>
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/admin/categories/show/">{{__('admin.categories.title')}}</a>
            </li>
            @if (isset($current->id))
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="/admin/categories/show/{{isset($current->alias)?$current->alias:''}}">{{$current->title}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    {{__('admin.attributes.show')}}
                </li>

            @else
                <li class="breadcrumb-item" aria-current="page">
                    {{__('admin.attributes.show')}}
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    {{__('admin.attributes.maingroup')}}
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
    <a href="/admin/categories/show/{{isset($current->alias)?$current->alias:''}}">
        <button type="button" class="btn btn-alt-secondary me-1 mb-3">
            <i class="fa-solid fa-caret-left me-1"></i> {{__('admin.goback')}}
        </button>
    </a>

    <a href="/admin/categories/attributes/manage/{{isset($current->alias)?$current->alias:'root'}}">
        <button type="button" class="btn btn-alt-success me-1 mb-3">
            <i class="fa fa-fw fa-plus me-1"></i> {{__('admin.attributes.add')}}
        </button>
    </a>

    <!-- Dynamic Table Responsive -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
            {{__('admin.attributes.list')}} <small>{{__('admin.attributes.in-choosed-category')}}</small>
            </h3>
        </div>
        <div class="block-content block-content-full pt-2">

            <!-- DataTables init on table by adding .js-dataTable-responsive class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
            <thead>
                <tr>
                <th>{{__('admin.attributes.name')}}</th>
                <th>{{__('admin.attributes.type')}}</th>
                <th style="width: 5%;">{{__('admin.actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attributes as $attribute)
                    <tr>
                        <td class="fw-semibold fs-sm"><a href="{{ route('attributes-manage', ['alias'=>$attribute->group ?? 'root', 'id'=>$attribute->id]) }}">{{$attribute->name}}</a></td>
                        <td>
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{__('admin.attributes.input-type-'.$attribute->type)}}</span>
                        </td>

                        <td class="text-center">
                            <div class="btn-group">
                                <a class="me-1" href="{{ route('attributes-manage', ['alias'=>$attribute->group ?? 'root', 'id'=>$attribute->id]) }}">
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('admin.tooltips.edit')}}">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </a>
                                <a href="javascript:void(0);">
                                    <button type="button" class="btn btn-sm btn-alt-secondary" title="{{__('admin.tooltips.delete')}}" onclick="Livewire.dispatch('confirmDeleteExternal', { itemId: '{{$attribute->id}}', itemName: '{{$attribute->name}}', model: 'Attributes', parent: '{{$attribute->group}}' })">
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
