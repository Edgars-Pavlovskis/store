@extends('layouts.backend')

@section('js')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>
  <script src="{{ asset('js/plugins/inputs/patterns.js') }}"></script>

 <!-- Page JS Helpers (CKEditor 5 plugins) -->
  <script type="module">One.helpersOnLoad(['js-ckeditor5']);</script>

  <script>
    $( document ).ready(function() {
        setupFloatInputValidation('price-txt');
        setupIntegerInputValidation('stock-txt');
    });
  </script>
@endsection



@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            {{__('admin.products.creating')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            {{__('admin.categories.data')}}: <b>{{$alias}}</b>
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/admin/categories">{{__('admin.categories.title')}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a class="link-fx" href="/admin/categories/show/{{ $alias }}">{{$categoryTitle->title}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{__('admin.products.new')}}
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
    <a href="{{ URL::previous() }}">
        <button type="button" class="btn btn-alt-secondary me-1 mb-3">
            <i class="fa-solid fa-caret-left me-1"></i> {{__('admin.goback')}}
        </button>
    </a>



    <!-- Your Block -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">{{__('admin.products.data')}}</h3>
        </div>
        <div class="block-content block-content-full">
          <form action="/admin/products/create/{{ $alias }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="row">
              <div class="col-lg-4">
                <p class="fs-sm text-muted">
                    {{__('admin.products.input-maindata')}}
                </p>
              </div>
              <div class="col-lg-8 col-xl-5">

                <div class="block block-rounded">

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code-txt" name="code" placeholder="{{__('admin.products.input-code')}}" value="{{(null!==old('code'))?old('code'):'product_'.time()}}">
                        <label for="code-txt">{{__('admin.products.input-code')}} @error('code')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror <span class="text-danger">*</span></label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="inner-code-txt" name="inner_code" placeholder="{{__('admin.products.input-inner-code')}}" value="{{(null!==old('inner_code'))?old('inner_code'):''}}">
                        <label for="inner-code-txt">{{__('admin.products.input-inner-code')}}</label>
                    </div>

                    <ul class="nav nav-tabs nav-tabs-alt justify-content-end" role="tablist">
                        @foreach (getLocales() as $lang)
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link @if($loop->index == 0) active @endif" id="products-data-tab-{{$lang}}" data-bs-toggle="tab" data-bs-target="#products-data-content-{{$lang}}" role="tab" aria-controls="products-data-content-{{$lang}}" aria-selected="true">{{strtoupper($lang)}}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="block-content tab-content">
                        @foreach (getLocales() as $lang)
                            <div class="tab-pane @if($loop->index == 0) active @endif" id="products-data-content-{{$lang}}" role="tabpanel" aria-labelledby="products-data-tab-{{$lang}}" tabindex="0">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="title-txt-{{$lang}}" name="title[{{$lang}}]" placeholder="Enter product title" value="{{ old('title.'.$lang) }}">
                                    <label for="title-txt-{{$lang}}">{{__('admin.products.input-title')}} [{{$lang}}]</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" id="descr-txt-{{$lang}}" name="description[{{$lang}}]" style="height: 200px" placeholder="Enter product description">{{ old('description.'.$lang) }}</textarea>
                                    <label for="descr-txt-{{$lang}}">{{__('admin.products.input-description')}} [{{$lang}}]</label>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="js-ckeditor5-classic-{{$lang}}">{{__('admin.products.input-fulltext')}} [{{$lang}}]</label>
                                    <textarea name="details[{{$lang}}]" id="js-ckeditor5-classic-{{$lang}}" class="js-ckeditor5-classic" cols="30" rows="10"></textarea>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <hr>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price-txt" name="price" placeholder="{{__('admin.products.input-price')}}" value="{{(null!==old('price'))?old('price'):'0'}}">
                        <label for="price-txt">{{__('admin.products.input-price')}} @error('price')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror <span class="text-danger">*</span></label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock-txt" name="stock" placeholder="{{__('admin.products.input-stock')}}" value="{{(null!==old('stock'))?old('stock'):'0'}}">
                        <label for="stock-txt">{{__('admin.products.input-stock')}} @error('stock')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror <span class="text-danger">*</span></label>
                    </div>

                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1" id="active-checkbox" name="active" {{ (old('active') == null || old('active') == 1) ? 'checked' : '' }} >
                        <label class="form-check-label" for="active-checkbox">{{__('admin.products.switch-active')}}?</label>
                    </div>

                    <div class="mb-4 mt-4">
                        <label class="form-label" for="product-image-file">{{__('admin.products.fileinput-image')}} @error('image')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="product-image-file" name="image">
                    </div>





                </div>




                <div class="block-content tab-content" style="text-align:center;">
                    <button type="submit" class="btn  btn-primary me-1 mb-3">
                        <i class="fa fa-fw fa-check me-1"></i> {{__('admin.add')}}
                    </button>
                </div>


              </div>
            </div>
          </form>



        </div>
      </div>
    <!-- END Your Block -->




  </div>
  <!-- END Page Content -->
@endsection
