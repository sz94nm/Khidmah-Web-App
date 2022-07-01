@extends('layouts.front-end.app')

@section('title',ucfirst($data['data_from']).' products')

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/company')}}/{{$web_config['web_logo']}}"/>
    <meta property="og:title" content="Products of {{$web_config['name']}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/company')}}/{{$web_config['web_logo']}}"/>
    <meta property="twitter:title" content="Products of {{$web_config['name']}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">
    <style>
/* navbar */
.sidebar {
  height: 100vh;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  box-shadow: 5px 7px 25px #999;
}

.bottom-border {
  border-bottom: 1px groove #eee;
}

.sidebar-link {
  transition: all 0.4s;
}

.sidebar-link:hover {
  background-color: #444;
  border-radius: 5px;
}

.current {
  background-color: #f44336;
  border-radius: 7px;
  box-shadow: 2px 5px 10px #111;
  transition: all 0.3s;
}

.current:hover {
  background-color: #f66436;
  border-radius: 7px;
  box-shadow: 2px 5px 20px #111;
  transform: translateY(-1px);
}

.search-input {
  background: transparent;
  border: none;
  border-radius: 0;
  border-bottom: 2px solid #999;
  transition: all 0.4s;
}
@media screen and (min-width: 990px) and (max-width: 1200px){
  .img-item-res {
    height: 300px !important;
    object-fit: cover;
    border-top-right-radius: 0.4375rem;
    border-top-left-radius: 0.4375rem;
  }
}
/* .search-input:focus {
  background: transparent;
 
  box-shadow: none;
  border-bottom: 2px solid #dc3545;
} */

/* .search-button {
  border-radius: 50%;
  padding: 10px 16px;
  transition: all 0.4s;
} */

/* .search-button:hover {
  background-color: #eee;
  transform: translateY(-1px);
}

.icon-parent {
  position: relative;
}

.icon-bullet::after {
  content: "";
  position: absolute;
  top: 7px;
  left: 15px;
  height: 12px;
  width: 12px;
  background-color: #f44336;
  border-radius: 50%;
} */

/* css media */
/* solve problem of responsive in small screen that can not solve by bootstrap */
@media (max-width: 990px) {
  .sidebar {
    position: static;
    /* not 100vh */
    height: auto;
  }

  .top-navbar {
    position: static;
  }
}

.filtering p {
  cursor: pointer;
}
.m-100-z-index {
  z-index: -100 !important;
}
nav {
  z-index: 1030 !important;
}
.w-35 {
  width: 30%;
}
.flex-wrap {
  flex-wrap: wrap;
}
/* end of task list */
.hidden-nav {
    display: none !important; 
}
.footer-hide {
  display: none !important;
}
</style>
<!-- Footer -->
<style>
    /* .text-at-arabic:lang(Arabic) {
        text-align: left !important;
    } */
    .social-media :hover {
        color: {{$web_config['secondary_color']}} !important;
    }
    .widget-list-link{
        color: #999898 !important;
    }

    .widget-list-link:hover{
        color: white !important;
    }
    * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
}

.gallery {
  background: #eee;
}

.gallery-cell {
  /* width: 28%; */
  /* height: 300px; */
  margin-right: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  /* background: url("../assets/images/categories-3.jpg"); */
  /* counter-increment: gallery-cell; */
}

/* .gallery-cell.is-selected {
  background: #ed2;
} */

/* cell number */
/* .gallery-cell:before {
  display: block;
  text-align: center;
  content: counter(gallery-cell);
  line-height: 200px;
  font-size: 80px;
  color: white;
} */

@media screen and (max-width: 768px) {
    .flex-row {
        flex-direction: column !important
    }
  .order-in-m-1 {
    order: 0;
  }
  .justify-content-center-at-small {
      justify-content: center !important
  }
  .text-center-at-small {
      margin-top: 1rem;
      text-align: center !important
  }
   .order-in-m-2 {
    order: 1;
  }
  .order-in-m-3 {
    order: 2;
  } 
}

.border-secondary {
  opacity: 1;
}
button.active {
  background-color: white !important;
}
.row {
  margin-right: 0 !important;
  margin-left: 0 !important;
}
nav:lang(sa) { 
  direction: rtl !important
}
.fixed-top:lang(sa) {
    position: fixed;
    top: 0 !important;
    right: 0 !important;
    left: auto;
    z-index: 1030;
}
.ml-auto:lang(sa) {
  margin-right: auto !important;
  margin-left: 0px !important;
}
.col-xl-10.fixed-top:lang(sa) {
  position: fixed;
    top: 0 !important;
    left:  0 !important;
    right: auto;
    z-index: 1030;
}
#ajax-products:lang(sa) {
  direction: rtl
}
.text-right:lang(sa) {
  text-align: left !important;
} 
</style>
@endpush


