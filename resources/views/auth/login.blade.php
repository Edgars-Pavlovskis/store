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
                      <h3 class="block-title">Sign In</h3>
                      <div class="block-options">
                        @if (Route::has('password.request'))
                            <a class="btn-block-option fs-sm" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="btn-block-option" href="{{ route('register') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="New Account">
                                <i class="fa fa-user-plus"></i>
                            </a>
                        @endif

                      </div>
                    </div>
                    <div class="block-content">
                      <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                        <h1 class="h2 mb-1">OneUI</h1>
                        <p class="fw-medium text-muted">
                          Welcome, please login.
                        </p>

                        <a href="{{route('auth.google')}}">
                            <button type="button" class="btn btn-outline-danger  me-1 mb-3">
                                <i class="fa-brands fa-google me-1"></i> {{__('Sign in using Google')}}
                            </button>
                        </a>

                        <!-- Sign In Form -->
                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                            @csrf
                          <div class="py-3">
                            <div class="mb-4">
                              <input type="email" class="form-control @error('email') is-invalid @enderror form-control-alt form-control-lg" id="email" name="email" placeholder="{{ __('Email Address') }}" required autocomplete="email" autofocus>
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                              <input type="password" class="form-control @error('password') is-invalid @enderror form-control-alt form-control-lg" id="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-4">
                            <div class="col-md-6 col-xl-5">
                              <button type="submit" class="btn w-100 btn-alt-primary">
                                <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> {{ __('Login') }}
                              </button>
                            </div>
                          </div>
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
