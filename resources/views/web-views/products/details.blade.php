@extends('layouts.front-end.app')

@section('title',$product['name'])

@push('css_or_js')
    <meta name="description" content="{{$product->slug}}">
    <meta name="keywords" content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
    @if($product->added_by=='seller')
        <meta name="author" content="{{ $product->seller->shop?$product->seller->shop->name:$product->seller->f_name}}">
    @elseif($product->added_by=='admin')
        <meta name="author" content="{{$web_config['name']->value}}">
    @endif
    <!-- Viewport-->

    @if($product['meta_image']!=null)
        <meta property="og:image" content="{{asset("storage/product/meta")}}/{{$product->meta_image}}"/>
        <meta property="twitter:card"
              content="{{asset("storage/product/meta")}}/{{$product->meta_image}}"/>
    @else
        <meta property="og:image" content="{{asset("storage/product/thumbnail")}}/{{$product->thumbnail}}"/>
        <meta property="twitter:card"
              content="{{asset("storage/product/thumbnail/")}}/{{$product->thumbnail}}"/>
    @endif

    @if($product['meta_title']!=null)
        <meta property="og:title" content="{{$product->meta_title}}"/>
        <meta property="twitter:title" content="{{$product->meta_title}}"/>
    @else
        <meta property="og:title" content="{{$product->name}}"/>
        <meta property="twitter:title" content="{{$product->name}}"/>
    @endif
    <meta property="og:url" content="{{route('product',[$product->slug])}}">

    @if($product['meta_description']!=null)
        <meta property="twitter:description" content="{!! $product['meta_description'] !!}">
        <meta property="og:description" content="{!! $product['meta_description'] !!}">
    @else
        <meta property="og:description"
              content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
        <meta property="twitter:description"
              content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
    @endif
    <meta property="twitter:url" content="{{route('product',[$product->slug])}}">

    <link rel="stylesheet" href="{{asset('assets/front-end/css/product-details.css')}}"/>
    <style>
        .footer  {
            width: 100%
        }
        .fixed-top {
            position: relative !important;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }
        .opacity-0-8 {
            opacity: 1 !important;
        }
        .msg-option {
            display: none;
        }

        .chatInputBox {
            width: 100%;
        }

        .go-to-chatbox {
            width: 100%;
            text-align: center;
            padding: 5px 0px;
            display: none;
        }

        .feature_header {
            display: flex;
            justify-content: center;
        }

        .btn-number:hover {
            color: {{$web_config['secondary_color']}};

        }

        .for-total-price {
            margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: -30%;
        }

        .feature_header span {
            padding- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 15px;
            font-weight: 700;
            font-size: 25px;
            background-color: #ffffff;
            text-transform: uppercase;
        }

        @media (max-width: 768px) {
            .feature_header span {
                margin-bottom: -40px;
            }

            .for-total-price {
                padding- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 30%;
            }

            .product-quantity {
                padding- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 4%;
            }

            .for-margin-bnt-mobile {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 7px;
            }

            .font-for-tab {
                font-size: 11px !important;
            }

            .pro {
                font-size: 13px;
            }
        }

        @media (max-width: 375px) {
            .for-margin-bnt-mobile {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 3px;
            }

            .for-discount {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 10% !important;
            }

            .for-dicount-div {
                margin-top: -5%;
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: -7%;
            }

            .product-quantity {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 4%;
            }

        }

        @media (max-width: 500px) {
            .for-dicount-div {
                margin-top: -4%;
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: -5%;
            }

            .for-total-price {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: -20%;
            }

            .view-btn-div {

                margin-top: -9%;
                float: {{Session::get('direction') === "rtl" ? 'left' : 'right'}};
            }

            .for-discount {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 7%;
            }

            .viw-btn-a {
                font-size: 10px;
                font-weight: 600;
            }

            .feature_header span {
                margin-bottom: -7px;
            }

            .for-mobile-capacity {
                margin- {{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 7%;
            }
        }
        .object-fit-cover {
    object-fit: cover;
    border-radius: 0.25rem !important;
  height: 60vh !important;
}
.item-image-container {
  background-image: url("../assets/images/item-1.jpg");
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
  border-radius: 0.25rem;
  height: 60vh;
}
.item-color {
  color: var(--item-color);
}
hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-style: solid;
  border-top-width: 1px;
}
.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fbfbfb;
  background-clip: border-box;
  border: none;
  border-radius: 0.25rem;
}
.me-2 {
    margin-inline-end:1rem !important 
}

@media screen and (max-width: 280px) {
  * {
    transform: scale(0.991) !important;
  }
}
    </style>
    <style>
        th, td {
            border-bottom: 1px solid #ddd;
            padding: 5px;
        }

        thead {
            background: {{$web_config['primary_color']}} !important;
            color: white;
        }
       
    </style>
@endpush

