@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Welcome To').' '.$web_config['name']->value)

@push('css_or_js')
    <meta property="og:image" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <meta property="twitter:card" content="{{asset('storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Welcome To {{$web_config['name']->value}} Home"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{!! substr($web_config['about']->value,0,100) !!}">

    <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/home.css"/>
    <style>
        .media {
            background: white;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
        }

        .cz-countdown-days {
            color: white !important;
            background-color: {{$web_config['primary_color']}};
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .cz-countdown-hours {
            color: white !important;
            background-color: {{$web_config['primary_color']}};
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .cz-countdown-minutes {
            color: white !important;
            background-color: {{$web_config['primary_color']}};
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .cz-countdown-seconds {
            color: {{$web_config['primary_color']}};
            border: 1px solid{{$web_config['primary_color']}};
            padding: 0px 6px;
            border-radius: 3px !important;
        }

        .flash_deal_product_details .flash-product-price {
            font-weight: 700;
            font-size: 18px;
            color: {{$web_config['primary_color']}};
        }

        .featured_deal_left {
            height: 130px;
            background: {{$web_config['primary_color']}} 0% 0% no-repeat padding-box;
            padding: 10px 13px;
            text-align: center;
        }

        .category_div:hover {
            color: {{$web_config['secondary_color']}};
        }

        .deal_of_the_day {
            /* filter: grayscale(0.5); */
            opacity: .8;
            background: {{$web_config['secondary_color']}};
            border-radius: 3px;
        }

        .deal-title {
            font-size: 12px;

        }

        .for-flash-deal-img img {
            max-width: none;
        }

        @media (max-width: 375px) {
            .cz-countdown {
                display: flex !important;

            }

            .cz-countdown .cz-countdown-seconds {

                margin-top: -5px !important;
            }

            .for-feature-title {
                font-size: 20px !important;
            }
        }

        @media (max-width: 600px) {
            .flash_deal_title {
                /*font-weight: 600;*/
                /*font-size: 18px;*/
                /*text-transform: uppercase;*/

                font-weight: 700;
                font-size: 25px;
                text-transform: uppercase;
            }

            .cz-countdown .cz-countdown-value {
                font-family: "Roboto", sans-serif;
                font-size: 11px !important;
                font-weight: 700 !important;
            }

            .featured_deal {
                opacity: 1 !important;
            }

            .cz-countdown {
                display: inline-block;
                flex-wrap: wrap;
                font-weight: normal;
                margin-top: 4px;
                font-size: smaller;
            }

            .view-btn-div-f {

                margin-top: 6px;
                float: right;
            }

            .view-btn-div {
                float: right;
            }

            .viw-btn-a {
                font-size: 10px;
                font-weight: 600;
            }


            .for-mobile {
                display: none;
            }

            .featured_for_mobile {
                max-width: 100%;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 360px) {
            .featured_for_mobile {
                max-width: 100%;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .featured_deal {
                opacity: 1 !important;
            }
        }

        @media (max-width: 375px) {
            .featured_for_mobile {
                max-width: 100%;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .featured_deal {
                opacity: 1 !important;
            }
        }

        @media (min-width: 768px) {
            .displayTab {
                display: block !important;
            }
        }

        @media (max-width: 800px) {
            .for-tab-view-img {
                width: 40%;
            }

            .for-tab-view-img {
                width: 105px;
            }

            .widget-title {
                font-size: 19px !important;
            }
        }

        .featured_deal_carosel .carousel-inner {
            width: 100% !important;
        }

        .badge-style2 {
            color: black !important;
            background: transparent !important;
            font-size: 11px;
        }
        .czi-search::before {
        content: "\e972"
        }
    </style>

    <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/front-end')}}/css/owl.theme.default.min.css"/>
@endpush

@section('content')
    

   

    <!-- Products grid (featured products)-->
    @if(count($featured_products) > 0)
        <section class="container rtl">
            <!-- Heading-->
            <div class="section-header">
                <div class="feature_header">
                    <span class="for-feature-title">{{ \App\CPU\translate('featured_products')}}</span>
                </div>
                <div>
                    <a class="btn btn-outline-accent btn-sm viw-btn-a"
                       href="{{route('products',['data_from'=>'featured','page'=>1])}}">
                        {{ \App\CPU\translate('view_all')}}
                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'}}"></i>
                    </a>
                </div>
            </div>
        {{--<hr class="view_border">--}}
        <!-- Grid-->
            <div class="row mt-2 mb-3">
                @foreach($featured_products as $product)
                    <div class="col-xl-2 col-sm-3 col-6" style="margin-bottom: 10px">
                        @include('web-views.partials._single-product',['product'=>$product])
                        {{--<hr class="d-sm-none">--}}
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{--featured deal--}}
    @php($featured_deals=\App\Model\FlashDeal::with(['products.product.reviews'])->where(['status'=>1])->where(['deal_type'=>'feature_deal'])->first())

    @if(isset($featured_deals))
        <section class="container featured_deal rtl">
            <div class="row">
                <div class="col-xl-3 col-md-4 right">
                    <div class="d-flex align-items-center justify-content-center featured_deal_left">
                        <h1 class="featured_deal_title"
                            style="padding-top: 12px">{{ \App\CPU\translate('featured_deal')}}</h1>
                    </div>
                </div>

                <div class="col-xl-9 col-md-8">
                    <div class="owl-carousel owl-theme" id="web-feature-deal-slider">
                        @foreach($featured_deals->products as $key=>$product)
                            @include('web-views.partials._product-card-1',['product'=>$product->product])
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
   
    {{--categries--}}
        <!-- cats section  start-->

<div
    id="carouselExampleControlsNoTouching"
    class="carousel slide"
    data-touch="false"
    data-interval="false"
>
    <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('assets/front-end/img')}}/sliderrv/333.webp" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="{{asset('assets/front-end/img')}}/sliderrv/333.webp" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="{{asset('assets/front-end/img')}}/sliderrv/333.webp" class="d-block w-100" alt="..." />
          </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-target="#carouselExampleControlsNoTouching"
      data-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-target="#carouselExampleControlsNoTouching"
      data-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>

  <!-- cats section  end-->



  <p class="h2 text-center mt-5 mb-5">أقسام الخدمات</p>






<style>

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
  .order-in-m-1 {
    order: 1;
  }
  /* .order-in-m-2 {
    order: 2;
  }
  .order-in-m-3 {
    order: 3;
  } */
}

.border-secondary {
  opacity: 0.2;
}
button.active {
  background-color: white !important;
}
.row {
  margin-right: 0 !important;
  margin-left: 0 !important;
}
.carousel-image {
  height: 80vh;
}
.categories-img {
  box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.3);
  border-radius: 8px;
  cursor: pointer;
}
.categories-img:hover {
  transform: scale(1.02);
}
.categories-1-img {
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
  height: 250px;
}


.carding {
  background-color: white;
  border-radius: 0.25rem;
  /* rgba(0, 0, 0, 0.3) */
}
.box-shadow-gray {
  box-shadow: inset 1px 0px 1000px 0px rgba(0, 0, 0, 0.2);
}
.box-shadow-blue {
  box-shadow: inset 1px 0px 1000px 0px rgba(26, 80, 125, 0.2);
}
.box-shadow-red {
  box-shadow: inset 1px 0px 1000px 0px rgba(220, 53, 69, 0.2);
}
.box-shadow-orange {
  box-shadow: inset 1px 0px 1000px 0px rgba(253, 126, 20, 0.2);
}
.box-shadow-yellow {
  box-shadow: inset 1px 0px 1000px 0px rgba(255, 193, 7, 0.2);
}
.box-shadow-green {
  box-shadow: inset 1px 0px 1000px 0px rgba(40, 167, 69, 0.2);
}
.flickity-page-dots {
  display: none !important;
}
</style>


<section class="rtl">

    <div class="row">
            @foreach($categories as $category)
                 <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">

                    <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                         <div
                          class="categories-img categories-1-img d-flex justify-content-center align-items-center"
                          style="background-image: url('{{asset("storage/category/$category->icon")}}') ">

                             <p class="text-white h2 text-center"> {{$category->name}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
    </div> 
    

</section>



    <!-- top sellers -->
    @if(count($top_sellers) > 0)
        <section class="row rtl">
            <!-- Heading-->
            <div class="col-12"> 
                <div class="section-header">
                    <div class="feature_header">
                        <span>{{ \App\CPU\translate('sellers')}}</span>
                    </div>
                    <div>
                        <a class="btn btn-outline-accent btn-sm viw-btn-a"
                           href="{{route('sellers')}}">{{ \App\CPU\translate('view_all')}}
                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'}}"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- top seller Grid-->
            <div class="mt-2 mb-3 brand-slider">
                <div class="owl-carousel owl-theme" id="top-seller-slider">
                    @foreach($top_sellers as $seller)
                        @if($seller->shop)
                            <div style="height: 100px; padding: 2%; background: white;border-radius: 5px">
                                <center>
                                    <a href="{{route('shopView',['id'=>$seller['id']])}}">
                                        <img
                                            style="vertical-align: middle; padding: 2%;width:75px;height: 75px;border-radius: 50%"
                                            onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                            src="{{asset("storage/shop")}}/{{$seller->shop->image}}">
                                        <p class="text-center small font-weight-bold">{{Str::limit($seller->shop->name, 14)}}</p>
                                    </a>
                                </center>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </section>
    @endif

    {{-- Categorized product --}}

@endsection

@push('script')
    {{-- Owl Carousel --}}
    <script src="{{asset('assets/front-end')}}/js/owl.carousel.min.js"></script>

    <script>
        $('#flash-deal-slider').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 5,
            nav: false,
            //navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        })

        $('#web-feature-deal-slider').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 5,
            nav: false,
            //navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 3
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        })
    </script>

    <script>
        $('#brands-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '{{session('direction')}}': true,
            //navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 7
                },
                //Large
                992: {
                    items: 9
                },
                //Extra large
                1200: {
                    items: 11
                },
                //Extra extra large
                1400: {
                    items: 12
                }
            }
        })
    </script>

    <script>
        $('#category-slider, #top-seller-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: false,
            // navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '{{session('direction')}}': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 6
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 10
                },
                //Extra extra large
                1400: {
                    items: 11
                }
            }
        })
    </script>
@endpush

