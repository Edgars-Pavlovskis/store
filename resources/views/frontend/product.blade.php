@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')

@section('content')

        <div class="axil-breadcrumb-area px-0 py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="inner">
                            <ul class="axil-breadcrumb m-0">
                                <li class="axil-breadcrumb-item"><a href="/">{{__('frontend.product-catalog')}}</a></li>
                                @mobile
                                    <li class="separator"></li>
                                    <li class="axil-breadcrumb-item active" aria-current="page"><a href="/catalog/{{end($breadcrumbCategories)->alias}}">{{end($breadcrumbCategories)->title}}</a></li>
                                @elsemobile
                                    @foreach ($breadcrumbCategories as $breadcrumbCategory)
                                        <li class="separator"></li>
                                        <li class="axil-breadcrumb-item @if($loop->last) active @endif" aria-current="page"><a href="/catalog/{{$breadcrumbCategory->alias}}">{{$breadcrumbCategory->title}}</a></li>
                                    @endforeach
                                @endmobile
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Shop Area  -->
        <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mb--40">
                            <div class="row">
                                <div class="col-lg-10 order-lg-2">
                                    <div class="single-product-thumbnail-wrap zoom-gallery">
                                        <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                            <div class="thumbnail">
                                                <a href="@if(isset($product->image))/storage/products/{{$product->image}}@else /assets/img/default-product.png @endif" class="popup-zoom">
                                                    <img src="/storage/products/{{$product->image}}" onerror="this.src='/assets/img/default-product.png';" alt="Product Images">
                                                </a>
                                            </div>
                                            @foreach ($galleryImages as $galleryImage)
                                                <div class="thumbnail">
                                                    <a href="@if(isset($galleryImage) && strlen($galleryImage)>0){{$galleryImage}}@else /assets/img/default-product.png @endif" class="popup-zoom">
                                                        <img src="{{$galleryImage}}" onerror="this.src='/assets/img/default-product.png';" alt="Product Image">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="label-block">
                                            @if ($product->discount > 0)
                                                <div class="product-badget">{{__('admin.products.status.discount')}} -{{$product->discount}}%</div><br>
                                            @endif
                                            @if ($product->new)
                                                <div class="product-badget bg-primary">{{__('admin.products.status.new')}}</div><br>
                                            @endif
                                            @if ($product->special)
                                                <div class="product-badget bg-success"><i class="fa-solid fa-thumbs-up"></i></div>
                                            @endif
                                        </div>
                                        <div class="product-quick-view position-view">
                                            <a href="/storage/products/{{$product->image}}" class="popup-zoom">
                                                <i class="far fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 order-lg-1">
                                    <div class="product-small-thumb-3 small-thumb-wrapper">
                                        <div class="small-thumb-img">
                                            <img src="/storage/products/{{$product->image}}" onerror="this.src='/assets/img/default-product.png';" alt="thumb image">
                                        </div>
                                        @foreach ($galleryImages as $galleryImage)
                                            <div class="small-thumb-img">
                                                <img src="{{$galleryImage}}" onerror="this.src='/assets/img/default-product.png';" alt="thumb image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        @livewire('show-single-product-basic-info', ['product' => $product, 'minPrice' => $minPrice, 'maxPrice' => $maxPrice])


                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->

            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">{{__('frontend.product.details')}}</a>
                        </li>
                        <li class="nav-item " role="presentation">
                            <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab" aria-controls="additional-info" aria-selected="false">{{__('frontend.product.attributes')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-12 mb--30">
                                        <div class="single-desc">
                                            {!!$product->details!!}
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- End .product-desc-wrapper -->
                        </div>
                        <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                            <div class="product-additional-info">
                                <div class="table-responsive">
                                    <table>
                                        <tbody>
                                            @foreach ($attributes as $attribute)
                                                <tr>
                                                    <th>{{$attribute->name}}</th>
                                                    @if ($attribute->type == "list")
                                                        <td>@if(isset($attribute->options[$attribute->value])){{$attribute->options[$attribute->value]}} @else - @endif</td>
                                                    @else
                                                        <td>{{$attribute->value}}</td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- woocommerce-tabs -->

        </div>
        <!-- End Shop Area  -->



        @livewire('show-category-products', ['count' => 12, 'parent' => $product->parent])

        @livewire('show-subscribe')
    </main>



    @include('layouts.service-area')

@endsection
