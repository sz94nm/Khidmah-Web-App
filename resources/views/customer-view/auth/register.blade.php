@extends('layouts.front-end.app')

@section('title', \App\CPU\translate('Register'))

@push('css_or_js')
    <style>
        .fixed-top {
            position: static;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }
        .opacity-0-8 {
            opacity: 1 !important;
        }
        @media (max-width: 500px) {
            #sign_in {
                margin-top: -23% !important;
            }

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
    width: 96% !important;
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
          height: 70 !important;
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
.opacity-0-8 {
    opacity: 1 !important;
}
.fixed-top {
    position: static !important;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
}
    </style>
@endpush

@section('content')
{{--  --}}
<div
    class="d-flex justify-content-center align-items-center w-100 mb-5 h-100vh"
    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
  >
    <div
      class="login-container d-flex justify-content-center align-items-center w-75 w-lower-1000px-90"
    >
      <div class="w-50 mt-5 responsive-w">
        <h1 class="font-weight-bold text-center mb-2">{{\App\CPU\translate('no_account')}}</h1>
        <p class="font-size-sm text-muted mb-2 text-center">{{\App\CPU\translate('register_control_your_order')}}
        </p>
        <div class="social-container text-center mb-2 mt-0">
            <a href="#" class="social facebook"
              ><i class="fa fab fa-facebook-f"></i
            ></a>
            <a href="#" class="social google"> <i class="fa fab fa-google"></i></a>
        </div>
        <form class="needs-validation_" action="{{route('customer.auth.register')}}"
                              method="post" id="sign-up-form">
            @csrf 
            <div class="form-group d-flex justify-content-center mb-2">
                <input
                  class="form-control w-75"
                  placeholder="{{\App\CPU\translate('Please enter your first name')}}"
                  value="{{old('f_name')}}" type="text" name="f_name"
                  style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                  required
                />
                <div class="invalid-feedback">{{\App\CPU\translate('Please enter your first name')}}!</div>
            </div>
            
            <div class="form-group d-flex justify-content-center mb-2">
                <input
                  type="text"
                  class="form-control w-75"
                  placeholder="{{\App\CPU\translate('Please enter your last name')}}"
                  value="{{old('l_name')}}" name="l_name"
                  style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                />
                <div class="invalid-feedback">{{\App\CPU\translate('Please enter your last name')}}!</div>
            </div>
           
            <div class="form-group d-flex justify-content-center mb-2">
                <input
                  type="email"
                  class="form-control w-75"
                  placeholder="{{\App\CPU\translate('Please enter valid email address')}}"
                  value="{{old('email')}}"  name="email"
                  style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" required
                />
                <div class="invalid-feedback">{{\App\CPU\translate('Please enter valid email address')}}!</div>
            </div>
            
            <div class="form-group d-flex justify-content-center mb-2">
                
                <input class="form-control w-75" type="tel"  value="{{old('phone')}}"  name="phone"
                       style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                       placeholder="{{\App\CPU\translate('Please enter your phone number')}}"
                       required>
                <div class="invalid-feedback">{{\App\CPU\translate('Please enter your phone number')}}!</div>
            </div>
            <div class="form-group d-flex justify-content-center mb-2">
                
                <div class="password-toggle w-75">
                    <input class="form-control" name="password" type="password" id="si-password"
                           style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                           placeholder="{{\App\CPU\translate('password')}}"
                           required>
                    {{-- <label class="password-toggle-btn">
                        <input class="custom-control-input" type="checkbox"><i
                            class="czi-eye password-toggle-indicator"></i><span
                            class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                    </label> --}}
                </div>
            </div>
            <div class="form-group d-flex justify-content-center mb-2">
            
                <div class="password-toggle w-75">
                    <input class="form-control" name="con_password" type="password"
                           style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                           placeholder="{{\App\CPU\translate('Please ReType Password')}}"
                           id="si-password"
                           required>
                    {{-- <label class="password-toggle-btn">
                        <input class="custom-control-input" type="checkbox"
                               style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"><i
                            class="czi-eye password-toggle-indicator"></i><span
                            class="sr-only">{{\App\CPU\translate('Show')}} {{\App\CPU\translate('password')}} </span>
                    </label> --}}
                </div>
            </div>
            <div class="form-group mb-1 d-flex justify-content-center">
                <strong>
                    <input type="checkbox" class="mr-1"
                            name="remember" id="inputCheckd">
                </strong>
                <label class="" for="remember">{{\App\CPU\translate('i_agree_to_Your_terms')}}
                    <a
                        class="font-size-sm font-weight-bold" target="_blank" href="{{route('terms')}}">
                        {{\App\CPU\translate('terms_and_condition')}}
                    </a>
                </label>
            </div>
            <div class="text-center">
            <button class="btn btn-success mb-4" id="sign-up" type="submit" disabled>
                <i class="czi-user {{Session::get('direction') === "rtl" ? 'ml-2 mr-n1' : 'mr-2 ml-n1'}}"></i>
                {{\App\CPU\translate('sing_up')}}
            </button>
        </div>
        </form>

    
        
        
        <div class="col-12 mt-3">
            <div class="row">
                @foreach (\App\CPU\Helpers::get_business_settings('social_login') as $socialLoginService)
                    @if (isset($socialLoginService) && $socialLoginService['status']==true)
                        <div class="col-sm-6 text-center mt-1">
                            <a class="btn btn-outline-primary"
                               href="{{route('customer.auth.service-login', $socialLoginService['login_medium'])}}"
                               style="width: 100%">
                                <i class="czi-{{ $socialLoginService['login_medium'] }} {{Session::get('direction') === "rtl" ? 'ml-2 mr-n1' : 'mr-2 ml-n1'}}"></i>
                                {{\App\CPU\translate('sing_up_with_'.$socialLoginService['login_medium'])}}
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
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
{{--  --}}
@endsection

@push('script')
    <script>
        $('#inputCheckd').change(function () {
            // console.log('jell');
            if ($(this).is(':checked')) {
                $('#sign-up').removeAttr('disabled');
            } else {
                $('#sign-up').attr('disabled', 'disabled');
            }

        });
        /*$('#sign-up-form').submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('customer.auth.register')}}',
                dataType: 'json',
                data: $('#sign-up-form').serialize(),
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
                  console.log(response)
                }
            });
        });*/
    </script>
@endpush
