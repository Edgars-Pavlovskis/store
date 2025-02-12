@extends('layouts.simple')

@section('content')


        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
            <div class="content">
              <div class="row justify-content-center push">
                <div class="col-md-8 col-lg-6 col-xl-4">
                  <!-- Sign Up Block -->
                  <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Lietotāja profila reģistrācija</h3>
                      <div class="block-options">
                        <a class="btn-block-option" href="{{route('login')}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Jau ir konts? Autorizējies!">
                          <i class="fa fa-sign-in-alt"></i>
                        </a>
                      </div>
                    </div>
                    <div class="block-content">
                      <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                        <img src="{{asset('assets/img/alba-red.png')}}" alt="" class="img-fluid">
                        <p class="fw-medium text-muted">
                            Lūdzu, aizpildiet ievadformu, lai izveidotu jaunu kontu.
                        </p>

                        <!--
                        <a href="{{route('auth.google')}}">
                            <button type="button" class="btn btn-outline-danger  me-1 mb-3">
                                <i class="fa-brands fa-google me-1"></i> {{__('Reģistrēties izmantojot Google kontu')}}
                            </button>
                        </a>
                        -->

                        <!-- Sign Up Form -->
                        <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form id="register-form" class="js-validation-signup" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="py-3">
                                <div class="mb-4">
                                <input type="text" class="form-control @error('name') is-invalid @enderror form-control-lg form-control-alt" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('frontend.Username') }}" required autocomplete="name" autofocus>
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg form-control-alt" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('frontend.Email') }}" required autocomplete="email">
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror form-control-lg form-control-alt" id="password" name="password" placeholder="{{ __('frontend.Password') }}" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                <input type="password" class="form-control form-control-lg form-control-alt" id="password-confirm" name="password_confirmation" placeholder="{{ __('frontend.Confirm Password') }}" required autocomplete="new-password">
                                </div>
                                <div class="mb-4">
                                    <p class="fw-medium text-muted">
                                        Reģistrējoties, Jūs apstiprināt, ka piekrītat <a class="link-warning" href="#">internetveikala lietošanas noteikumiem</a> un esat iepazinušies ar mūsu <a class="link-warning" href="#">privātumu politiku</a>.
                                    </p>
                                </div>
                            </div>


                            @error('g-recaptcha-response')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="row mb-4">
                                <div class="col-md-6 col-xl-5">
                                <button id="register-button" type="submit" class="btn w-100 btn-alt-success">
                                    <i class="fa fa-fw fa-plus me-1 opacity-50"></i> {{ __('Reģistrēties') }}
                                </button>
                                </div>
                            </div>
                        </form>

                        <script src="https://www.google.com/recaptcha/api.js?render={{ env('NOCAPTCHA_SITEKEY') }}" async defer></script>
                        <script>
                            document.getElementById('register-button').addEventListener('click', function(event) {
                                event.preventDefault(); // Stop form from submitting
                                grecaptcha.ready(function() {
                                    grecaptcha.execute("{{ env('NOCAPTCHA_SITEKEY') }}", { action: 'register' }).then(function(token) {
                                        let form = document.getElementById('register-form');
                                        let recaptchaInput = document.createElement('input');
                                        recaptchaInput.setAttribute('type', 'hidden');
                                        recaptchaInput.setAttribute('name', 'g-recaptcha-response');
                                        recaptchaInput.setAttribute('value', token);
                                        form.appendChild(recaptchaInput);
                                        form.submit(); // Submit after reCAPTCHA verification
                                    });
                                });
                            });
                        </script>

                        <!-- END Sign Up Form -->
                      </div>
                    </div>
                  </div>
                  <!-- END Sign Up Block -->
                </div>
              </div>
              <div class="fs-sm text-muted text-center">
                <strong>ALBA - Birojam un Skolai</strong> &copy; <span data-toggle="year-copy"></span>
              </div>
            </div>

            <!-- Terms Modal -->
            <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                <div class="modal-content">
                  <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Terms &amp; Conditions</h3>
                      <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                          <i class="fa fa-fw fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="block-content">
                      <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                      <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                      <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                      <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                      <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                      <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">I Agree</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END Terms Modal -->
          </div>
          <!-- END Page Content -->





@endsection
