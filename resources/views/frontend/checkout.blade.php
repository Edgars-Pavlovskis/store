@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')

@section('content')

    @livewire('show-checkout')

@endsection
