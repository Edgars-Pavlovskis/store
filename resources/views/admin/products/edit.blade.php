@extends('layouts.backend')

@section('css')
  <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
@endsection

@section('js_end')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>
  <script src="{{ asset('js/plugins/inputs/patterns.js') }}"></script>
  <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>

 <!-- Page JS Helpers (CKEditor 5 plugins) -->
  <script type="module">One.helpersOnLoad(['js-ckeditor5', 'jq-select2']);</script>

  <script>
    $( document ).ready(function() {
        setupFloatInputValidation('price-txt');
        setupIntegerInputValidation('stock-txt');
        setupIntegerInputValidation('discount-txt');
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
            {{__('admin.products.editing')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            {{__('admin.products.input-code')}}: <b>{{$product->code}}</b>
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/admin/categories/show/{{$product->parent}}">{{__('admin.products.list')}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{$product->title[App::currentLocale()]}}
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{__('admin.products.editing')}}
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
            <form action="{{ route('products-update', ['alias'=>$product->code]) }}" method="POST" enctype="multipart/form-data" >
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
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code-txt" name="code" placeholder="{{__('admin.products.input-code')}}" value="{{old('code', $product->code)}}">
                        <label for="code-txt">{{__('admin.products.input-code')}} @error('code')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror <span class="text-danger">*</span></label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="inner-code-txt" name="inner_code" placeholder="{{__('admin.products.input-inner-code')}}" value="{{old('inner_code', $product->inner_code)}}">
                        <label for="inner-code-txt">{{__('admin.products.input-inner-code')}}</label>
                    </div>

                    <div class="form-floating mb-4">
                        <select class="js-select2 form-select" name="transfer_category" style="width: 100%;" data-placeholder="{{__('admin.products.input-transfer-category')}}">
                            <option></option>
                                @foreach ($categories as $category)
                                    <option @if($category->alias == $product->parent) selected @endif value="{{$category->alias}}">{{$category->title}} ({{$category->alias}}) </option>
                                @endforeach
                          </select>
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
                                    <input type="text" class="form-control" id="title-txt-{{$lang}}" name="title[{{$lang}}]" placeholder="Enter product title" value="{{old('title.'.$lang, $product->title[$lang])}}">
                                    <label for="title-txt-{{$lang}}">{{__('admin.products.input-title')}} [{{$lang}}]</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" id="descr-txt-{{$lang}}" name="description[{{$lang}}]" style="height: 200px" placeholder="Enter product description">{{old('description.'.$lang, $product->description[$lang])}}</textarea>
                                    <label for="descr-txt-{{$lang}}">{{__('admin.products.input-description')}} [{{$lang}}]</label>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="js-ckeditor5-classic-{{$lang}}">{{__('admin.products.input-fulltext')}} [{{$lang}}]</label>
                                    <textarea name="details[{{$lang}}]" id="js-ckeditor5-classic-{{$lang}}" class="js-ckeditor5-classic" cols="30" rows="10">{!!old('details.'.$lang, $product->details[$lang])!!}</textarea>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <hr>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price-txt" name="price" placeholder="{{__('admin.products.input-price')}}" value="{{old('price', $product->price)}}">
                        <label for="price-txt">{{__('admin.products.input-price')}} @error('price')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror <span class="text-danger">*</span></label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock-txt" name="stock" placeholder="{{__('admin.products.input-stock')}}" value="{{old('stock', $product->stock)}}">
                        <label for="stock-txt">{{__('admin.products.input-stock')}} @error('stock')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror <span class="text-danger">*</span></label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount-txt" name="discount" placeholder="{{__('admin.products.input-discount')}}" value="{{old('discount', $product->discount)}}">
                        <label for="discount-txt">{{__('admin.products.input-discount')}} @error('discount')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                    </div>

                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1" id="active-checkbox" name="active" {{ $product->active == 0 ? '' : 'checked' }} >
                        <label class="form-check-label" for="active-checkbox">{{__('admin.products.switch-active')}}?</label>
                    </div>

                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1" id="new-checkbox" name="new" {{ $product->new == 0 ? '' : 'checked' }} >
                        <label class="form-check-label" for="new-checkbox">{{__('admin.products.switch-new')}}?</label>
                    </div>

                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1" id="special-checkbox" name="special" {{ $product->special == 0 ? '' : 'checked' }} >
                        <label class="form-check-label" for="special-checkbox">{{__('admin.products.switch-special')}}?</label>
                    </div>


                    @livewire('manage-product-image', ['product' => $product])


                </div>




                <div class="block-content tab-content" style="text-align:center;">
                    <button type="submit" class="btn  btn-primary me-1 mb-3">
                        <i class="fa fa-fw fa-check me-1"></i> {{__('admin.save')}}
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
