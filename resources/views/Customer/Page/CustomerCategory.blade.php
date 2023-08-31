@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','Shop')

        <section class="homes" id="home"> </section>

        <!--Home section--->
        <div class="specs">
            <a href=""> Shop </a> >> <a href=""> Category</a>
        </div>
            
        <!--Package section--->
        <section class="packages" id="package">
            <div class="title">
                <h2>Featured</h2>
            </div>

            <div class = "dir">
                <div class="swiper mySwiper container">
                <div class="swiper-wrapper content">
            
                @foreach($featured as $ftr)

                    <div class="swiper-slide">
                        
                        <div class="box">
                            <div class="thum">
                                <img src="/images/Clientfile_img/{{$ftr->Design->imagef}}">                          
                            </div>
            
                            <div class="dest-content">
                                <div class="location">
                                    <h4>{{$ftr->name}}</h4>
                                    <p>{{$ftr->Products->name}}</p>
                                </div>			
                            </div>
                        </div>
                    </div>
                    
                @endforeach  
                              
                </div>
                </div>
            
                    <div class="swiper-pagination"></div>
            </div>

        </section> 

        <div class="specsxa">
            <span> CATEGORY </span>
        </div>
        <!--destination section--->
        <section class="blackss"  style=" background-color: #c8c8c8;">

            @livewire('extentions.category')

            
        </section>

        <!--Newsletter--->

        <section class="newsletter">
     
        </section>

@endsection  