@section('content')
<!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block">
    <button
      class="navbar-toggler ml-auto mb-2 bg-light"
      type="button"
      data-toggle="collapse"
      data-target="#myNavbar"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <div class="container-fluid justify-content-center">
        <div class="row">
          <!-- sidebar -->
          <div class="col-xl-2 col-lg-3 col-md-12 sidebar fixed-top bg-light">
            <!-- d-block to take all width , the padding is from col class -->
            <a
              href="#"
              class="navbar-brand d-block mx-auto text-center py-3 mb-2 bottom-border"
              >جميع الأصناف</a
            >
            <div class="bottom-border mb-2">
              <p class="text-center">حدد أحتياجك بدقة</p>
            </div>
            <div
              class="form-inline justify-content-center align-items-center mb-2"
            >
              <form  action="{{route('products')}}" type="submit" class="search_form form-inline my-2 my-lg-0">
                    <div class="input-group">
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
                        
                      </div>
                    </div>
                    <diV class="card search-card"
                         style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                        <div class="card-body search-result-box" id=""
                             style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                    </diV>
                </form>
            </div>
            <p class="text-center h5 mb-4">الترتيب بحسب</p>
            
            <div class="filtering">
              <div class="d-flex justify-content-center">
                <p>الأحدث</p>
              </div>
              <div class="d-flex justify-content-center">
                <p>الأعلى تقيماً</p>
              </div>
              <div class="d-flex justify-content-center">
                <p>الأكثر مبيعاً</p>
              </div>
              <div class="d-flex justify-content-center">
                <p>الأحرف الأبجدية</p>
              </div>
              <div class="d-flex justify-content-center">
                <p>الأعلى سعراً</p>
              </div>
              <div class="d-flex justify-content-center">
                <p>الأقل سعراً</p>
              </div>
            </div>
          </div>

          <div
            class="col-xl-10 col-lg-9 col-md-12 ml-auto bg-light fixed-top py-2 top-navbar m-100-z-index d-none d-lg-block">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                            {{-- @if($seller_registration)
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="color: white;margin-top: 5px; padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0">
                                            {{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('zone')}}
                                        </button>
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
                            @endif --}}

                         </ul>
                         <div class="search_form form-inline my-2 my-lg-0"> 
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
                              <div id="cart_items">
                                  @include('layouts.front-end.partials.cart')
                              </div>
                          </div>
                    </div>
                </nav>
                
          </div>
          <!-- end of sidebar -->
        </div>
      </div>
    </div>
  </nav>
  <div class="d-block d-lg-none">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                      style="color: white;margin-top: 5px; padding-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 0">
                                  {{ \App\CPU\translate('Seller')}}  {{ \App\CPU\translate('zone')}}
                              </button>
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
                  <div id="cart_items">
                      @include('layouts.front-end.partials.cart')
                  </div>
              </form>
          </div>
      
  </nav>
  
    <div class="row">
      <div class="col-12">
        <p class="text-center h5 my-2">الترتيب بحسب</p>
        <div
              
          class="small-screen-filtering d-flex justify-content-center align-items-center flex-wrap mb-2"
        >
          <span class="badge badge-info px-4 py-2 mx-2 mb-2 cursour-ponter" style="cursor: pointer"
            >الأحدث</span
          >
          <span class="badge badge-info px-4 py-2 mx-2 mb-2" style="cursor: pointer">الأعلى تقيماً</span>
          <span class="badge badge-info px-4 py-2 mx-2 mb-2" style="cursor: pointer">الأعلى تقيماً</span>
          <span class="badge badge-info px-4 py-2 mx-2 mb-2" style="cursor: pointer">الأكثر مبيعاً</span>
          <span class="badge badge-info px-4 py-2 mx-2 mb-2" style="cursor: pointer">الأحرف الأبجدية</span>
          <span class="badge badge-info px-4 py-2 mx-2 mb-2" style="cursor: pointer">الأعلى سعراً</span>
          <span class="badge badge-info px-4 py-2 mx-2 mb-2" style="cursor: pointer">الأقل سعراً</span>
            
        </div>
      </div>
    </div>
  </div>
