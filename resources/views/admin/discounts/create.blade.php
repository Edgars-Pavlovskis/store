@extends('layouts.backend')

@section('css')
  <!-- Page JS Plugins CSS  -->
  <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">

@endsection

@section('js_end')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>


   <!-- Page JS Helpers (Tooltip) -->
   <script type="module">
    One.helpersOnLoad(['js-flatpickr', 'jq-select2']);
  </script>

@endsection

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">{{__('admin.navi.discounts')}}</h1>
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

    @livewire('show-discount-constructor', ['type' => $type, 'id' => $id])

  </div>
  <!-- END Page Content -->
@endsection