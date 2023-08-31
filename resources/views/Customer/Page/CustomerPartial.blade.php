@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','CheckOut')

        <section class="homes" id="home"> </section>

        <!--Home section--->
        <div class="specs">
            {{-- <a href=""> Cart </a> >>  <a href="{{Route('Shopping.index')}}"> Category </a> >> <a href="{{Route('SProducts', $products->category_id)}}"> Products</a> >> <a href=""> Specification</a> --}}
        </div>

        <div class="specsxa">
            <span> ORDER CHECK OUT </span>
        </div>   

       
        @livewire('extentions.customer-paying-partial')
     
        
   

@endsection  