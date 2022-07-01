@php($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews))

<style>
.img-item-res {
  height: 340px;
  object-fit: cover;
  border-top-right-radius: 0.4375rem;
  border-top-left-radius:0.4375rem;
}
.card-common {
  box-shadow: 1px 2px 5px #999;
  transition: all 0.4s;
}

.card-common:hover {
  box-shadow: 2px 3px 15px #999;
  transform: translateY(-1px);
}
.text-secondary {
    color: #545b62!important;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: none !important;
    border-radius: 0.4375rem;
}
.hidden {
    opacity: 0;
    transition: all 1s ease-in-out;
}
.for-hidden:hover .hidden {
    opacity: 1;
}
@media screen and  (max-width: 700px){
  .img-item-res {
    height: 260px !important;
    object-fit: cover;
    border-top-right-radius: 0.4375rem;
    border-top-left-radius: 0.4375rem;
  }
}
@media screen and  (max-width: 500px){
  .img-item-res {
    height: 220px !important;
    object-fit: cover;
    border-top-right-radius: 0.4375rem;
    border-top-left-radius: 0.4375rem;
  }
  .hidden {
      display: none !important;
  }
}
</style>


<div class="card card-common p-0 for-hidden">
    <div class="card-body p-0">
        
        <a href="{{route('product',$product->slug)}}">
            <img src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                class="w-100 img-item-res">
        </a>
    <h4 class="mt-3 mb-2 text-center">
        <a href="{{route('product',$product->slug)}}">
            {{ Str::limit($product['name'], 25) }}
        </a>
    </h4>
    <div class="text-center text-secondary mb-2">
         @if($product->discount > 0)
            <strike style="font-size: 12px!important;color: grey!important;display:block">
                {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
            </strike>
        @endif
        <p class="font-weight-bold">
            {{\App\CPU\Helpers::currency_converter(
            $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
        )}}
        </p>
        
       
    </div>
    </div>
    {{-- <div class="card-footer text-secondary text-center">
        
    </div> --}}
        
        
        <div class="text-center hidden">
            @if(Request::is('product/*'))
                <a class="btn btn-success text-white btn-sm  mb-2" href="{{route('product',$product->slug)}}">
                    <i class="czi-forward align-middle"></i>
                    {{\App\CPU\translate('View')}}
                </a>
            @else
                <a class="btn  btn-success text-white btn-sm  mb-2" href="javascript:"
                   onclick="quickView('{{$product->id}}')">
                    <i class="czi-eye align-middle"></i>
                    {{\App\CPU\translate('Quick')}}   {{\App\CPU\translate('View')}}
                </a>
            @endif
        </div>
    

</div>


{{-- <div class="product-card card {{$product['current_stock']==0?'stock-card':''}}"
     style="margin-bottom: 40px;display: flex; align-items: center; justify-content: center;">
    @if($product['current_stock']<=0)
        <label style="left: 29%!important; top: 29%!important;"
               class="badge badge-danger stock-out">{{\App\CPU\translate('stock_out')}}</label>
    @endif

    <div class="card-header inline_product clickable" style="cursor: pointer;max-height: 193px;min-height: 193px">
        @if($product->discount > 0)
            <div class="d-flex" style="right: 0;top:0;position: absolute">
                    <span class="for-discoutn-value pr-1 pl-1">
                    @if ($product->discount_type == 'percent')
                            {{round($product->discount,2)}}%
                        @elseif($product->discount_type =='flat')
                            {{\App\CPU\Helpers::currency_converter($product->discount)}}
                        @endif
                        {{\App\CPU\translate('off')}}
                    </span>
            </div>
        @else
            <div class="d-flex justify-content-end for-dicount-div-null">
                <span class="for-discoutn-value-null"></span>
            </div>
        @endif
        <div class="d-flex d-block center-div element-center" style="cursor: pointer">
            <a href="{{route('product',$product->slug)}}">
                <img src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$product['thumbnail']}}"
                     onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                     style="width: 100%;max-height: 215px!important;">
            </a>
        </div>
    </div>

    <div class="card-body inline_product text-center p-1 clickable"
         style="cursor: pointer; max-height:7.5rem;">
        <div class="rating-show">
            <span class="d-inline-block font-size-sm text-body">
                @for($inc=0;$inc<5;$inc++)
                    @if($inc<$overallRating[0])
                        <i class="sr-star czi-star-filled active"></i>
                    @else
                        <i class="sr-star czi-star"></i>
                    @endif
                @endfor
                <label class="badge-style">( {{$product->reviews_count}} )</label>
            </span>
        </div>
        <div style="position: relative;" class="product-title1">
            <a href="{{route('product',$product->slug)}}">
                {{ Str::limit($product['name'], 25) }}
            </a>
        </div>
        <div class="justify-content-between text-center">
            <div class="product-price text-center">
                @if($product->discount > 0)
                    <strike style="font-size: 12px!important;color: grey!important;">
                        {{\App\CPU\Helpers::currency_converter($product->unit_price)}}
                    </strike><br>
                @endif
                <span class="text-accent">
                    {{\App\CPU\Helpers::currency_converter(
                        $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                    )}}
                </span>
            </div>
        </div>
    </div>

    <div class="card-body card-body-hidden" style="padding-bottom: 5px!important;">
        <div class="text-center">
            @if(Request::is('product/*'))
                <a class="btn btn-primary btn-sm btn-block mb-2" href="{{route('product',$product->slug)}}">
                    <i class="czi-forward align-middle {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                    {{\App\CPU\translate('View')}}
                </a>
            @else
                <a class="btn btn-primary btn-sm btn-block mb-2" href="javascript:"
                   onclick="quickView('{{$product->id}}')">
                    <i class="czi-eye align-middle {{Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'}}"></i>
                    {{\App\CPU\translate('Quick')}}   {{\App\CPU\translate('View')}}
                </a>
            @endif
        </div>
    </div>
</div> --}}
