@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','Specification')
        <section class="homes" id="home"> </section>

        <!--Home section--->
        <div class="specs">
            <a href=""> Shop </a> >>  <a href="{{Route('Shopping.index')}}"> Category </a> >> <a href="{{Route('SProducts', $products->category_id)}}"> Products</a> >> <a href=""> Specification</a>
        </div>

        <div class="specsxa">
            <span> SPECIFICATION </span>
        </div>   

      
        <section class="packages2" id="package">
   
            <div class="sex">
                <div class="displayed">
                    <div class="col-content3">   <!-- it can be href -->
                        {{-- @if (count($models) != 0)
                        <model-viewer src="/images/3DModels_GLB/{{$models[0]->model}}" alt="" auto-rotate camera-controls ar ios-src=""></model-viewer>               
                        @endif
                        @if (count($models) == 0)
                        <model-viewer src="/images/3DModels_GLB/Catch.glb" alt="" auto-rotate camera-controls ar ios-src=""></model-viewer>
                        @endif --}}
                        @if (count($models) != 0)
                        <model-viewer camera-controls touch-action="pan-y" autoplay ar shadow-intensity="1" src="/images/3DModels_GLB/{{$models[0]->model}}" alt="An animated 3D model of a robot"></model-viewer>
                        @endif
                        @if (count($models) == 0)
                        <model-viewer camera-controls touch-action="pan-y" autoplay ar shadow-intensity="1" src="/images/3DModels_GLB/Catch.glb" alt="An animated 3D model of a robot"></model-viewer>  
                        @endif
                        <h5>{{$products->name}}</h5>
                    </div>
                </div>
                <div class = "dirx">
                    <div class="swiper mySwiper container">
                        <div class="swiper-wrapper content">
                        @foreach($productsg1 as $g1)
                            <div class="swiper-slide">
                                <div class="box1">
                                    <div class="thum2">
                                        <img src="/images/Product_img/{{$g1->image}}">
                                    </div>           
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @livewire('extentions.tem-extention',['product' => $products, 'templates' => $templates])
        
         </section> 

        <div class="specsx">
            <span> DESCRIPTION </span>
        </div>
  
        <section class="destinationxx" id="destination">
        
            <div class="discy">

                <div class="dercrx" >
                    <img src="/images/Product_img/{{$products->image}}">
                    <h5>{{$products->name}}</h5>
                    <p>{{$products->description}}
                    </p>
                </div>
            
            </div>

        </section>

@endsection  


