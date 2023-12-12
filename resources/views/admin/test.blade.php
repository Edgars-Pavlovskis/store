@extends('layouts.backend')


@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            Test Example
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Plugin Integration
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="javascript:void(0)">Examples</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              DataTables
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
    <!-- Info -->
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Plugin Example</h3>
      </div>
      <div class="block-content fs-sm text-muted">
        <p>
          This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.
        </p>
      </div>
    </div>
    <!-- END Info -->

  </div>
  <!-- END Page Content -->
@endsection
