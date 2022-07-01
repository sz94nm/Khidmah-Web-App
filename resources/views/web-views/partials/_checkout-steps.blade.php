
<style>
    .steps {
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.step-item {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    transition: color 0.25s ease-in-out;
    text-align: center;
    text-decoration: none !important
}

.step-item:first-child .step-progress {
    border-radius: .125rem;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0
}

.step-item:last-child .step-progress {
    border-radius: .125rem;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0
}

.step-progress {
    position: relative;
    width: 100%;
    height: .25rem
}

.step-count {
    position: absolute;
    top: -.75rem;
    left: 50%;
    width: 1.625rem;
    height: 1.625rem;
    margin-left: -.8125rem;
    border-radius: 50%;
    font-size: .875rem;
    line-height: 1.625rem
}

.step-label {
    padding-top: 1.5625rem
}

.step-label > i {
    margin-top: -.25rem;
    margin-right: .425rem;
    font-size: 1.2em;
    vertical-align: middle
}

@media (max-width: 767.98px) {
    .step-label {
        font-size: .75rem
    }

    .step-label > i {
        display: none
    }
}

.steps-dark .step-item {
    color: #7d879c
}

.steps-dark .step-count, .steps-dark .step-progress {
    color: #4b566b;
    background-color: #f3f5f9
}

.steps-dark .step-item:hover {
    color: #4b566b
}

.steps-dark .step-item.active.current {
    color: #373f50;
    pointer-events: none
}

.steps-dark .step-item.active .step-count, .steps-dark .step-item.active .step-progress {
    color: #fff;
    background-color: #fe696a
}

.steps-light .step-item {
    color: rgba(255, 255, 255, 0.55)
}

.steps-light .step-count, .steps-light .step-progress {
    color: #fff;
    background-color: #485268
}

.steps-light .step-item:hover {
    color: rgba(255, 255, 255, 0.8)
}

.steps-light .step-item.active.current {
    color: #fff;
    pointer-events: none
}

.steps-light .step-item.active .step-count, .steps-light .step-item.active .step-progress {
    color: #fff;
    background-color: #fe696a
}

.cz-testimonial {
    margin-bottom: 0;
    padding-top: .75rem
}

.cz-testimonial .card-body {
    padding-top: 1.8375rem
}

.cz-testimonial .cz-testimonial-mark {
    position: absolute;
    top: -.75rem;
    left: 1.25rem;
    width: 1.875rem;
    height: 1.875rem;
    border-radius: .1875rem;
    background-color: #fe696a;
    color: #fff;
    font-size: 1.875rem;
    font-weight: 500;
    text-align: center;
    box-shadow: 0 0.5rem 0.575rem -0.25rem rgba(254, 105, 106, 0.75);
    z-index: 5
}

.cz-testimonial .cz-testimonial-mark::before {
    content: "''"
}

.video-popup-btn:not(.video-cover) {
    display: inline-block;
    width: 4.5rem;
    height: 4.5rem;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    border-radius: 50%;
    background-color: #fff;
    color: #4b566b;
    text-align: center;
    line-height: 4.5rem;
    box-shadow: 0 0.375rem 1rem -0.25rem rgba(43, 52, 69, 0.2);
    vertical-align: middle
}

.video-popup-btn:not(.video-cover)::before {
    font-family: 'sixvalley-icons';
    font-size: .75rem;
    font-weight: 700;
    content: '\e969'
}

.video-popup-btn:not(.video-cover):hover {
    background-color: #fe696a;
    color: #fff;
    box-shadow: 0 0.5rem 1.125rem -0.5rem rgba(254, 105, 106, 0.9)
}

.video-cover-thumb {
    position: relative
}

.video-cover-thumb .badge {
    position: absolute;
    right: .5rem;
    bottom: .5rem;
    z-index: 5
}

.cz-countdown {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    font-weight: normal
}

.cz-countdown .cz-countdown-value {
    font-weight: 500
}

.cz-countdown .cz-countdown-label {
    margin-left: .125rem;
    font-size: 65%
}

.cz-countdown .cz-countdown-days, .cz-countdown .cz-countdown-hours, .cz-countdown .cz-countdown-minutes, .cz-countdown .cz-countdown-seconds {
    margin-right: .75rem;
    /* margin-bottom: .75rem */
}

.cz-countdown .cz-countdown-seconds {
    margin-right: 0
}

.ct-line {
    stroke: #4e54c8 !important;
    stroke-width: .125rem
}

.ct-point {
    stroke: #4e54c8 !important;
    stroke-width: .625rem
}

.ct-bar {
    stroke: #4e54c8 !important;
    stroke-width: .625rem
}

.ct-chart-pie .ct-label {
    fill: #fff;
    font-size: 1rem
}

.widget .cz-carousel .tns-nav {
    padding-top: .5rem
}

.widget-list {
    margin: 0;
    padding: 0;
    list-style: none
}

.widget-title {
    margin-bottom: 1.125rem;
    font-size: 1.0625rem;
    font-weight: 700;
}

.widget-categories .card, .widget-categories .card-header {
    border: 0;
    border-radius: 0
}

.widget-categories .card-body {
    padding: .6140350877rem 0
}

.widget-categories .accordion-heading {
    font-size: .9375rem;
    font-weight: normal
}

.widget-categories .accordion-heading > a {
    padding-top: .6140350877rem;
    padding-right: 2rem;
    padding-bottom: .6140350877rem;
    padding-left: 0;
    color: #fe696a
}

.widget-categories .accordion-heading > a .accordion-indicator {
    right: 0;
    width: 1.375rem;
    height: 1.375rem;
    margin-top: -.6875rem;
    background-color: rgba(254, 105, 106, 0.1);
    font-size: 8px;
    line-height: 1.375rem
}

.widget-categories .accordion-heading > a.collapsed {
    color: #4b566b
}

.widget-categories .accordion-heading > a.collapsed .accordion-indicator {
    background-color: #f3f5f9;
    color: #4b566b
}

.widget-categories .accordion-heading > a:hover {
    color: #fe696a
}

.widget-categories .accordion-heading > a:hover .accordion-indicator {
    background-color: rgba(254, 105, 106, 0.1);
    color: #fe696a
}

.widget-categories .widget-list-item {
    padding-left: .75rem
}

.widget-categories .widget-list:not([data-simplebar]) {
    border-right: 2px solid #e3e9ef
}

.widget-categories .widget-list:not([data-simplebar]) .widget-list-item {
    padding-right: 1rem
}

.widget-categories .widget-list:not([data-simplebar]) .widget-list-item .widget-list:not([data-simplebar]) {
    border-right: 0
}

.widget-list-item {
    margin-bottom: .375rem
}

.widget-list-item:last-child {
    margin-bottom: 0
}

.widget-list-link {
    display: block;
    transition: color 0.25s ease-in-out;
    color: #4b566b;
    font-size: .875rem;
    font-weight: normal
}

.widget-list-link:hover {
    color: white;
}

.active > .widget-list-link {
    color: white;
}

.widget-light .widget-list-link {
    color: rgba(255, 255, 255, 0.65)
}

.widget-light .widget-list-link:hover {
    color: #fff
}

.widget-light .active > .widget-list-link {
    color: #fff
}

.widget-product-title {
    margin-bottom: .25rem;
    font-size: .875rem;
    font-weight: 500
}

.widget-product-title > a {
    color: #373f50
}

.widget-product-meta {
    font-size: .875rem
}

.widget-cart-item {
    position: relative
}

.widget-cart-item .close {
    position: absolute;
    top: 50%;
    left: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    transition: visibility .25s ease-in-out, opacity .25s ease-in-out;
    visibility: hidden;
    opacity: 0
}

.widget-cart-item .media {
    transition: all .25s ease-in-out
}

.widget-cart-item:hover .media {
    -webkit-transform: translateX(1.125rem);
    transform: translateX(1.125rem)
}

.widget-cart-item:hover .close {
    visibility: visible;
    opacity: 1
}

.btn-tag {
    display: inline-block;
    padding: .375rem .5625rem;
    transition: color 0.25s ease-in-out, background-color 0.25s ease-in-out, border-color 0.25s ease-in-out, box-shadow 0.2s ease-in-out;
    border: 1px solid #e3e9ef;
    border-radius: .1875rem;
    color: #4b566b;
    font-size: .75rem;
    white-space: nowrap
}

.btn-tag:hover {
    border-color: #f3f5f9;
    background-color: #f3f5f9;
    color: #4b566b
}

.btn-tag.active {
    border-color: #fe696a;
    background-color: #fe696a;
    color: #fff;
    box-shadow: 0 0.5rem 1.125rem -0.5rem rgba(254, 105, 106, 0.9)
}

.cz-range-slider-ui {
    height: .1875rem;
    margin: 3.5rem 0;
    border: 0;
    background-color: #eceff6;
    box-shadow: none
}

.cz-range-slider-ui .noUi-connect {
    background-color: #fe696a
}

.cz-range-slider-ui .noUi-handle {
    top: 50%;
    width: 1.375rem;
    height: 1.375rem;
    margin-top: -.6875rem;
    border: 0;
    border-radius: 50%;
    box-shadow: 0 0.125rem 0.5625rem -0.125rem rgba(0, 0, 0, 0.25)
}

.cz-range-slider-ui .noUi-handle::before, .cz-range-slider-ui .noUi-handle::after {
    display: none
}

.cz-range-slider-ui .noUi-handle:focus {
    outline: none
}

.cz-range-slider-ui .noUi-marker-normal {
    display: none
}

.cz-range-slider-ui .noUi-marker-horizontal.noUi-marker {
    width: 1px;
    background-color: #d0dae4
}

.cz-range-slider-ui .noUi-marker-horizontal.noUi-marker-large {
    height: .75rem
}

.cz-range-slider-ui .noUi-value {
    padding-top: .125rem;
    color: #4b566b;
    font-size: .8125rem
}

.cz-range-slider-ui .noUi-tooltip {
    padding: .25rem .5rem;
    border: 0;
    background-color: #373f50;
    color: #fff;
    font-size: .75rem;
    line-height: 1.2;
    border-radius: .1875rem
}

html:not([dir=rtl]) .cz-range-slider-ui.noUi-horizontal .noUi-handle {
    right: -.6875rem
}

.product-card {
    /*padding-bottom: .875rem;*/
    border: 0;
    transition: all 0.15s ease-in-out
}

.product-card .product-card-actions, .product-card > .btn-wishlist, .product-card .badge {
    position: absolute;
    top: .75rem;
    right: .75rem;
    z-index: 5
}

.product-card .product-card-actions .btn-action {
    padding: .5rem;
    transition: all 0.15s ease-in-out;
    border-radius: .1875rem;
    background-color: #fff;
    font-size: .8125rem;
    visibility: hidden;
    opacity: 0
}

.product-card .badge {
    right: auto;
    left: .75rem
}

.product-card .badge.badge-right {
    right: .75rem;
    left: auto
}

.product-card .card-body {
    position: relative;
    background-color: #fff;
    z-index: 2
}

.product-card .card-body-hidden {
    position: absolute;
    left: 0;
    top: 100%;
    width: 100%;
    margin-top: -.875rem;
    transition: all 0.15s ease-in-out;
    border-radius: .4375rem;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    background-color: #fff;
    opacity: 0;
    /* visibility: hidden; */
    z-index: 1
}

@media (min-width: 576px) {
    .product-card {
        padding-bottom: 0
    }
}

@media (min-width: 992px) {
    .product-card:hover:not(.card-static) {
        border-color: #fff !important;
        box-shadow: 0 0.3rem 1.525rem -0.375rem rgba(0, 0, 0, 0.1);
        z-index: 10
    }

    .product-card:hover:not(.card-static) .product-card-actions .btn-action {
        opacity: 1;
        visibility: visible
    }

    .product-card:hover:not(.card-static) .card-body-hidden {
        opacity: 1;
        visibility: visible;
        box-shadow: 0 0.3rem 1.525rem -0.375rem rgba(0, 0, 0, 0.1)
    }
}

.product-list .product-list-thumb {
    border-radius: .4375rem;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0
}

@media (min-width: 576px) {
    .product-list .product-list-thumb {
        width: 15rem;
        border-radius: .4375rem;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        overflow: hidden
    }

    .product-list .card-body-hidden {
        top: 50%;
        margin-top: 0;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        box-shadow: none !important
    }
}
</style>
<style>
    
    .steps-light .step-item.active .step-count, .steps-light .step-item.active .step-progress {
        color: #fff;
        background-color: #224f7d;
    }

    .steps-light .step-count, .steps-light .step-progress {
        color: #4f4f4f;
        background-color: rgba(225, 225, 225, 0.67);
    }

    .steps-light .step-item.active.current {
        color: #224f7d  !important;
        pointer-events: none;
    }

    .steps-light .step-item {
        color: #4f4f4f;
        font-size: 14px;
        font-weight: 400;
    }
</style>
<div class="steps steps-light pt-2 pb-2">
    <a class="step-item {{$step>=1?'active':''}} {{$step==1?'current':''}}" href="{{route('checkout-details')}}">
        <div class="step-progress">
            <span class="step-count"><i class="czi-user-circle"></i></span>
        </div>
        <div class="step-label">
            {{\App\CPU\translate('sing_in')}} / {{\App\CPU\translate('sing_up')}}
        </div>
    </a>
    <a class="step-item {{$step>=2?'active':''}} {{$step==2?'current':''}}" href="{{route('checkout-details')}}">
        <div class="step-progress">
            <span class="step-count"><i class="czi-package"></i></span>
        </div>
        <div class="step-label">
            {{\App\CPU\translate('Shipping_and_billing')}}
        </div>
    </a>
    <a class="step-item {{$step>=3?'active':''}} {{$step==3?'current':''}}" href="{{route('checkout-payment')}}">
        <div class="step-progress">
            <span class="step-count"><i class="czi-card"></i></span>
        </div>
        <div class="step-label">
            {{\App\CPU\translate('Payment')}}
        </div>
    </a>
</div>
