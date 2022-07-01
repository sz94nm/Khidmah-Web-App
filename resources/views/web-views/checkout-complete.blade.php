@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('Order Complete'))

@push('css_or_js')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            font-family: 'Montserrat', sans-serif
        }

        .card {
            border: none
        }

        .totals tr td {
            font-size: 13px
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .spanTr {
            color: {{$web_config['primary_color']}};
            font-weight: 700;

        }

        .spandHeadO {
            color: #030303;
            font-weight: 500;
            font-size: 20px;

        }

        .font-name {
            font-weight: 600;
            font-size: 13px;
        }

        .amount {
            font-size: 17px;
            color: {{$web_config['primary_color']}};
        }

        @media (max-width: 600px) {
            .orderId {
                margin- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 91px;
            }

            .p-5 {
                padding: 2% !important;
            }

            .spanTr {

                font-weight: 400 !important;
                font-size: 12px;
            }

            .spandHeadO {

                font-weight: 300;
                font-size: 12px;

            }

            .table th, .table td {
                padding: 5px;
            }
            
        }
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
        
       @media screen and (min-width:800px) {
           .h-68vh {
               height: 66vh;
           }
       }
       .mt-6 {
           margin-top:4rem !important 
       }
    </style>
@endpush

@section('content')
    <div class="container mt-6 mb-5 rtl h-68vh" 
         style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10">
                <div class="card">
                    @if(auth('customer')->check())
                        <div class=" p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 style="font-size: 20px; font-weight: 900">{{\App\CPU\translate('your_order_has_been_placed_successfully!')}}
                                        !</h5>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <center>
                                        <i style="font-size: 100px; color: #0f9d58" class="fa fa-check-circle"></i>
                                    </center>
                                </div>
                            </div>

                            <span class="font-weight-bold d-block mt-4" style="font-size: 17px;">{{\App\CPU\translate('Hello')}}, {{auth('customer')->user()->f_name}}</span>
                            <span>{{\App\CPU\translate('You order has been confirmed and will be shipped according to the method you selected!')}}</span>

                            <div class="row mt-4">
                                <div class="col-12 col-sm-6 mb-2">
                                    <a href="{{route('home')}}" class="btn btn-success text-white btn-block">
                                        {{\App\CPU\translate('go_to_shopping')}}
                                    </a>
                                </div>

                                <div class="col-12 col-sm-6 mb-2">
                                    <a href="{{route('account-oder')}}"
                                       class="btn btn-secondary  btn-block pull-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                                        {{\App\CPU\translate('check_orders')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
