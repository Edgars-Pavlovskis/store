@extends('layouts.backend')

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            Editing category
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Category alias: {{$category->alias}}
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/admin/categories">Categories</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              Edit
            </li>
            <li class="breadcrumb-item" aria-current="page">
                {{$category->title[App::currentLocale()]}}
              </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
    <a href="/admin/categories/show/{{$category->alias}}">
        <button type="button" class="btn btn-alt-secondary me-1 mb-3">
            <i class="fa-solid fa-caret-left me-1"></i> GoBack
        </button>
    </a>



    <!-- Your Block -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Edit category data</h3>
        </div>
        <div class="block-content block-content-full">
          <form action="{{ route('categories-update', ['alias'=>$category->alias]) }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="row">
              <div class="col-lg-4">
                <p class="fs-sm text-muted">
                  Enter main data for products category
                </p>
              </div>
              <div class="col-lg-8 col-xl-5">


                <div class="block block-rounded">

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('alias') is-invalid @enderror" id="alias-txt" name="alias" placeholder="Enter URL alias" value="{{$category->alias}}">
                        <label for="alias-txt">Enter URL alias @error('alias')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>

                    </div>


                    <ul class="nav nav-tabs nav-tabs-alt justify-content-end" role="tablist">
                        @foreach (app('config')->get('shop')['languages']['list'] as $lang)
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link @if($loop->index == 0) active @endif" id="categories-title-tab-{{$lang}}" data-bs-toggle="tab" data-bs-target="#categories-title-content-{{$lang}}" role="tab" aria-controls="categories-title-content-{{$lang}}" aria-selected="true">{{strtoupper($lang)}}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="block-content tab-content">
                        @foreach (app('config')->get('shop')['languages']['list'] as $lang)
                            <div class="tab-pane @if($loop->index == 0) active @endif" id="categories-title-content-{{$lang}}" role="tabpanel" aria-labelledby="categories-title-tab-{{$lang}}" tabindex="0">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="title-txt-{{$lang}}" name="title[{{$lang}}]" placeholder="Enter a username" value="{{$category->title[$lang]}}">
                                    <label for="title-txt-{{$lang}}">Title [{{$lang}}]</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" id="descr-txt-{{$lang}}" name="description[{{$lang}}]" style="height: 200px" placeholder="Category description here..">{{$category->description[$lang]}}</textarea>
                                    <label for="descr-txt-{{$lang}}">Category description [{{$lang}}]</label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="featured-checkbox" name="featured" checked="">
                        <label class="form-check-label" for="featured-checkbox">Featured category</label>
                    </div>


                    @livewire('manage-category-image', ['category' => $category])




                </div>




                <div class="block-content tab-content">
                    <button type="submit" class="btn  btn-primary me-1 mb-3">
                        <i class="fa-regular fa-floppy-disk me-1"></i> Update
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
