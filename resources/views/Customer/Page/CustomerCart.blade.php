@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','Cart')

        <section class="homes" id="home"> </section>

        <!--Home section--->
        <div class="specs">
            {{-- <a href=""> Cart </a> >>  <a href="{{Route('Shopping.index')}}"> Category </a> >> <a href="{{Route('SProducts', $products->category_id)}}"> Products</a> >> <a href=""> Specification</a> --}}
        </div>

        <div class="specsxa">
            <span> Cart :  {{auth('customer')->user()->firstname}}  </span>
        </div>   

        <!--Package section--->
        <section class="packagesd" id="package">   
            {{-- ,['cart' => $cart] --}}
            @livewire('extentions.user-cart')
        </section>


@endsection  