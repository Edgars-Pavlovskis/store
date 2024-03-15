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
                            <img src="/storage/categories/{{$subcategory->image}}" alt="Category Image">
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
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->
@endsection
