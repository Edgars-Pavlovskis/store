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
                <h3 class="block-title">{{ __('Confirm Password') }}</h3>
                <div class="block-options">
                    @if (Route::has('password.request'))
                        <a class="btn-block-option fs-sm" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </div>
            </div>


            <div class="block-content">
              <div class="p-sm-3 px-lg-42 px-xxl-5 py-lg-5 pt-lg-3">




                <form class="d-inline" method="POST" action="{{ route('password.confirm') }}">
                  @csrf


                    <div class="py-3">

                        <div class="mb-2">
                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-alt form-control-lg" id="password" name="password" placeholder="{{ __('Password') }}"  required autocomplete="current-password" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>


                  <button type="submit" class="btn w-100 btn-alt-primary">
                    <i class="fa-solid fa-check me-1 opacity-50"></i> {{ __('Confirm Password') }}
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