@section('content')
    <?php
    $overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
    $rating = \App\CPU\ProductManager::get_rating($product->reviews);
    ?>
    <!-- Page Content-->
    
    <div class="container mt-2 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <!-- General info tab-->
        <div class="row" style="direction: ltr">
            <!-- Product gallery-->
            <div class="container" id="ali-custom">
        <div class="row mt-2">
            <div class="col-12 my-2">
                <div class="card">
                    @if($product->images!=null && json_decode($product->images)>0)
                        @foreach (json_decode($product->images) as $key => $photo)
                            <div class="d-flex align-items-center justify-content-center  {{$key==0?'active':''}}">
                                <img class="show-imag img-responsive object-fit-cover w-100" style="min-height: 500px!important;"
                                     onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                     src="{{asset("storage/product/$photo")}}"
                                     alt="Product image" width="">
                            </div>
                            
                        @endforeach
                    @endif
                    <div class="details" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"> 
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold">
                               <a href="{{route('product',$product->slug)}}" >{{$product->name}}</a>
                            </h5>
                            <h6 class="card-title text-center font-weight-bold item-color" class="{{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}">
                                
                                    {{\App\CPU\Helpers::get_price_range($product) }}
                                
                                @if($product->discount > 0)
                                    <strike >
                                        {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                                    </strike>
                                @endif
                            </h6>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="card-text mb-0 text-muted">الأستقطاع الشهري</p>
                                    <p
                                    class="card-text item-color text-center mt-0 font-weight-bold"
                                    id="set-discount-amount"
                                    >
                                        @if($product->discount > 0)
                                                    {{\App\CPU\translate('discount')}} 
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p class="card-text mb-0 text-muted">عدد الأقساط</p>
                                    <p
                                    class="card-text item-color text-center mt-0 font-weight-bold"
                                    >
                                    3
                                    </p>
                                </div>
                            </div>
                            <hr class="border-success" />
                            <p class="text-center text-muted"><a href="{{route('product',$product->slug)}}" >{{$product->name}}</a></p>
                            <hr class="border-success" />
                            <form id="add-to-cart-form" class="mb-2">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="row no-gutters" style="display:none">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2">{{\App\CPU\translate('Quantity')}}:</div>
                                    </div>
                                    <div class="col-10" \>
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="input-group input-group--style-2 pr-3"
                                                style="width: 160px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button"
                                                            data-type="minus" data-field="quantity"
                                                            disabled="disabled" style="padding: 10px">
                                                        -
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity"
                                                    class="form-control input-number text-center cart-qty-field"
                                                    placeholder="1" value="1" min="1" max="100">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="plus"
                                                            data-field="quantity" style="padding: 10px">
                                                    +
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="text-center">
                                    <p class="m-0 p-0 text-center">price after</p>
                                    <p class="m-0 p-0 text-center">520$</p>
                                </div>

                                <div class="d-flex justify-content-center align-items-center">
                                    <a
                                    onclick="buy_now()"
                                    class="btn btn-success text-center me-2   px-sm-2 px-md-4 px-lg-5 d-none d-md-block text-white text-center" 
                                    >
                                        {{\App\CPU\translate('buy_now')}}
                                    </a>
                                    

                                    <a
                                    onclick="addToCart()"
                                    class="btn btn-success text-center    px-sm-2 px-md-4 px-lg-5 d-none d-md-block text-white text-center"
                                    >
                                        {{\App\CPU\translate('add_to_cart')}}
                                    </a>
                                </div>
                                
                                    
                                <div class="provider-logo text-center">
                                    <p class="m-0 p-0 text-center">price before</p>
                                    <p class="m-0 p-0 text-center">400$</p>
                                </div>
                                </div>
                                <div
                                class="d-flex d-md-none justify-content-center align-items-center"
                                style="flex-direction: column"
                                >
                                    <a  class="btn btn-success text-center btn-block w-50 text-white"
                                    onclick="buy_now()"
                                        >{{\App\CPU\translate('buy_now')}}</a
                                    >
                                    <a
                                        onclick="addToCart()"
                                        class="btn btn-success text-center btn-block w-50 text-white"
                                        >
                                            {{\App\CPU\translate('add_to_cart')}}
                                    </a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    
       
   

    

    

    <div class="modal fade rtl" id="show-modal-view" tabindex="-1" role="dialog" aria-labelledby="show-modal-image"
         aria-hidden="true" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" style="display: flex;justify-content: center">
                    <button class="btn btn-default"
                            style="border-radius: 50%;margin-top: -25px;position: absolute;{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: -7px;"
                            data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <img class="element-center" id="attachment-view" src="">
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('script')

    <script type="text/javascript">
        cartQuantityInitialize();
        getVariantPrice();
        $('#add-to-cart-form input').on('change', function () {
            getVariantPrice();
        });

        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }
    </script>

    {{-- Messaging with shop seller --}}
    <script>
        $('#contact-seller').on('click', function (e) {
            // $('#seller_details').css('height', '200px');
            $('#seller_details').animate({'height': '276px'});
            $('#msg-option').css('display', 'block');
        });
        $('#sendBtn').on('click', function (e) {
            e.preventDefault();
            let msgValue = $('#msg-option').find('textarea').val();
            let data = {
                message: msgValue,
                shop_id: $('#msg-option').find('textarea').attr('shop-id'),
                seller_id: $('.msg-option').find('.seller_id').attr('seller-id'),
            }
            if (msgValue != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: '{{route('messages_store')}}',
                    data: data,
                    success: function (respons) {
                        console.log('send successfully');
                    }
                });
                $('#chatInputBox').val('');
                $('#msg-option').css('display', 'none');
                $('#contact-seller').find('.contact').attr('disabled', '');
                $('#seller_details').animate({'height': '125px'});
                $('#go_to_chatbox').css('display', 'block');
            } else {
                console.log('say something');
            }
        });
        $('#cancelBtn').on('click', function (e) {
            e.preventDefault();
            $('#seller_details').animate({'height': '114px'});
            $('#msg-option').css('display', 'none');
        });
    </script>

    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
            async="async"></script>
@endpush
