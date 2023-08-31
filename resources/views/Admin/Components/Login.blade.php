<!DOCTYPE html>
<html>
<head>
	<title>DesignPlus Login</title>
	<link rel="icon" href="{{asset('/images/Asset_img/PS.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/Login.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="/images/Asset_img/wave.png">
	
	<div class="container">
		<div class="img">
			<img src="/images/Asset_img/bg.svg">
		</div>

		<div class="login-content">

			<form action="{{Route('Login.store')}}" method="POST">
				@csrf
			  	<img src="/images/Asset_img/Logow.png">
				<h2 class="title">Design Plus : A</h2>

           		<div class="input-div one"  style="@error('email') border-bottom: 2px solid  rgb(255, 105, 105); @enderror">       		  
					<div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>           		  
				   <div class="div">
           		   		<h5>Username :</h5>
           		   		<input type="text" class="input" name="email">
							
           		   </div>
           		</div>
				<p class="err">@error('email') {{$message}} @enderror </p>
           		
				<div class="input-div pass" style= "@error('password') border-bottom: 2px solid rgb(255, 105, 105); @enderror">
           		   <div class="i"> 
           		    	<i class="fas fa-lock" ></i>
           		   </div>
           		   <div class="div">
					
           		    	<h5>Password : </h5>				
           		    	<input type="password" class="input" name="password">					 	
            	   </div>  		
					      
				</div>
				<p class="err">@error('password') {{$message}} @enderror </p>
				 	

				<div class="Third">
					<span class="spansur">
						<input class="forx" type="checkbox" name="remember">	
						<label class="forx2" for="">Remember Me</label>
					</span>
							
					<a class = "forgot" href="#">Forgot Password?</a>
				</div>
		
				<button type="submit" class="btn">Login</button>
			

				@if (session('status'))
				<div id="error-password" class="errorpass"> *{{session('status');}}*</div>
		    	@endif
            </form>

        </div>

    </div>

    <script src="{{asset('js/Login.JS')}}"></script>

</body>
</html>