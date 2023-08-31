@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','Templates')


	<!--Home section--->
	<section class="homes" id="home">
           
	</section>

    <!--Home section--->
	<div class="specs">
        <a href=""> Shop </a> >> <a href="{{Route('ShopSpecs.index')}}"> Category </a> >> <a href=""> Products</a>  >> <a href="{{Route('ShopSpecs.index')}}"> Specification</a> >> <a href=""> Templates</a>
	</div>
    
        
	<section class="packages" id="package">
	
        <div class="discy">

            <div class="dercrx" >
                <img src="/images/Product_img/{{$products->image}}">
                <h5>{{$products->name}}</h5>
                <p>{{$products->description}}</p>
            </div>
        
        </div>
		 
	</section> 

	<div class="specsxa">
        <span> TEMPLATES </span>
   </div>

	<!--destination section--->
	<section class="destinationx" id="destination"  style=" background-color: #c8c8c8;">

        @if (count($templates) == 0)

            <div class="d1cccc">
                <img src="/images/Asset_img/voids.svg" alt="">
                <H5>No Templates Available for this Product.</H5>
                <a href="{{Route('Shopping.index')}}" class ="Add-ITMEX"> <i class="fa-solid fa-caret-left"></i> <span> Go Back ! </span></a>
            </div>     

        @else

            <div class="destination-contenty">

                @foreach ($templates as $emp )
                
                <div class="dual">

                    <div class="col-contentx">   <!-- it can be href -->
                        <img src="/images/Clientfile_img/{{$emp->Design->imagef}}">               
                    </div>
                    <div class="col-contentx">
                        <img src="/images/Clientfile_img/{{$emp->Design->imageb}}">       
                    </div>

                    <h5>{{$emp->name}}</h5>
                    <p>{{$emp->Products->name}}</p>
                    <a href="{{Route('SpecsTemps', [$emp->product_id, $emp->id])}}" title="Choose Template"> <i class="fa-solid fa-pen-to-square"></i></a>

                </div>

                @endforeach
            </div>

       
        @endif
		

	</section>

	<!--Newsletter--->
	
  
@endsection  