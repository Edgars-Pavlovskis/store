@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')

@section('content')
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="/">{{__('frontend.home')}}</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item">{{__('frontend.product-catalog')}}</li>
                                @if ($category->parent)
                                    <li class="separator"></li>
                                    <li class="axil-breadcrumb-item active" aria-current="page"><a href="/catalog/{{$category->parent->alias}}">{{$category->parent->title}}</a></li>
                                @endif
                            </ul>
                            <h1 class="title">{{$category->title}}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            <div class="bradcrumb-thumb">
                                <img style="max-width: 125px;" src="/storage/categories/{{$category->image}}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->


        @if(count($category->children)>0)
            <div class="container grid-container mt-3">
                @foreach ($category->children as $subcategory)
                    <div class="col sal-animate my-2 mx-3" >
                        <a href="{{ route('frontend-catalog-show', ['alias'=>$subcategory->alias]) }}">
                        <div class="categrie-product h-100 py-3" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                            <img src="/storage/categories/{{$subcategory->image}}" onerror="this.src='/assets/img/default-product.png';" alt="Category Image">
                            <div class="content">
                                <h6 class="cat-title mb-0">{{$subcategory->title}}</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif



        @livewire('products-list', ['alias'=>$category->alias])


        <!-- Start Axil Newsletter Area  -->
        @livewire('show-subscribe')
        <!-- End Axil Newsletter Area  -->


@endsection
