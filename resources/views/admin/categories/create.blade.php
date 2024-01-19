@extends('layouts.backend')

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            {{__('admin.categories.creating')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            @if ($category_parent_alias == "root")
                {{__('admin.categories.parentroot')}}
            @else
                {{__('admin.categories.parent')}}: <b>{{$category_parent_alias}}</b>
            @endif

          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/admin/categories">{{__('admin.categories.title')}}</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{__('admin.categories.new')}}
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
          <h3 class="block-title">{{__('admin.categories.data')}}</h3>
        </div>
        <div class="block-content block-content-full">
          <form action="{{ route('categories-store', ['alias'=>$category_parent_alias, 'parent'=>$category_parent_alias]) }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="row">
              <div class="col-lg-4">
                <p class="fs-sm text-muted">
                    {{__('admin.categories.input-maindata')}}
                </p>
              </div>
              <div class="col-lg-8 col-xl-5">


                <div class="block block-rounded">

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('alias') is-invalid @enderror" id="alias-txt" name="alias" placeholder="{{__('admin.categories.input-url-alias')}}" value="{{(null!==old('alias'))?old('alias'):'category_'.time()}}">
                        <label for="alias-txt">{{__('admin.categories.input-url-alias')}} @error('alias')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror <span class="text-danger">*</span></label>
                    </div>


                    <ul class="nav nav-tabs nav-tabs-alt justify-content-end" role="tablist">
                        @foreach (getLocales() as $lang)
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link @if($loop->index == 0) active @endif" id="categories-title-tab-{{$lang}}" data-bs-toggle="tab" data-bs-target="#categories-title-content-{{$lang}}" role="tab" aria-controls="categories-title-content-{{$lang}}" aria-selected="true">{{strtoupper($lang)}}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="block-content tab-content">
                        @foreach (getLocales() as $lang)
                            <div class="tab-pane @if($loop->index == 0) active @endif" id="categories-title-content-{{$lang}}" role="tabpanel" aria-labelledby="categories-title-tab-{{$lang}}" tabindex="0">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="title-txt-{{$lang}}" name="title[{{$lang}}]" placeholder="{{__('admin.categories.input-title')}}" value="{{ old('title.'.$lang) }}">
                                    <label for="title-txt-{{$lang}}">{{__('admin.categories.input-title')}} [{{$lang}}]</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" id="descr-txt-{{$lang}}" name="description[{{$lang}}]" style="height: 200px" placeholder="{{__('admin.categories.input-description')}}">{{ old('description.'.$lang) }}</textarea>
                                    <label for="descr-txt-{{$lang}}">{{__('admin.categories.input-description')}} [{{$lang}}]</label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1" id="featured-checkbox" name="featured" {{ old('featured') == 1 ? 'checked' : '' }} >
                        <label class="form-check-label" for="featured-checkbox">{{__('admin.categories.switch-featured')}}</label>
                    </div>

                    <div class="mb-4 mt-4">
                        <label class="form-label" for="category-image-file">{{__('admin.categories.fileinput-image')}} @error('image')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="category-image-file" name="image">
                    </div>



                </div>




                <div class="block-content tab-content" style="text-align:center;">
                    <button type="submit" class="btn  btn-primary me-1 mb-3">
                        <i class="fa fa-fw fa-check me-1"></i> {{__('admin.create')}}
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
