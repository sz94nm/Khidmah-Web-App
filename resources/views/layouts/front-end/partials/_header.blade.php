<style>
    .card-body.search-result-box {
        overflow: scroll;
        height: 400px;
        overflow-x: hidden;
    }

    .active .seller {
        font-weight: 700;
    }

    .for-count-value {
        position: absolute;

        right: 0.6875rem;;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: {{$web_config['primary_color']}};

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    .count-value {
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: {{$web_config['primary_color']}};

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    @media (min-width: 992px) {
        .navbar-sticky.navbar-stuck .navbar-stuck-menu.show {
            display: block;
            height: 55px !important;
        }
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: {{$web_config['primary_color']}};
            line-height: 15px;
            padding-bottom: 6px;
        }

    }

    @media (max-width: 767px) {
        .search_button {
            background-color: transparent !important;
        }

        .search_button .input-group-text i {
            color: {{$web_config['primary_color']}}                              !important;
        }

        .navbar-expand-md .dropdown-menu > .dropdown > .dropdown-toggle {
            position: relative;
            padding- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 1.95rem;
        }

        .mega-nav1 {
            background: white;
            color: {{$web_config['primary_color']}}                              !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {{$web_config['primary_color']}}                              !important;
        }
    }

    @media (max-width: 768px) {
        .tab-logo {
            width: 10rem;
        }
    }

    @media (max-width: 360px) {
        .mobile-head {
            padding: 3px;
        }
    }

    @media (max-width: 471px) {
        .navbar-brand img {

        }

        .mega-nav1 {
            background: white;
            color: {{$web_config['primary_color']}}                              !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {{$web_config['primary_color']}}                              !important;
        }
    }
    #anouncement {
        width: 100%;
        padding: 2px 0;
        text-align: center;
        color:white;
    }

    
</style>
<style>
/* .fixed-top {
  position: static !important;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
} */
.me-auto {
    margin-inline-end:auto !important;
}
nav .nav-link {
    color: black !important
}
.opacity-0-8 {
  opacity: 0.8 !important;
}

@media screen and (max-width: 1198px) {
  nav a {
    text-align: center !important;
  }
  .form-inline {
    display: flex;
    flex-flow: row wrap;
    align-items: center;
    justify-content: center;
  }
  nav .form-control {
    display: inline-block !important;
    width: auto !important;
  }
}
@media only screen and (max-width: 700px) {
  .fixed-top {
    position: static !important;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
  }
  .nav-bg-black {
    background: rgb(241, 239, 233);
  }
  .navbar-nav .nav-link.text-light {
    color: rgb(0, 0, 0) !important;
  }
}
.navbar-brand img {
  max-width: 40px;
  height: auto;
}
.btn.btn-outline-success:hover {
  color: white !important;
}
.nav-item .dropdown-toggle::after {
    margin-left: 0.2rem!important;
}
.dropdown-menu {
    min-width: 200px !important;
    margin-left: -70px !important;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}
</style>

@php($announcement=\App\CPU\Helpers::get_business_settings('announcement'))
@if (isset($announcement) && $announcement['status']==1)
    <div class="d-flex justify-content-between align-items-center" id="anouncement" style="background-color: {{ $announcement['color'] }};color:{{$announcement['text_color']}}">
        <span></span>
        <span style="text-align:center; font-size: 15px;">{{ $announcement['announcement'] }} </span>
        <span class="ml-3 mr-3" style="font-size: 12px;cursor: pointer;color: darkred"  onclick="myFunction()">X</span>
    </div>
