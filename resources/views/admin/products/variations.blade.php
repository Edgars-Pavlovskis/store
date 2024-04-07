@extends('layouts.backend')



@section('js')



    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

      <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('js/plugins/notifiers/index.js') }}"></script>

    <!-- Page JS Helpers (CKEditor 5 plugins) -->
    <script type="module">One.helpersOnLoad(['jq-notify']);</script>

@endsection


@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            {{__('admin.products.variations.title')}}
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
                {{__('admin.products.variations.title')}}
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
    <a href="/admin/categories/show/{{$product->parent}}">
        <button type="button" class="btn btn-alt-secondary me-1 mb-3">
            <i class="fa-solid fa-caret-left me-1"></i> {{__('admin.goback')}}
        </button>
    </a>




    <!-- Your Block -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">{{__('admin.products.variations.attributes')}}</h3>
        </div>
        <form action="{{ route('variations-attributes-update', ['productID'=>$product->id]) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="block-content block-content-full py-1 pt-2">
                <button type="submit"  class="btn btn-sm rounded-1 btn-info mb-3 px-3">
                    <i class="fa-regular fa-floppy-disk me-2"></i>{{__('admin.save')}}
                </button>

                <div class="row push">
                    <div class="">
                        <div class="space-x-2">

                                @foreach ($attributes as $attribute)
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="{{$attribute->id}}" id="varatr-{{$attribute->id}}" name="attributes[]" @if(in_array($attribute->id, $product->variations ?? [])) checked="" @endif>
                                        <label class="form-check-label" for="varatr-{{$attribute->id}}"><small class="text-gray">@if($attribute->type == "list")<i class="fa-solid fa-list-check"></i>@else <i class="fa-regular fa-keyboard"></i> @endif </small> {{$attribute->name}}<br></label>
                                    </div>
                                @endforeach




                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    <!-- END Your Block -->



    @livewire('variations-constructor', ['productID' => $product->id])






  </div>
  <!-- END Page Content -->
@endsection
