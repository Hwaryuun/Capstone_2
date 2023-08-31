@extends('Customer.Layout.HeroApp')

@section('routing')
#productss
@endsection
@section('contentFESX')
@section('TopTTL','DesignPlus')


<section class="homess" id="home">   

	<div class="IMGD">
		 <img src="/images/Asset_img/test.svg" alt="">
	</div>

	<div class="INFOO">
		<H5>Design Plus</H5> 
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam in voluptatibus 
			rem neque placeat, corporis unde alias, nesciunt sit eius eaque porro at modi, molestias 
			enim esse dolore autem itaque!<br>
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam in voluptatibus 
			rem neque placeat, </p>
		<a href="{{Route('CustomerLogin.index')}}" class="btns"> Learn More !</a>	
		
   </div>

</section>

	<div class="specsxa" id="productss">
		<span> PRODUCTS </span>
	</div>
		

	<section class="blackss">

	<div class="destination-contentdb">

		
		<div>
				<div class="swiper mySwiper container" id="charizu">
					<div class="swiper-wrapper content">
					
						@foreach($featured as $ftr)
						<div class="swiper-slide">
							<div class="col-content">   <!-- it can be href -->
							<img src="/images/Clientfile_img/{{$ftr->Design->imagef}}">
								<a href=""> 
									<div class="half">
										<h5>{{$ftr->name}}</h5>
										<p>{{$ftr->Products->name}}</p>
									</div>
									<i class="fa-solid fa-star"></i>
								</a>
							</div>
						</div>
						@endforeach  
					
					</div>
				</div>
				
			
		</div>

	</div>

	</section>


	<section class="blackss">

		@livewire('extentions.hero')
		
	</section>
@endsection  
	