@endif





              
                <!-- currence  -->
                <!-- @php($currency_model = \App\CPU\Helpers::get_business_settings('currency_model'))
                @if($currency_model=='multi_currency')
                    <div class="topbar-text dropdown disable-autohide">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <span>{{session('currency_code')}} {{session('currency_symbol')}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"
                            style="min-width: 160px!important;text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                            @foreach (\App\Model\Currency::where('status', 1)->get() as $key => $currency)
                                <li style="cursor: pointer" class="dropdown-item"
                                    onclick="currency_change('{{$currency['code']}}')">
                                    {{ $currency->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->



<header class="box-shadow-sm rtl hidden-nav">
    <!-- Topbar-->


              <!-- Toolbar-->

        <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top opacity-0-8">
            <a class="navbar-brand  {{Session::get('direction') === "rtl" ? '' : ''}}      "
            href="{{route('home')}}"
            >
                <img 
                 src="{{asset("storage/company")."/".$web_config['web_logo']->value}}"
                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                 alt="{{$web_config['name']->value}}"/>
            </a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-toggle="collapse"
                  data-target="#navbarCollapse"
                  aria-controls="navbarCollapse"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse"
                     style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}}">

                    <!-- Search-->
                   <!--  <div class="input-group-overlay d-md-none my-3">
                        <form action="{{route('products')}}" type="submit" class="search_form">
                            <input class="form-control appended-form-control search-bar-input-mobile" type="text"
                                   autocomplete="off"
                                   placeholder="{{\App\CPU\translate('search')}}" name="name">
                            <input name="data_from" value="search" hidden>
                            <input name="page" value="1" hidden>
                            <button class="input-group-append-overlay search_button" type="submit"
                                    style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};">
                            <span class="input-group-text" style="font-size: 20px;">
                                <i class="czi-search text-white"></i>
                            </span>
                            </button>
                            <diV class="card search-card"
                                 style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                                <div class="card-body search-result-box" id=""
                                     style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                            </diV>
                        </form>
                    </div> -->
                    
                   
                    <!-- Primary menu-->

                    <ul class="navbar-nav me-auto" style="{{Session::get('direction') === "rtl" ? 'padding-right: 0px' : ''}}">
                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('home')}}">{{ \App\CPU\translate('Home')}}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                               data-toggle="dropdown">{{ \App\CPU\translate('brand') }}</a>
                            <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}} scroll-bar"
                                style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                @foreach(\App\CPU\BrandManager::get_brands() as $brand)
                                    <li style="border-bottom: 1px solid #e3e9ef; display:flex; justify-content:space-between; ">
                                        <div>
                                            <a class="dropdown-item"
                                               href="{{route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])}}">
                                                {{$brand['name']}}
                                            </a>
                                        </div>
                                        <div class="align-baseline">
                                            @if($brand['brand_products_count'] > 0 )
                                                <span class="count-value px-2">( {{ $brand['brand_products_count'] }} )</span>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                                <li style="border-bottom: 1px solid #e3e9ef; display:flex; justify-content:center; ">
                                    <div>
                                        <a class="dropdown-item" href="{{route('brands')}}">
                                            {{ \App\CPU\translate('View_more') }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link text-capitalize" href="{{route('products',['data_from'=>'discounted','page'=>1])}}">{{ \App\CPU\translate('discounted_products')}}</a>
                        </li>

                        <li class="nav-item dropdown {{request()->is('/')?'active':''}}">
                            <a class="nav-link" href="{{route('sellers')}}">{{ \App\CPU\translate('Sellers')}}</a>
                        </li>

                        @php($seller_registration=\App\Model\BusinessSetting::where(['type'=>'seller_registration'])->first()->value)
                        @if($seller_registration)
                            <li class="nav-item">
                                <div class="dropdown">
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                         style="min-width: 165px !important; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                        <a class="dropdown-item" href="{{route('shop.apply')}}">
                                            <b>{{ \App\CPU\translate('Become a')}} {{ \App\CPU\translate('Seller')}}</b>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('seller.auth.login')}}">
                                            <b>{{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('login')}} </b>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endif

                        @php( $local = \App\CPU\Helpers::default_lang())
                        <li class="nav-item">
                            <div class="nav-link dropdown disable-autohide text-center {{Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'}} text-capitalize">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    @foreach(json_decode($language['value'],true) as $data)
                                        @if($data['code']==$local)
                                            <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}" width="20"
                                                 src="{{asset('assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                                 alt="Eng">
                                            {{$data['name']}}
                                        @endif
                                    @endforeach
                                </a>
                                <ul class="dropdown-menu dropdown-menu-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}"
                                    style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                    @foreach(json_decode($language['value'],true) as $key =>$data)
                                        @if($data['status']==1)
                                            <li>
                                                <a class="dropdown-item pb-1" href="{{route('lang',[$data['code']])}}">
                                                    <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                                         width="20"
                                                         src="{{asset('assets/front-end')}}/img/flags/{{$data['code']}}.png"
                                                         alt="{{$data['name']}}"/>
                                                    <span style="text-transform: capitalize">{{\App\CPU\Helpers::get_language_name($data['code'])}}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                <div> 
                    <form  action="{{route('products')}}" type="submit" class="search_form form-inline my-2 my-lg-0">
                        
                          
                            
                        
                        <div class="input-group my-2 my-sm-0 mx-2">
                          <input
                            class="form-control"
                            type="text"
                            autocomplete="off"
                            placeholder="{{\App\CPU\translate('search')}}" name="name"
                            aria-label="Search"
                            name="name"/>
                          <input name="data_from" value="search" hidden>
                          <input name="page" value="1" hidden>
                          <div class="input-group-prepend" style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};">
                            <button type="btn" class="btn btn-success" style="border-radius: {{Session::get('direction') === "rtl" ? '7px 0px 0px 7px; right: unset; left: 0' : '0px 7px 7px 0px; left: unset; right: 0'}};">{{\App\CPU\translate('search')}}</button>
                            <!-- <span class="input-group-text" style="font-size: 20px;">
                                <i class="czi-search text-white"></i>
                                
                            </span> -->
                          </div>
                        </div>
                        <diV class="card search-card"
                             style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                            <div class="card-body search-result-box" id=""
                                 style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                        </diV>
                        @if(auth('customer')->check())
                          <a class="btn btn-success my-2 my-sm-0 mx-2 text-white" href="{{route('customer.auth.logout')}}">
                            <i class="fa fa-user-circle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>{{ \App\CPU\translate('logout')}}
                          </a>
                        @else
                          <a class="btn btn-outline-success my-2 my-sm-0 mx-2" href="{{route('customer.auth.login')}}">
                            <i class="fa fa-sign-in {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i> {{\App\CPU\translate('sing_in')}}
                          </a>
                          <a class="btn btn-success my-2 my-sm-0 mx-2 text-white" href="{{route('customer.auth.register')}}">
                            <i class="fa fa-user-circle {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>{{\App\CPU\translate('sing_up')}}
                          </a>
                        @endif
                        @if(auth('customer')->check())
                            <div class="dropdown">
                                <a class="navbar-tool ml-2 mr-2 " type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                    <div class="navbar-tool-icon-box bg-secondary">
                                        <div class="navbar-tool-icon-box bg-secondary">
                                            <img style="width: 40px;height: 40px"
                                                src="{{asset('storage/profile/'.auth('customer')->user()->image)}}"
                                                onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                class="img-profile rounded-circle">
                                        </div>
                                    </div>
                                    <div class="navbar-tool-text">
                                        <small>{{\App\CPU\translate('hello')}}, {{auth('customer')->user()->f_name}}</small>
                                        {{\App\CPU\translate('dashboard')}}
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"
                                    href="{{route('account-oder')}}"> {{ \App\CPU\translate('my_order')}} </a>
                                    <a class="dropdown-item"
                                    href="{{route('user-account')}}"> {{ \App\CPU\translate('my_profile')}}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                    href="{{route('customer.auth.logout')}}">{{ \App\CPU\translate('logout')}}</a>
                                </div>
                            </div>  
                        @endif
                        <div id="cart_items">
                            @include('layouts.front-end.partials.cart')
                        </div>
                        
                        
                    </form>
                </div>
            
        </nav>
    </div>
</header>

<script>
function myFunction() {
  $('#anouncement').addClass('d-none').removeClass('d-flex')
}
</script>
