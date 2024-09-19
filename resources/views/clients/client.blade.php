@extends('layouts.backend')

<style>
    .order-cols .row {
        overflow: hidden;
    }
    .order-cols .row [class*="col-"]{
        margin-bottom: -99999px;
        padding-bottom: 99999px;
    }
</style>

@section('content')

  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
               {{$client->name}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                <strong>{{__('clients.email')}}</strong>: {{$client->email}}
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/clients/show/">{{__('clients.navi.main')}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <strong>{{$client->name}}</strong> // {{$client->email}}
            </li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->



  <!-- Page Content -->
  <div class="content">
    <a href="/clients/show">
        <button type="button" class="btn btn-alt-secondary me-1 mb-3">
            <i class="fa-solid fa-caret-left me-1"></i> {{__('clients.navi.all')}}
        </button>
    </a>
    <!-- Page Content -->
    <div class="content">

        <!-- statuses -->
        @livewire('show-client-discount', ['client' => $client])
        <!-- END statuses -->

        @livewire('show-client-info', ['client' => $client])

        <!-- Log Messages -->
        @livewire('show-client-logs', ['id' => $client->id])
        <!-- END Log Messages -->

    </div>
    <!-- END Page Content -->




  </div>
  <!-- END Page Content -->

@endsection
