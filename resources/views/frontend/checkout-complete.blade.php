@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')

@section('content')


<style>
#check-group { animation: 0.32s ease-in-out 1.03s check-group; transform-origin: center; } #check-group #check { animation: 0.34s cubic-bezier(0.65, 0, 1, 1) 0.8s forwards check; stroke-dasharray: 0, 75px; stroke-linecap: round; stroke-linejoin: round; } #check-group #outline { animation: 0.38s ease-in outline; transform: rotate(0deg); transform-origin: center; } #check-group #white-circle { animation: 0.35s ease-in 0.35s forwards circle; transform: none; transform-origin: center; } @keyframes outline { from { stroke-dasharray: 0, 345.576px; } to { stroke-dasharray: 345.576px, 345.576px; } } @keyframes circle { from { transform: scale(1); } to { transform: scale(0); } } @keyframes check { from { stroke-dasharray: 0, 75px; } to { stroke-dasharray: 75px, 75px; } } @keyframes check-group { from { transform: scale(1); } 50% { transform: scale(1.09); } to { transform: scale(1); } }
</style>

</style>

    <div class="container">
        <div class="row m-5 p-5 text-center ">
            <svg height=115px version=1.1 viewBox="0 0 133 133"width=115px xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink><g fill=none fill-rule=evenodd id=check-group stroke=none stroke-width=1><circle cx=66.5 cy=66.5 id=filled-circle r=54.5 fill=#07b481 /><circle cx=66.5 cy=66.5 id=white-circle r=55.5 fill=#FFFFFF /><circle cx=66.5 cy=66.5 id=outline r=54.5 stroke=#07b481 stroke-width=4 /><polyline id=check points="41 70 56 85 92 49"stroke=#FFFFFF stroke-width=5.5 /></g></svg>
            <h3 class="mt-4 mb-1">{{__('frontend.checkout.complete')}}</h3>
            <p>{{__('frontend.checkout.complete-info')}}</p>
        </div>
    </div>

@endsection
