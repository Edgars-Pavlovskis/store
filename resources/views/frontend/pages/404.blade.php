@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')

@section('content')

    <section class="error-page onepage-screen-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <span class="title-highlighter highlighter-secondary"> <i class="fal fa-exclamation-circle"></i> Kļūda - 404</span>
                        <h1 class="title">Lapa nav atrasta</h1>
                        <p>Šķiet, ka mēs neatradām to, ko meklējāt. Lapa, kuru meklējāt, neeksistē vai arī šobrīd nav pieejama.</p>
                        <a href="/" class="axil-btn btn-bg-secondary right-icon">Sākumlapa <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                        <img src="assets/images/others/404.png" alt="404">
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
