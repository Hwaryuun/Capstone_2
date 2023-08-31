@extends('Customer.Layout.HeroApp')


@section('routing')
/
@endsection
@section('contentFESX')
@section('TopTTL','DesignPlus')


<div class="caslacs">

    <section class="homes" id="home"> </section>

    <div class="specs">
        <a href=""> Shop </a> >> <a href=""> Category </a> >> <a href=""> Products</a>  >> <a href=""> Specification</a>
        
    </div>
    
    
        <div class="specsxa">
            <span> PERVIEW - SPECIFICATION </span>
        </div>   

      
        <section class="packages2" id="package">
   
            <div class="sex">
                <div class="displayed">
                    <div class="col-content3">   <!-- it can be href -->
                        @if (count($models) != 0)
                        <model-viewer camera-controls touch-action="pan-y" autoplay ar  shadow-intensity="1" src="/images/3DModels_GLB/{{$models[0]->model}}" alt="An animated 3D model of a robot"></model-viewer> 
                        {{-- <model-viewer src="/images/3DModels_GLB/{{$models[0]->model}}" ar-modes="webxr scene-viewer" alt="" auto-rotate camera-controls ar ios-src=""></model-viewer>                --}}
                        @endif
                        @if (count($models) == 0)
                         <model-viewer camera-controls touch-action="pan-y" autoplay ar  shadow-intensity="1" src="/images/3DModels_GLB/Catch.glb" alt="An animated 3D model of a robot"></model-viewer> 
                        @endif
                        <h5>{{$products->name}}</h5>
                    </div>
                </div>
                <div class = "dirx">
                    <div class="swiper container" id="sharpers">
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

            @livewire('extentions.hero-preview',['product' => $products]);
     
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
    </div>
@endsection  


