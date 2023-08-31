@extends('Customer.Layout.HeroApp')


@section('routing')
/
@endsection
@section('contentFESX')
@section('TopTTL','DesignPlus')


<section class="homes" id="home">
           
</section>

<!--Home section--->
<div class="specs">
    <a href=""> Shop </a> >> <a href=""> Category </a> >> <a href=""> Products</a>  >> <a href=""> Specification</a> >> <a href=""> Templates</a>
    
</div>

    
<section class="packages" id="package">

    <div class="discy">

        <div class="dercrx" >
            <img src="/images/Asset_img/21.PNG">
            <h5>Machu Picchu</h5>
            <p>Lorem ipsum, dolor sit amet consectetur 
                adipisicing elit. Dolorem excepturi rem reprehenderit magni 
                neque voluptates ipsum incidunt? Officia, s it, ipsum qui accusantium, 
                excepturi labore eum nostrum ratione iste necessitatibus suscipit?
            </p>
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
                <a title="Select Template" href="{{route('CustomerLogin.index')}}"> <i class="fa-solid fa-pen-to-square"></i></a>

            </div>

            @endforeach
        </div>

   
    @endif
    

</section>




















@endsection  

