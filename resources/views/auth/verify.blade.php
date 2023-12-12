
@extends('layouts.simple')

@section('content')

<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="content">
      <div class="row justify-content-center push">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <!-- Sign In Block -->
          <div class="block block-rounded mb-0">
            <div class="block-content">
              <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                <h4>{{ __('Verify Your Email Address') }}</h4>


                @if (session('resent'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div class="flex-shrink-0">
                          <i class="fa fa-fw fa-check"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <p class="mb-0">
                            {{ __('Verification link has been sent to your email.') }}
                          </p>
                        </div>
                      </div>
                @endif


                <p class="fw-medium text-muted">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                </p>



                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                  @csrf
                  <button type="submit" class="btn w-100 btn-alt-primary">
                    <i class="fa-solid fa-share me-1 opacity-50"></i> {{ __('click here to request another') }}
                  </button>
                </form>



                <!-- END Sign In Form -->
              </div>
            </div>
          </div>
          <!-- END Sign In Block -->
        </div>
      </div>
      <div class="fs-sm text-muted text-center">
        <strong>OneUI 5.7</strong> &copy; <span data-toggle="year-copy"></span>
      </div>
    </div>
  </div>
  <!-- END Page Content -->

@endsection
