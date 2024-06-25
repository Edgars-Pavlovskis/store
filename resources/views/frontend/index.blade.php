@extends('layouts.frontend')

@include('layouts.header-with-catalog')
@include('layouts.footer')
@include('layouts.service-area')


@section('content')



    @livewire('show-special-products', [
        'types' => [
            'discount' => 4
        ],
        'icon' => [
            'class' => 'fa-solid fa-tag',
            'text-color' => 'text-danger',
            'bg-color' => 'bg-danger',
            'text' => __('frontend.discounts')
        ],
        'title' => '',
        'url' => '/discount-products'
    ])


   @livewire('show-special-products', [
        'types' => [
            'new' => 4
        ],
        'icon' => [
            'class' => 'fa-solid fa-tag',
            'text-color' => 'text-primary',
            'bg-color' => 'bg-primary',
            'text' => __('frontend.new-products')
        ],
        'title' => '',
        'url' => '/new-products'
    ])



    <!-- Full width banner  -->
    @livewire('show-banner',['type' => 'full-length'])
    <!-- End Full width banner  -->



    <!-- Poster Countdown Area  -->
    @livewire('show-banner',['type' => 'counter'])
    <!-- End Poster Countdown Area  -->



    <!-- Start Axil Newsletter Area  -->
    @livewire('show-subscribe')
    <!-- End Axil Newsletter Area  -->
@endsection
