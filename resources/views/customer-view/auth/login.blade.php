@extends('layouts.front-end.app')
@section('title', \App\CPU\translate('Login'))

@push('css_or_js')
    <style>
        .fixed-top {
            position: static !important;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }
        .opacity-0-8 {
            opacity: 1 !important;
        }
        .password-toggle-btn .custom-control-input:checked ~ .password-toggle-indicator {
            color: {{$web_config['primary_color']}};
        }

        .for-no-account {
            margin: auto;
            text-align: center;
        }
        .h-100vh {
        height: 90vh;
        }
        .login-image {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        }
        input,
        input::-webkit-input-placeholder {
        font-size: 1rem;
        line-height: 3;
        }
        .login-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
        .form-group input {
        background-color: #eeeeee;
        direction: rtl;
        }
        .social-container {
        margin: 20px 0;
        }
        .social-container a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
        }
        .social-container a {
        border: 1px solid #dddddd;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
        }
        @media screen and (max-width: 1000px) {
        .w-75.w-lower-1000px-90 {
            width: 80% !important;
        }
        }
        /* @media screen and (max-width: 760px) {
        .w-lower-1000px-90 {
            width: 96% !important;
        }
        } */
        @media screen and (max-width: 930px) {
            .w-75.w-lower-1000px-90 {
                width: 80% !important;
            }
            .w-50.responsive-w {
                width: 100% !important;
            }
            .image-none {
                display: none;
            }
        }
        @media screen and (max-width: 450px) {
            html {
                font-size: 12px;
            }
            /* input::placeholder {
                font-size: 0.5rem
            } */
            .h-100vh {
                height: 60vh !important;
            }
            .w-75.w-lower-1000px-90 {
                width: 90% !important;
            }
            .w-50.responsive-w {
                width: 100% !important;
            }
            .image-none {
                display: none;
            }
        }
        .facebook {
        color: #2973ea !important;
        }
        .google {
        color: #f3b606 !important;
        }
    </style>
@endpush
@section('content')
<div
    class="d-flex justify-content-center align-items-center w-100 mb-5 h-100vh"
    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
  >
  <div
      class="login-container d-flex justify-content-center align-items-center w-75 w-lower-1000px-90"
    >
    <div class="w-50 mt-5 responsive-w"> 
        <h1 class="font-weight-bold text-center mb-2">{{\App\CPU\translate('sing_in')}}</h1>
        <div class="social-container text-center mb-2">
            <a href="#" class="social facebook"
              ><i class="fa fab fa-facebook-f"></i
            ></a>
            <a href="#" class="social google"> <i class="fa fab fa-google"></i></a>
        </div>
        <form class="needs-validation" autocomplete="off" action="{{route('customer.auth.login')}}"
                              method="post" id="form-id">
            @csrf
            <div class="form-group d-flex justify-content-center mb-2">
                {{-- <label for="si-email">{{\App\CPU\translate('email_address')}} / {{\App\CPU\translate('phone')}}</label> --}}
                <input
                  type="text"
                  class="form-control w-75"
                  name="user_id" id="si-email"
                  style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" value="{{old('user_id')}}"
                  placeholder="{{\App\CPU\translate('Enter_email_address_or_phone_number')}}"
                  required
                />
                <div class="invalid-feedback">{{\App\CPU\translate('please_provide_valid_email_or_phone_number')}}.</div>
            </div>
            <div class="form-group  mb-2">
                {{-- <label for="si-password">{{\App\CPU\translate('password')}}</label> --}}
                <div class="password-toggle d-flex justify-content-center">
                    <input
                        class="form-control w-75"
                        name="password" type="password" id="si-password"
                        style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                        placeholder="{{\App\CPU\translate('password')}}"
                        required
                    />
                    {{-- <label class="password-toggle-btn">
                        <input class="custom-control-input" type="checkbox"><i
                            class="czi-eye password-toggle-indicator"></i><span
                            class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                    </label> --}}
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <div class="d-flex flex-wrap justify-content-between w-75">
                    <div class="form-group">
                        <input type="checkbox" class="{{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"
                               name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                        <label class="" for="remember">{{\App\CPU\translate('remember_me')}}</label>
                    </div>
                    <a class="font-size-sm" href="{{route('customer.auth.recover-password')}}">
                        {{\App\CPU\translate('forgot_password')}}?
                    </a>
                </div>
                
            </div>
            <div class="text-center">
                <button class="btn btn-success mb-4" type="submit">{{\App\CPU\translate('sign_in')}}</button>
            </div>
        </form>
    </div>
    <div class="w-50 mt-0 image-none">
        <img
          src="{{asset('assets/front-end/img')}}/images/log-in.jpg"
          class="login-image"
          width="100%"
          height="600px"
        />
      </div>
  </div>
</div>
    
@endsection

@push('script')
<!--    <script>
        $('#sign-in-form').submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('customer.auth.login')}}',
                dataType: 'json',
                data: $('#sign-in-form').serialize(),
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        toastr.success(data.message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = data.url;
                        }, 2000);
                    }
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function () {
                    toastr.error('Credentials do not match or account has been suspended.', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>-->
    {{-- recaptcha scripts start --}}
    @if(isset($recaptcha) && $recaptcha['status'] == 1)
    <script type="text/javascript">
        var onloadCallback = function () {
            grecaptcha.render('recaptcha_element', {
                'sitekey': '{{ \App\CPU\Helpers::get_business_settings('recaptcha')['site_key'] }}'
            });
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script>
        $("#form-id").on('submit',function(e) {
            var response = grecaptcha.getResponse();

            if (response.length === 0) {
                e.preventDefault();
                toastr.error("{{\App\CPU\translate('Please check the recaptcha')}}");
            }
        });
    </script>
    @endif
    {{-- recaptcha scripts end --}}
@endpush
