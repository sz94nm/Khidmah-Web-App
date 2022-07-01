@extends('layouts.front-end.app')

@section('title','Track Order')

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="{{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="{{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <link rel="stylesheet" media="screen"
          href="{{asset('assets/front-end')}}/vendor/nouislider/distribute/nouislider.min.css"/>
@endpush
<style>
    .opacity-0-8 {
        opacity: 1 !important;
    }
    .fixed-top {
        position: relative !important;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1030;
    }

    .nav-link {
    transition: color 0.25s ease-in-out, background-color 0.25s ease-in-out, box-shadow 0.25s ease-in-out, border-color 0.25s ease-in-out;
    font-weight: normal
}

.nav-tabs {
    margin-bottom: 1.25rem
}

.nav-tabs .nav-item {
    margin-bottom: -1px
}

.nav-tabs .nav-link {
    position: relative;
    border: 0;
    color: #4b566b;
    font-weight: normal
}

.nav-tabs .nav-link::before {
    position: absolute;
    display: block;
    bottom: 0;
    left: 1.25rem;
    width: calc(100% - (1.25rem * 2));
    height: 2px;
    transition: color 0.25s ease-in-out, background-color 0.25s ease-in-out, box-shadow 0.25s ease-in-out, border-color 0.25s ease-in-out;
    background-color: transparent;
    content: ''
}


.nav-tabs.nav-fill .nav-link::before, .nav-tabs.nav-justified .nav-link::before {
    left: 0;
    width: 100%
}

.media-tabs {
    border: 0
}

.media-tabs .nav-item {
    margin-bottom: 0;
    text-align: left
}

.media-tabs .nav-link {
    padding: .375rem .625rem
}

.media-tabs .nav-link::before {
    display: none !important
}

.media-tab-media {
    position: relative;
    width: 3.75rem;
    height: 3.75rem;
    transition: color 0.25s ease-in-out, background-color 0.25s ease-in-out, box-shadow 0.25s ease-in-out, border-color 0.25s ease-in-out;
    border: 1px solid #e3e9ef;
    border-radius: 50%;
    background-color: #fff;
    color: #4b566b;
    text-align: center;
    overflow: hidden
}

.media-tab-media > i {
    font-size: 1.25rem;
    line-height: calc(3.75rem - (1px * 2))
}

.media-tab-media > img {
    display: block;
    width: 100%;
    border-radius: 50%
}

.media-tab-title, .media-tab-subtitle {
    transition: color 0.25s ease-in-out, background-color 0.25s ease-in-out, box-shadow 0.25s ease-in-out, border-color 0.25s ease-in-out
}

a.nav-link:hover .media-tab-media {
    border-color: rgba(254, 105, 106, 0.35);
    color: #227d7d
}

.nav-link.active .media-tab-media, .nav-link.active:hover .media-tab-media {
    border-color: #227d7d;
    background-color: #227d7d;
    color: #fff;
    box-shadow: 0 0.5rem 1.125rem -0.5rem rgba(254, 105, 106, 0.9)
}

.nav-link.active .media-tab-title, .nav-link.active:hover .media-tab-title {
    color: #227d7d !important
}

.nav-link.active .media-tab-subtitle, .nav-link.active:hover .media-tab-subtitle {
    color: rgba(254, 105, 106, 0.65) !important
}

.nav-link.disabled .media-tab-media, .nav-link.completed .media-tab-media {
    background-color: #f6f9fc;
    color: #7d879c
}

.nav-link.disabled .media-tab-title {
    color: #7d879c
}

.nav-link.completed .media-tab-media {
    overflow: visible
}

.nav-link.completed .media-tab-media::after {
    position: absolute;
    top: -.175rem;
    right: -.175rem;
    width: 1.25rem;
    height: 1.25rem;
    border-radius: 50%;
    background: #eafaf3;
    border: 1px solid #227d7d;
    color: #227d7d;
    font-family: 'sixvalley-icons';
    font-size: .625rem;
    font-weight: 500;
    line-height: 1.25rem;
    content: '\e91d'
}

.nav-pills .nav-item {
    margin-right: .6666666667rem
}

.nav-pills .nav-item:last-child {
    margin-right: 0
}

.nav-pills.flex-column .nav-item {
    margin-right: 0;
    margin-bottom: .6666666667rem
}

.nav-pills.flex-column .nav-item:last-child {
    margin-bottom: 0
}

.nav-pills .nav-link {
    padding-top: .675rem;
    padding-bottom: .675rem;
    background-color: #f3f5f9;
    color: #4b566b;
    font-size: .9375rem
}

.nav-pills .nav-link:hover:not(.active):not([aria-expanded=true]) {
    color: #4b566b;
    background-color: #dfe4ef
}

.nav-pills .nav-link.disabled {
    background-color: #fafbfc;
    color: #7d879c
}

.nav-pills .nav-link.disabled:hover:not(.active) {
    background-color: transparent
}

.nav-pills .nav-link.active {
    box-shadow: 0 0.5rem 1.125rem -0.5rem rgba(254, 105, 106, 0.9)
}

.nav-pills .nav-link i {
    margin-top: -.25rem
}

.modal-content .card-header-tabs {
    margin-right: -1.25rem;
    margin-bottom: -1rem;
    margin-left: -1.25rem
}

.sidenav {
    position: relative;
    margin-right: -15px;
    margin-left: -15px
}

.sidenav-body {
    padding: 0 1.5rem
}

.sidenav-body .widget-links {
    margin-left: -1.5rem
}

.sidenav-body .widget-title {
    padding-left: 1.5rem
}

.sidenav-body .widget-list-link {
    padding-left: 1.375rem;
    border-left: .125rem solid transparent
}

.sidenav-body .active > .widget-list-link {
    border-left-color: #fe696a
}

.sidenav-body .widget-light .active > .widget-list-link {
    border-left-color: #fff
}

@media (min-width: 992px) {
    .secondary-nav.collapse {
        display: block;
        height: 100%
    }

    .sidenav-enabled {
        padding-left: 19rem
    }

    .sidenav {
        position: fixed;
        top: 0;
        left: 0;
        width: 19rem;
        height: 100%;
        margin: 0;
        z-index: 1020
    }

    .sidenav.collapse {
        display: block
    }

    .sidenav-header {
        padding: .8rem 1.5rem
    }

    .sidenav-body {
        position: absolute;
        left: 0;
        width: calc(100% - .25rem);
        height: calc(100% - 5rem);
        overflow-y: auto
    }

    .sidenav-body::-webkit-scrollbar {
        width: .1875rem;
        background-color: transparent;
        opacity: 0
    }

    .sidenav-body::-webkit-scrollbar-thumb {
        background-color: #515d74;
        border-radius: .09375rem
    }

    .sidenav-body .simplebar-track {
        background-color: transparent
    }

    .sidenav-body .simplebar-track .simplebar-scrollbar {
        background-color: #515d74
    }
}

@media (min-width: 1280px) {
    .sidenav-enabled {
        padding-left: 20.5rem
    }
}

.nav-link-style {
    color: #4b566b
}

.nav-link-style > i {
    margin-top: -.125rem;
    vertical-align: middle
}

.nav-link-style:hover {
    color: #fe696a
}

.active > .nav-link-style, .nav-link-style.active {
    color: #fe696a
}

.nav-link-style.nav-link-light {
    color: rgba(255, 255, 255, 0.65)
}

.nav-link-style.nav-link-light:hover {
    color: #fff
}

.active > .nav-link-style.nav-link-light, .nav-link-style.nav-link-light.active {
    color: #fff
}

.radio-tab-pane {
    display: none
}

.radio-tab-pane.active {
    display: block
}

.navbar-nav .nav-item {
    margin-bottom: .25rem
}

.navbar-nav .nav-link {
    padding-top: .5rem;
    padding-bottom: .5rem
}

.navbar-nav .dropdown-menu {
    min-width: 12.5rem;
    border-color: #e3e9ef;
    box-shadow: none
}

.navbar-nav .dropdown-menu .dropdown-menu {
    width: calc(100% - (1rem * 2));
    margin: 0 1rem;
    border-color: transparent;
    background-color: #f6f9fc
}

.navbar-toggler:focus {
    outline: none
}

.navbar.fixed-top {
    position: relative
}

.navbar-floating {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1030
}

.navbar-floating .navbar-collapse .navbar-nav {
    padding: .5rem 1.5rem
}

.navbar-floating .navbar-collapse {
    border-radius: .3125rem
}

.navbar-floating.navbar-dark .navbar-collapse {
    background-color: #2b3445
}

.navbar-floating.navbar-light .navbar-collapse {
    background-color: #fff;
    box-shadow: 0 0.25rem 0.5625rem -0.0625rem rgba(0, 0, 0, 0.03), 0 0.275rem 1.25rem -0.0625rem rgba(0, 0, 0, 0.05)
}

.navbar-stuck-logo {
    display: none
}

.mega-nav {
    position: relative
}

.mega-nav::after {
    display: none;
    position: absolute;
    top: 50%;
    right: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 1px;
    height: 1.875rem;
    content: ''
}

.mega-dropdown-column {
    width: 15rem
}

.mega-nav .dropdown-menu > .mega-dropdown {
    position: static
}

.mega-nav .dropdown-menu > .dropdown > a {
    padding-top: .67rem;
    padding-bottom: .70rem;
    border-bottom: 1px solid #e3e9ef
}

.mega-nav .dropdown-menu > .dropdown:last-child > a {
    border-bottom: 0
}

.navbar-tool {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center
}

.navbar-tool.dropdown::before {
    position: absolute;
    bottom: -1rem;
    left: -10%;
    width: 120%;
    height: 1rem;
    content: ''
}

.navbar-tool .dropdown-menu {
    margin-top: .5rem !important
}

.navbar-tool .navbar-tool-label {
    position: absolute;
    top: -.3125rem;
    right: -.3125rem;
    width: 1.25rem;
    height: 1.25rem;
    border-radius: 50%;
    background-color: #fe696a;
    color: #fff;
    font-size: .75rem;
    font-weight: 500;
    text-align: center;
    line-height: 1.25rem
}

.navbar-tool .navbar-tool-tooltip {
    display: none
}

@media (min-width: 992px) {
    .navbar-tool .navbar-tool-tooltip {
        display: block;
        position: absolute;
        top: -.5rem;
        left: 50%;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        transition: opacity .2s ease-in-out, top .2s ease-in-out;
        padding: .0625rem .375rem;
        border-radius: .1875rem;
        background-color: #2b3445;
        color: #fff;
        font-size: .6875rem;
        white-space: nowrap;
        opacity: 0
    }

    .navbar-tool:hover .navbar-tool-tooltip {
        top: -.75rem;
        opacity: .9
    }
}

.navbar-tool-icon-box {
    position: relative;
    width: 2.875rem;
    height: 2.875rem;
    transition: color 0.25s ease-in-out;
    border-radius: 50%;
    line-height: 2.625rem;
    text-align: center
}

.navbar-tool-icon-box.dropdown-toggle::after {
    display: none
}

.navbar-tool-icon {
    font-size: 1.25rem;
    line-height: 2.875rem
}

.navbar-tool-text {
    display: none;
    -ms-flex-positive: 0;
    flex-grow: 0;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    padding-left: .875rem;
    transition: color 0.25s ease-in-out;
    font-size: .875rem;
    text-decoration: none !important;
    white-space: nowrap
}

.navbar-tool-text > small {
    display: block;
    margin-bottom: -.125rem
}

.dropdown .navbar-tool-text::after {
    display: inline-block;
    margin-left: .23375em;
    vertical-align: .23375em;
    content: "";
    border-top: .275em solid;
    border-right: .275em solid transparent;
    border-bottom: 0;
    border-left: .275em solid transparent
}

.dropdown .navbar-tool-text:empty::after {
    margin-left: 0
}

@media (max-width: 991.98px) {
    .search-box {
        display: none
    }
}

img, figure {
    max-width: 100% !important;
    height: auto !important;
    vertical-align: middle !important;
}
.modal-header {
    display: flex;
    align-items: center !important;
    justify-content: space-between;
    padding: 1rem 1rem;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: calc(0.3rem - 1px);
    border-top-right-radius: calc(0.3rem - 1px);
}
</style>
@section('content')
    <!-- Order Details Modal-->
    <?php
    $order = \App\Model\OrderDetail::where('order_id', $orderDetails->id)->get();
    ?>
    <div class="modal fade" id="order-details">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order No - {{$orderDetails['id']}}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body pb-0">
                    @php( $totalTax = 0)

                    @php($sub_total=0)
                    @php($total_tax=0)
                    @php($total_shipping_cost=0)
                    @php($total_discount_on_product=0)
                    @php($extra_discount=0)
                    @php($coupon_discount=0)
                    @foreach($order as $product)
                        @php($productDetails = App\Model\Product::where('id', $product->product_id)->first())

                        <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
                            <div class="media d-block d-sm-flex text-center text-sm-left">
                                <a class="d-inline-block mx-auto mr-sm-4"
                                   href="{{route('product',$productDetails->slug)}}" style="width: 10rem;">
                                    <img
                                        onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                        src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$productDetails['thumbnail']}}">
                                </a>
                                <div class="media-body pt-2">
                                    <h4 class="product-title font-size-base mb-2"><a
                                            href="{{route('product',$productDetails->slug)}}">{{$productDetails['name']}}</a>
                                    </h4>
                                    @if($product['variation'])
                                        @foreach(json_decode($product['variation'],true) as $key1 =>$variation)
                                            <div class="text-muted"><span
                                                    class="mr-2">{{$key1}} :</span>{{$variation}}</div>
                                        @endforeach
                                    @endif
                                    <div
                                        class="font-size-lg text-success pt-2">{{\App\CPU\Helpers::currency_converter($product['price'])}}</div>
                                </div>
                            </div>
                            <div class="pt-2 pl-sm-3 mx-auto mx-sm-0 text-center">
                                <div class="text-muted mb-2">Quantity:</div>{{$product['qty']}}
                            </div>
                            <div class="pt-2 pl-sm-2 mx-auto mx-sm-0 text-center">
                                <div class="text-muted mb-2">Tax:
                                </div>{{\App\CPU\Helpers::currency_converter($product['tax'])}}
                            </div>
                            <div class="pt-2 pl-sm-3 mx-auto mx-sm-0 text-center">
                                <div class="text-muted mb-2">Subtotal</div>{{\App\CPU\Helpers::currency_converter($product['price']*$product['qty'])}}
                            </div>
                        </div>
                        @php($sub_total+=$product['price']*$product['qty'])
                        @php($total_tax+=$product['tax'])
                        @php($total_discount_on_product+=$product['discount'])
                    @endforeach

                    @php($total_shipping_cost=$orderDetails['shipping_cost'])
                    
                    <?php
                            if ($orderDetails['extra_discount_type'] == 'percent') {
                                $extra_discount = ($sub_total / 100) * $orderDetails['extra_discount'];
                            } else {
                                $extra_discount = $orderDetails['extra_discount'];
                            }
                            if(isset($orderDetails['discount_amount'])){
                                $coupon_discount =$orderDetails['discount_amount'];
                            }
                        ?>
                </div>
                <!-- Footer-->
                <div class="modal-footer flex-wrap justify-content-between bg-light font-size-md">
                    
                        <div class="px-2 py-1">
                            <span
                                class="text-muted">Subtotal:&nbsp;</span>{{\App\CPU\Helpers::currency_converter($sub_total)}}
                            <span></span>
                        </div>
                        <div class="px-2 py-1">
                            <span
                                class="text-muted">Shipping:&nbsp;</span>{{\App\CPU\Helpers::currency_converter($total_shipping_cost)}}
                            <span></span>
                        </div>
                        <div class="px-2 py-1">
                            <span class="text-muted">Tax:&nbsp;</span> {{\App\CPU\Helpers::currency_converter($total_tax)}}
                            <span></span>
                        </div>
    
                        <div class="px-2 py-1">
                            <span
                                class="text-muted">Discount:&nbsp;</span>
                            - {{\App\CPU\Helpers::currency_converter($total_discount_on_product)}}
                            <span></span>
                        </div>
                </div>
                <div class="modal-footer flex-wrap justify-content-between bg-light font-size-md">
                    <div class="px-2 py-1">
                        <span
                            class="text-muted">Coupon Discount:&nbsp;</span>
                        - {{\App\CPU\Helpers::currency_converter($coupon_discount)}}
                        <span></span>
                    </div>
                    @if ($orderDetails['order_type'] == 'POS')
                    <div class="px-2 py-1">
                        <span
                            class="text-muted">Extra Discount:&nbsp;</span>
                        - {{\App\CPU\Helpers::currency_converter($extra_discount)}}
                        <span></span>
                    </div>
                    @endif
                    <div class="px-2 py-1">
                        <span class="text-muted">Total:&nbsp; </span>
                        <span class="font-size-lg">
                             {{\App\CPU\Helpers::currency_converter($sub_total+$total_tax+$total_shipping_cost-($orderDetails->discount)-$total_discount_on_product - $coupon_discount - $extra_discount)}}
                        </span>
                    </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Page Title (Dark)-->
    <div class="container">

        <div class="pt-3 pb-3">
            <h2>My Order</h2>
        </div>
        <div class="btn-primary">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3 bg-success">

                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h4 class="text-light mb-0">Order ID : <span
                            class="h4 font-weight-normal text-light">{{$orderDetails['id']}}</span></h4>
                </div>
            </div>
        </div>

    </div>
    <!-- Page Content-->
    <div class="container">
        <!-- Details-->
        <div class="row" style="background: #e2f0ff; margin: 0; width: 100%;">
            <div class="col-sm-4">
                <div class="pt-2 pb-2 text-center rounded-lg">
                    <span class="font-weight-medium text-dark mr-2">Order Status:</span><br>
                    <span class="text-uppercase ">{{$orderDetails['order_status']}}</span>
                    {{-- <span class="text-uppercase ">Courier</span> --}}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="pt-2 pb-2 text-center rounded-lg">
                    <span class="font-weight-medium text-dark mr-2">Payment Status:</span> <br>
                    <span class="text-uppercase">{{$orderDetails['payment_status']}}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="pt-2 pb-2 text-center rounded-lg">
                    <span class="font-weight-medium text-dark mr-2"> Estimated Delivary Date: </span> <br>
                    <span class="text-uppercase"
                          style="font-weight: 600; color: {{$web_config['primary_color']}}">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$orderDetails['updated_at'])->format('Y-m-d')}}</span>
                </div>
            </div>
        </div>
        <!-- Progress-->
        <div class="card border-0 box-shadow-lg mt-5">
            <div class="card-body pb-4">
                <ul class="nav nav-tabs media-tabs nav-justified">
                    @if ($orderDetails['order_status']!='returned' && $orderDetails['order_status']!='failed')

                        <li class="nav-item">
                            <div class="nav-link">
                                <div class="align-items-center">
                                    <div class="media-tab-media"
                                         style="margin: 0 auto; background: #227d7d; color: white;">
                                        <i class="czi-check"></i>
                                    </div>
                                    <div class="media-body" style="text-align: center;">
                                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">First step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Order placed</h6>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item ">
                            <div class="nav-link ">
                                <div class="align-items-center">
                                    <div class="media-tab-media"
                                         style="margin: 0 auto; @if(($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='delivered')) background: #227d7d; color: white; @endif ">
                                        @if(($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='delivered'))
                                            <i class="czi-check"></i>
                                        @endif
                                    </div>
                                    <div class="media-body" style="text-align: center;">
                                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Second step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Processing order</h6>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="nav-link  ">
                                <div class="align-items-center">
                                    <div class="media-tab-media"
                                         style="margin: 0 auto; @if(($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='delivered')) background: #227d7d; color: white; @endif ">
                                        @if(($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='delivered'))
                                            <i class="czi-check"></i>
                                        @endif
                                    </div>
                                    <div class="media-body" style="text-align: center;">
                                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Third step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Preparing Shipment</h6>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="nav-link ">
                                <div class="align-items-center">
                                    <div class="media-tab-media"
                                         style="margin: 0 auto; @if(($orderDetails['order_status']=='delivered')) background: #227d7d; color: white; @endif">
                                        @if(($orderDetails['order_status']=='delivered'))
                                            <i class="czi-check"></i>
                                        @endif
                                    </div>
                                    <div class="media-body" style="text-align: center;">
                                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Fourth step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Order Shipped</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @elseif($orderDetails['order_status']=='returned')
                        <li class="nav-item">
                            <div class="nav-link" style="text-align: center;">
                                <h1 class="text-warning">Product Successfully Returned</h1>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <div class="nav-link" style="text-align: center;">
                                <h1 class="text-danger">Sorry we can't complete your order</h1>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
        <!-- Footer-->
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-3">
            <div class="custom-control custom-checkbox mt-1 mr-3">
            </div>
            <a class="btn btn-success text-white btn-sm mt-2 mb-5" href="#order-details" data-toggle="modal">View Order Details</a>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('assets/front-end')}}/vendor/nouislider/distribute/nouislider.min.js"></script>
@endpush
