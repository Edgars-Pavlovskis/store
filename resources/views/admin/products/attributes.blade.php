@extends('layouts.backend')



@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            {{__('admin.products.attributes.title')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            {{__('admin.products.product-title')}}: <b>{{$product->title}}</b>
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/admin/categories">{{__('admin.categories.title')}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{$product->title}}
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{__('admin.products.attributes.title')}}
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
          <h3 class="block-title">{{__('admin.products.attributes.info')}} <small><i>{{__('admin.products.attributes.info-descr')}}</i></small> </h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{ route('attributes-update', ['alias'=>$alias]) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    @foreach ($attributes as $attribute)
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                {{$attribute->name}}
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="block block-rounded">
                                @if ($attribute->type == "list")
                                    <select class="form-select" name="attributes[{{$attribute->id}}]">
                                        <option value="">{{__('admin.products.attributes.not-assigned')}}</option>
                                        @foreach ($attribute->options as $key=>$value)
                                            <option @if(isset($products_attributes[$attribute->id]) && $products_attributes[$attribute->id] == $key) selected="" @endif value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @if ($attribute->type == "value")
                                    <input type="text" class="form-control" id="input-attr-{{$attribute->id}}" name="attributes[{{$attribute->id}}]" placeholder="{{__('admin.value')}}" value="@if(isset($products_attributes[$attribute->id])){{$products_attributes[$attribute->id]}}@endif">
                                @endif




                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="block-content tab-content" style="text-align:center;">
                    <button type="submit" class="btn  btn-primary me-1 mb-3">
                        <i class="fa fa-fw fa-check me-1"></i> {{__('admin.save')}}
                    </button>
                </div>

          </form>
        </div>



      </div>
    <!-- END Your Block -->








  </div>
  <!-- END Page Content -->
@endsection
