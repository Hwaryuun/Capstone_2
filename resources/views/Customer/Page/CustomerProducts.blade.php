@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','Products')

    <section class="homes" id="home"> </section>

    <!--Home section--->
    <div class="specs">
        <a href=""> Shop </a> >>  <a href="{{Route('Shopping.index')}}"> Category </a> >> <a href=""> Products</a> 
    </div>

 
    <section class="packages" id="package" >
 
        <div class="discy">

            <div class="dercrx" >
                <img src="/images/Category_img/{{$category->image}}">
                    <h5>{{$category->name}}</h5>
                    <p>{{$category->description}}</p>
            </div>
        
        </div>

    </section>


    <div class="specsxa">
        <span> PRODUCTS </span>
    </div>

    <section class="destinationx" id="destination" style="background-color: #c8c8c8;">

        @if (count($products) == 0)

            <div class="d1cccc">
                <img src="/images/Asset_img/voids.svg" alt="">
                <H5>No Product Available.</H5>
                <a href="{{Route('Shopping.index')}}" class ="Add-ITMEX"> <i class="fa-solid fa-caret-left"></i> <span> Go Back ! </span></a>
            </div>     

        @else

            <div class="destination-content">
                @foreach($products as $product)
                <div class="col-content2">   <!-- it can be href -->
                    <img src="/images/Product_img/{{$product->image}}">
                    <h5>{{$product->name}}</h5>
                    <p>{{$product->Category->name}}</p>
                    <a href="{{Route('quotation', $product->id )}}"  title="Proceed To Specification" > <i class="fa-solid fa-tag"></i> </a>
                </div>
                @endforeach
            </div>
    
        @endif


    
    </section>

    <section class="newsletter"> </section>


@endsection  

