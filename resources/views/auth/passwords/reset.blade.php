@extends('layouts.simple')

@section('content')





<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="content">
      <div class="row justify-content-center push">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <!-- Sign In Block -->
          <div class="block block-rounded mb-0">

            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Reset Password') }}</h3>
                <div class="block-options">
                  <a class="btn-block-option" href="{{route('login')}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Sign In">
                    <i class="fa fa-sign-in-alt"></i>
                  </a>
                </div>
            </div>


            <div class="block-content">
              <div class="p-sm-3 px-lg-42 px-xxl-5 py-lg-5 pt-lg-3">




                <form class="d-inline" method="POST" action="{{ route('password.update') }}">
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">

                    <div class="py-3">
                        <div class="mb-4">
                            <input type="email" class="form-control @error('email') is-invalid @enderror form-control-alt form-control-lg" id="email" name="email" placeholder="{{ __('Email Address') }}" value="{{ $email ?? old('email') }}"  required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-alt form-control-lg" id="password" name="password" placeholder="{{ __('Password') }}"  required autocomplete="new-password" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="password" class="form-control form-control-alt form-control-lg" id="password-confirm" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" autofocus>
                        </div>
                    </div>


                  <button type="submit" class="btn w-100 btn-alt-primary">
                    <i class="fa-solid fa-share me-1 opacity-50"></i> {{ __('Reset Password') }}
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





