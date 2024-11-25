@extends('layouts.backend')


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


    <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">{{__('admin.navi.discount-type')}}</h3>
        </div>
        <div class="block-content block-content-full">
          <form action="{{route('discounts-submit-type')}}" method="POST" >
            @csrf
            <div class="row">
              <div class="col-lg-4">
                <p class="fs-sm text-muted">
                    {{__('admin.navi.discount-type-text')}}
                    @error('type')<div class="alert alert-danger alert-dismissible" role="alert"><p class="mb-0">{{$message}}</p></div>@enderror
                </p>
              </div>
              <div class="col-lg-8">
                <div class="row items-push">

                    @foreach ($types as $key => $type)
                        <div class="col-md-12 mb-2">
                            <div class="form-check form-block">
                            <input type="radio" class="form-check-input" id="discount-type-{{$key}}" name="type" value="{{$key}}">
                            <label class="form-check-label" for="discount-type-{{$key}}">
                                <span class="d-block fw-normal text-center ">
                                <span class="fs-4 fw-semibold">{{$type['title'][App()->currentLocale()??config('shop.languages.default')]}}</span>
                                <span class="d-block ">{{$type['description'][App()->currentLocale()??config('shop.languages.default')]??''}}</span>
                                </span>
                            </label>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="block-content tab-content" style="text-align:center;">
                    <button type="submit" class="btn  btn-primary me-1 mb-3">
                        <i class="fa fa-fw fa-check me-1"></i> {{__('admin.confirm')}}
                    </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>


  </div>
  <!-- END Page Content -->
@endsection