<section>
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-xl-10 col-lg-9 col-md-12 ml-auto">
          
            @if (count($products) > 0)
                    <div class="row pt-lg-5 mt-lg-5 mb-5" id="ajax-products">
                        @include('web-views.products._ajax-products',['products'=>$products])
                    </div>
                @else
                    <div class="text-center pt-5">
                        <h2>{{\App\CPU\translate('No Product Found')}}</h2>
                    </div>
                @endif
          
        </div>
         <div class="footer rtl col-xl-10 col-lg-9 col-md-12 ml-auto mr-0 pr-0 mb-3">
    <hr class="border-secondary bg-success" />
    <div class="row justfiy-content-between align-items-center flex-row">
      <div
        class="col-6 col-md-4 d-flex justify-content-start justify-content-center-at-small align-items-center order-in-m-1"
      >
      <a class="d-inline-block mt-n1 text-center" href="{{route('home')}}">
        <img  
             src="{{asset("storage/company/")}}/{{ $web_config['footer_logo']->value }}"
             onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
             alt="{{ $web_config['name']->value }}"/
             style="width:40px;height:auto;">
        </a>
        
      </div>
      <div class="col-12 col-md-4 mt-2 mt-md-0 order-in-m-3">
        <p class="text-center text-secondary">
            {{ $web_config['copyright_text']->value }}
        </p>
      </div>
      <div class="col-6 col-md-4 order-in-m-2" style="direction: rtl">
        <p class="text-right text-center-at-small text-at-arabic">
          <i class="fa fab fa-google mx-2 cursor-pointer"> </i>
          <i class="fa fab fa-facebook-f mx-2 cursor-pointer"></i>
          <i class="fa fab fa-twitter mx-2 cursor-pointer"> </i>
        </p>
      </div>
    </div>
  </div>
      </div>
    </div>
   
  </section>

  
    <!-- Page Title-->
    <div class="rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row">
            <!-- <div class="col-md-3">
                <a class="openbtn-tab mt-5" onclick="openNav()">
                    <div style="font-size: 20px; font-weight: 600; " class="for-tab-display mt-5">
                        <i class="fa fa-filter"></i>
                        {{\App\CPU\translate('filter')}}
                    </div>
                </a></div> -->
            <!-- <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        {{-- if need data from also --}}
                        {{-- <h1 class="h3 text-dark mb-0 headerTitle text-uppercase">{{\App\CPU\translate('product_by')}} {{$data['data_from']}} ({{ isset($brand_name) ? $brand_name : $data_from}})</h1> --}}
                        <h1 class="h3 text-dark mb-3 headerTitle text-uppercase">
                            {{$data['data_from']}} {{\App\CPU\translate('products')}} {{ isset($brand_name) ? '('.$brand_name.')' : ''}}
                            <label>( {{$products->total()}} {{\App\CPU\translate('items found')}} )</label>
                        </h1>
                    </div>
                    <div class="row col-md-6 for-display mx-0">

                        <button class="openbtn text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}" onclick="openNav()">
                            <div style="margin-bottom: -30%;">
                                <i class="fa fa-filter"></i>
                                {{\App\CPU\translate('filter')}}
                            </div>
                        </button>

                        <div class="d-flex flex-wrap mt-5 float-right for-shoting-mobile">
                            <form id="search-form" action="{{ route('products') }}" method="GET">
                                <input hidden name="data_from" value="{{$data['data_from']}}">
                                <div class="form-inline flex-nowrap pb-3 for-mobile">
                                    <label
                                        class="opacity-75 text-nowrap {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} for-shoting"
                                        for="sorting">
                                        <span
                                            class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">{{\App\CPU\translate('sort_by')}}</span></label>
                                    <select style="background: white; appearance: auto;"
                                            class="form-control custom-select" onchange="filter(this.value)">
                                        <option value="latest">{{\App\CPU\translate('Latest')}}</option>
                                        <option
                                            value="low-high">{{\App\CPU\translate('Low_to_High')}} {{\App\CPU\translate('Price')}} </option>
                                        <option
                                            value="high-low">{{\App\CPU\translate('High_to_Low')}} {{\App\CPU\translate('Price')}}</option>
                                        <option
                                            value="a-z">{{\App\CPU\translate('A_to_Z')}} {{\App\CPU\translate('Order')}}</option>
                                        <option
                                            value="z-a">{{\App\CPU\translate('Z_to_A')}} {{\App\CPU\translate('Order')}}</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Page Content-->
    
@endsection

@push('script')
    <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "50%";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

        function filter(value) {
            $.get({
                url: '{{url('/')}}/products',
                data: {
                    id: '{{$data['id']}}',
                    name: '{{$data['name']}}',
                    data_from: '{{$data['data_from']}}',
                    min_price: '{{$data['min_price']}}',
                    max_price: '{{$data['max_price']}}',
                    sort_by: value
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-products').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }

        function searchByPrice() {
            let min = $('#min_price').val();
            let max = $('#max_price').val();
            $.get({
                url: '{{url('/')}}/products',
                data: {
                    id: '{{$data['id']}}',
                    name: '{{$data['name']}}',
                    data_from: '{{$data['data_from']}}',
                    sort_by: '{{$data['sort_by']}}',
                    min_price: min,
                    max_price: max,
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-products').html(response.view);
                    $('#paginator-ajax').html(response.paginator);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }

        $('#searchByFilterValue, #searchByFilterValue-m').change(function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });

        $("#search-brand").on("keyup", function () {
            var value = this.value.toLowerCase().trim();
            $("#lista1 div>li").show().filter(function () {
                return $(this).text().toLowerCase().trim().indexOf(value) == -1;
            }).hide();
        });
    </script>
@endpush
