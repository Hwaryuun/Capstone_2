<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Designplus: @yield('TopTTL')</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">

	<link rel="icon" href="{{asset('/images/Asset_img/PS.png')}}" type="image/x-icon">

	<link rel="stylesheet" href="{{ asset('css/Slider.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/FrontMain.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

     <script type="module" src="{{asset('js/DimentionalModel.JS')}}"></script>
	 @livewireStyles

</head>
<body>
	<!--header--->			
	<header>
		
		<a href="{{Route('CustomerDashboard.index')}}" class="logo"> <img src="/images/Asset_img/DP.png" alt=""> DesignPlus</a>
		<div class="bx bx-menu" id="menu-icon">   </div>
		{{-- <i class="fa-solid fa-bars"></i> --}}
		<ul class="navbar">
			<li><a class ="a" href="{{Route('CustomerDashboard.index')}}"> <i class="fa-solid fa-house"></i> Home</a></li>
			
			<li><a class ="a" href="{{Route('Shopping.index')}}"><i class="fa-solid fa-cart-shopping"></i></i>Shop</a></li>
			<li><a class ="a" href="{{Route('ShopSpecs.index')}}"><i class="fa-solid fa-basket-shopping"></i>Cart</a></li>
            <li><a class ="a" href="#Account"><i class="fa-solid fa-user"></i> {{auth('customer')->user()->firstname}} </a>
				<ul class="ticks">
					<li><a href="{{Route('Payd.index')}}" class ="c"><i class="fa-solid fa-receipt"></i> History</a></li>
					<li><a href="" class ="c"><i class="fa-solid fa-user"></i> Account</a></li>
					<li><a href="{{Route('Customerlogout')}}" class ="c"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>
				</ul>
			</li>
		</ul>

	</header>


    @yield('contentFE')

	<!--footer--->
	<div id="contact">
		<div class="footer">
			<div class="main">
				
				 <div class="list">
					<h5 class="logo"> DSP+ </h5>
				</div>

				<div class="list">
					<h4>Support</h4>
					<ul>
						<li><a href="{{route('DsInfo')}}">About us</a></li>
						<li><a href="{{route('DsInfo')}}">Terms & Conditions</a></li>
						<li><a href="{{route('DsInfo')}}">FAQS</a></li>										
						<li><a href="{{route('DsInfo')}}">Equipment</a></li>
					</ul>
				</div>

				<div class="list">
					<h4>Contact Info</h4>
					<ul>
						<li><a href="#">8 Mangachapoy cor </a></li>
						<li><a href="#">Narig Streets</a></li>
						<li><a href="#"> Veterans Village </a></li>
						<li><a href="#">Project 7</a></li>
						<li><a href="#">digitalprinting@designplusph.com</a></li>
					</ul>
				</div>

				<div class="list">
					<h4>Connect</h4>
					<div class="social">
						<a href="https://web.facebook.com/designplusonline" target=”_blank”><i class='bx bxl-facebook' ></i></a>
					</div>
				</div>
				
			</div>
		</div>

		<hr>
		
		<div class="end-text">
			<p>Copyright ©2022 All rights reserved | By Design Plus and IT Student</p>
		</div>
	</div>
	@livewireScripts
	<!--link to js--->
	<script src="{{asset('js/UploadThings.JS')}}"></script>
    <script src="{{asset('js/Sticky.JS')}}"></script>
    <script src="{{asset('js/Swiper.JS')}}"></script>
    <script src="{{asset('js/SweetAlert.JS')}}"></script>
    <script src="{{asset('js/Sweet.JS')}}"></script>


  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      slidesPerGroup: 1,
      loop: true,
    //   loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
	  breakpoints: {
                740: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                },
           
				1060: {
                    slidesPerView: 2,
					slidesPerGroup: 2,
                },

                1140: {
                    slidesPerView: 3,
					slidesPerGroup: 3,
                }
		}
    });
  </script>

	<script>

		const Toast = Swal.mixin({           
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				width: 350,
				showCloseButton: true,
				timerProgressBar: true,
				didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
		})
		
		@if(Session::has('LogSuccess'))     
				
					Toast.fire({
					icon: 'success',
					title: '{{session('LogSuccess')}}'
			})
				
		@endif

		@if(Session::has('successAdd'))     
				
				Toast.fire({
				icon: 'success',
				title: '{{session('successAdd')}}'
		})
			
		@endif

		@if($errors->any())     
					Toast.fire({
							icon: 'error',
							title: 'Some Fields Are Empty !'
					})
		@endif

		@if(Session::has('successdel')) 
      
		Swal.fire(
				'Deleted !',
				'{{session('successdel')}}',
				'success'
		) 
		@endif

		@if(Session::has('return')) 
      
			Toast.fire({
					icon: 'warning',
					title: '{{session('return')}}'
			})
		@endif

		@if(Session::has('removed')) 

		Swal.fire(
				'Removed !',
				'{{session('removed')}}',
				'success'
		) 
		@endif

	</script>



</body>
</html>