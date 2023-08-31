<!DOCTYPE html>
<html>
    <head>
        <title>DesignPlus Register</title>
        <link rel="stylesheet" href="{{ asset('css/Registration.css')}}">
        <link rel="icon" href="{{asset('/images/Asset_img/PS.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body>  

     
       <div id="Container"> 

         <div id="Top-Form">
            <h5>Design Plus</h5>
            <img src="/images/Asset_img/male.svg" alt="" id = "logo">
        </div>

        <form id="owkay" action="{{Route('CustomerRegister.store')}}" method="POST" enctype="multipart/form-data">
         @csrf    
            <div id="Form">

                <div id="Details">

                    <span id="Name">Complete Name</span>

                    <div id = "First-Fields-c">

                     <div class="field">
                        <label>First Name <span class="asterisk"> * </span></label>
                        <input type="text" name="firstname" placeholder="Example: John" value="{{old('firstname')}}" style="@error('firstname') border: 1px solid red; @enderror" >
                        <span style="color: red;">@error('firstname') {{$message}} @enderror </span>
                     </div>  
   
                     <div class="field">
                        <label>Last Name <span class="asterisk"> * </span> </label>
                        <input type="text" name="lastname" placeholder="Example: Doe" value="{{old('lastname')}}" style="@error('lastname') border: 1px solid red; @enderror"  >
                        <span style="color: red;">@error('lastname') {{$message}} @enderror </span>
                     </div>   

                    </div>
        
                </div>


                <div id="Address-Details">
                    
                  <span id="Name">Complete Address</span>

                    <div id = "First-Fields">

                        <div class="field-2">
                           <label>House Number <span class="asterisk"> * </span> </label>
                           <input type="number" name="nmb" placeholder="Example: 47" value="{{old('nmb')}}" style="@error('nmb') border: 1px solid red; @enderror"  >                   
                        </div>   
                         <div class="field-2">
                            <label>Street <span class="asterisk"> * </span> </label>
                            <input type="text" name="st" placeholder="Example: San Jose" value="{{old('st')}}" style="@error('st') border: 1px solid red; @enderror"  >
                         </div>  
    
                         <div class="field-2">
                            <label>Barangay <span class="asterisk"> * </span> </label>
                            <input type="text" name="brgy" placeholder="Example: San Antonio" value="{{old('brgy')}}" style="@error('brgy') border: 1px solid red; @enderror"  >
                         </div>  

                         <div class="field-2">
                            <label>City <span class="asterisk"> * </span> </label>
                            <input type="text" name="city" placeholder="Example: Quezon City" value="{{old('city')}}" style="@error('city') border: 1px solid red; @enderror"  >
                         </div>  

                         <div class="field-2">
                            <label>Region <span class="asterisk"> * </span> </label>
                            <input type="text" name="rgn" placeholder="Example: NCR" value="{{old('rgn')}}" style="@error('rgn') border: 1px solid red; @enderror"  >  
                         </div>  
                    </div>   
                    <span style="color: red;">@error('address') {{$message}} @enderror </span>
                </div>


                
                <div id="Contact-Details">
                    <span id="Name">Contact Details</span>

                    <div id = "First-Fields-c">

                        <div class="field">
                           <label>Phone Number <span class="asterisk"> * </span> </label>
                           <input type="text" name="contactnumber" placeholder="Example: 639******" value="{{old('contactnumber')}}" style="@error('contactnumber') border: 1px solid red; @enderror"  >
                           <span style="color: red;">@error('contactnumber') {{$message}} @enderror </span>
                        </div>  

                        <div class="field">
                           <label>Birthdate <span class="asterisk"> * </span> </label>
                           <input type="date" name="birthdate" value="{{old('birthdate')}}" style="@error('birthdate') border: 1px solid red; @enderror"  >
                           <span style="color: red;">@error('birthdate') {{$message}} @enderror </span>
                        </div>                          


                    </div>   
                </div>
            

              <div id="Emergency-Details">
               <span id="Name">Create Account</span>

               <div id = "First-Fields">



                  <div class="field">
                     <label>User Email <span class="asterisk"> * </span> </label>
                     <input type="text" name="email" placeholder="Example: lelne@gmail.com" value="{{old('email')}}" style="@error('email') border: 1px solid red; @enderror"  >
                     <span style="color: red;">@error('email') {{$message}} @enderror </span>
                  </div>  

                  <div class="field">
                     <label>Password <span class="asterisk"> * </span></label>
                     <input type="password" name="password" placeholder="Example: lelne@gmail.com" value="{{old('password')}}" style="@error('password') border: 1px solid red; @enderror"  >
                     <span style="color: red;">@error('password') {{$message}} @enderror </span>
                  </div>  

                 <div class="field">
                     <label>Confirm Password <span class="asterisk"> * </span> </label>
                     <input type="password" name="confirm_password" placeholder="Example: lelne@gmail.com" value="{{old('confirm_password')}}" style="@error('confirm_password') border: 1px solid red; @enderror"  >
                     <span style="color: red;">@error('confirm_password') {{$message}} @enderror </span>
                  </div>  

               </div>   

              </div>

            </form>
           <div id = "Button-Fields">     
              
           <button onclick="registerings()" type="submit">        
               <span id="Submit">Create Account</span>    
               <i class="fa-solid fa-square-plus"></i> 
           </button>  

           <a href ="/" id="BUT">        
            <span id="Submit">Go Back</span>    
            <i class="fa-solid fa-rotate-left"></i>
           </a> 

          </div>
           
         </div>
             
    
       </div>

       <script src="{{asset('js/SweetAlert.JS')}}"></script>
       <script src="{{asset('js/Toasted.JS')}}"></script>
       <script src="{{asset('js/Sweet.JS')}}"></script>
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


         @if($errors->any())     
                     Toast.fire({
                           icon: 'error',
                           title: 'Some Fields Are Empty !'
                     })
         @endif


         @if(Session::has('regis')) 
            Swal.fire({
            icon: 'success',
            title: 'You are now registered',
            html: '{{session('regis')}}',
            backdrop: `
                  rgba(0,0,123,0.4)
                  url("/images/Asset_img/anya.gif")
                  center top
                  no-repeat
                  `
            })
          @endif

       </script>
    </body>
 
</html>