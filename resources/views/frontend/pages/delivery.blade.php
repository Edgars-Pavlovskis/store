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
                        <li class="axil-breadcrumb-item"><a href="/">Sākums</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item active" aria-current="page">Piegādes nosacījumi</li>
                    </ul>
                    <h1 class="title">Piegādes nosacījumi</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{asset('assets/img/delivery.png')}}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

<!-- Start Privacy Policy Area  -->
<div class="axil-privacy-area axil-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="axil-privacy-policy">
                    <span class="policy-published" style="margin-bottom: 10px;">Preces saņemšana veikalā.</span>
                    <p class="mb--10">Preci var saņemt bez maksas veikalos:
                        <ul class="list" style="margin-bottom: 0px;">
                            <li>Biroja Pasaule ALBA – Brāļu Skrindu ielā 17, Rēzeknē</li>
                            <li>Mājturības preces ALBA – Raiņa 23K-1, Viļāni</li>
                            <li>Mājturības un kancelejas preces ALBA – Cietokšņa ielā 60, Daugavpilī</li>
                            <li>Mājturības preces ALBA – Rīgas ielā 28, Krāslava </li>
                        </ul>
                    </p>

                    <h4 class="title">Bezmaksas piegāde</h4>
                    <p>Mēs nodrošinām bezmaksas piegādi Rēzeknes robežās pasūtījumiem virs 10€.</p>

                    <h4 class="title">Preces piegāde ar kurjeru</h4>
                    <p>
                        Preču piegādes cena – 6€.
                        <br>Lielgabarīta precēm piegādes cena tiek aprēķināta individuāli.
                    </p>

                    <h4 class="title">Pakomāts</h4>
                    <p>Piegāde tiek veikta uz “DPD Pickup” tīkla punktiem – 4€. (maksimālie pakas izmēri: 61x43x36 cm – 31 kg)</p>

                    <h4 class="title mb--0">Prece tiek piegādāta tikai pēc avansa maksājuma saņemšanas!</h4>
                    <p><b>Jautājumu gadījumā, lūdzu, sazinieties ar mums pa tālruni 646 24535</b></p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Privacy Policy Area  -->


@endsection
