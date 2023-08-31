@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','History')

        <section class="homes" id="home"> </section>

        <!--Home section--->
        <div class="specs">
            <a href=""> Shop </a> >> <a href=""> Category</a>
        </div>
            
        <div class="specsxa">
            <span> ORDER HISTORY </span>
        </div>   
        <!--Package section--->
       
    <section class="packagesd" id="package">   
            {{-- ,['cart' => $cart] --}}

            @if (count($urdirs) != 0)

                <div class = "dirxt">
                    <div class="swiper mySwiper container">
                        <div class="swiper-wrapper content">
                      
            
                            @foreach ($urdirs as $sak)
            
                            <div class="swiper-slide">
                                <div class="box1">
                                    <div class="thum2s">
                                        <img src="/images/Product_img/{{$sak->Products->image}}">
                                        <div class="saisu">
                                            <p class="daiki">{{$sak->Products->name}}</p>   
                                            <p class="sayaka">   @if ($sak->status == 'In-Progress')
                                                                        <i class="fa-solid fa-file-circle-exclamation" style="color: rgb(231, 196, 0);"></i>
                                                                @elseif($sak->status == 'Finished')
                                                                        <i class="fa-solid fa-file-circle-check" style="color: rgb(0, 254, 51);"></i>
                                                                @else
                                                                        <i class="fa-solid fa-file-circle-minus" style="color: rgb(0, 94, 255);" ></i>
                                                                @endif {{$sak->status}}
                                             </p>  
                                             <p class="sayaka" style="margin-top: 90px">  {{$sak->Orders->created_at->diffForHumans()}} </p>
                                             <p class="sayaka" style="margin-top: 10px" >  {{$sak->Orders->tracking_no}} </p>
                                         
                                        </div>
                                      
                                    </div>           
                                </div>
                            </div>
                                
                            @endforeach
            
                       
                       
                        </div>
                    </div>
                </div>
                            
            @endif
 
                @livewire('extentions.customer-history')

    </section>
      


@endsection  

