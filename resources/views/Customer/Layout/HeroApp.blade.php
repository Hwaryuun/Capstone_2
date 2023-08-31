<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DesignPlus</title>

	{{-- <link rel="stylesheet" href="{{ asset('css/Slider.css')}}"/> --}}
	<link rel="icon" href="{{asset('/images/Asset_img/PS.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/FrontMain.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   <link rel="stylesheet" href="{{ asset('css/Slider.css')}}"/>
  <script type="module" src="{{asset('js/DimentionalModel.JS')}}"></script>
 
	 @livewireStyles
</head>
<body>
  
	<!--header--->			
	<header>
		
		<a href="/" class="logo"> <img src="/images/Asset_img/DP.png" alt=""> DesignPlus</a>
		<div class="bx bx-menu" id="menu-icon">  </div>
		
		<ul class="navbar">
			<li><a class ="a"  href="@yield('routing')"><i class="fa-solid fa-cart-shopping"></i> Products </a></li>
			<li><a class ="a" href="{{route('CustomerRegister.index')}}"><i class="fa-solid fa-user-plus"></i>Register</a></li>
            <li> <a class ="a" href="{{Route('CustomerLogin.index')}}"><i class="fa-solid fa-user"></i>Login</a></li>
		</ul>

	</header>


	<!--Home section--->



    @yield('contentFESX')

	<!--footer------------------------------------------>
	<div id="contact">
		<div class="footer">
			<div class="main">

				
				 <div class="list">
					<h5 class="logo"> DSP+ </h5>
				</div>

				<div class="list">
					<h4>Our Company</h4>
					<ul>
						<li><a href="{{route('Infos')}}">About us</a></li>
						<li><a href="{{route('Infos')}}">Terms & Conditions</a></li>
            <li><a href="{{route('Infos')}}">FAQS</a></li>
            <li><a href="{{route('Infos')}}">Equipment</a></li>
						{{-- <li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Licenses</a></li> --}}
				
					</ul>
				</div>

				<div class="list">
					<h4>Contact's</h4>
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
						{{-- <a href="#"><i class='bx bxl-instagram-alt' ></i></a>
						<a href="#"><i class='bx bxl-twitter' ></i></a>
						<a href="#"><i class='bx bxl-linkedin' ></i></a> --}}
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
	<script src="{{asset('js/Sticky.JS')}}"></script>
  <script src="{{asset('js/Swiper.JS')}}"></script>


    
<script>
    var swiper = new Swiper("#sharpers", {
      slidesPerView: 2,
      spaceBetween: 30,
      slidesPerGroup: 2,
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
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 2,
          spaceBetween: 30,
          slidesPerGroup: 2,
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
                        slidesPerView: 3,
                        slidesPerGroup: 3,
                    },
    
                    1140: {
                        slidesPerView: 4,
                        slidesPerGroup: 4,
                    }
            }
        });
      </script>

    
	
</body>


</html>