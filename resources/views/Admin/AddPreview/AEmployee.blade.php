@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Employee')
@section('navi','Employee')

<div class="main"> <!-- Main------------------------------------>


    <div class="Add-Holder"> <!-- Add Holder------------------------------------>

        <div class="Add-InP"> <!-- Add Inp------------------------------------>

            <div class ="Top-Form">
                <h1 class = "M-TITTL">Add Employee</h1>      
            </div>

            <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>


                <form action="{{Route('Permision.store')}}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                    <div class = "S1"> <!-- Mid S1------------------------------------>


                        <div class = "EXSepator"> 
                                      
                            <div class="field">

                                <label>First Name</label>
                                <input type="text" name="first" placeholder="Kengkoy" value="{{old('first')}}" style="@error('first') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('first') {{$message}} @enderror </span>
                       
                            </div> 
   
                            <div class="field">
                                <label>Last Name : </label>
                                <input type="text" name="last" placeholder="Shematsu" value="{{old('last')}}" style="@error('first') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('last') {{$message}} @enderror </span>
                             </div> 
    
                            
                       </div> 
                         
           
                        <div class="field">
                            <label>Email: </label>
                            <input type="text" name="email" placeholder="Shematsu" value="{{old('email')}}" style="@error('email') border: 1px solid red; @enderror" >
                            <span style="color: red;">@error('email') {{$message}} @enderror </span>  
                         </div> 
                         
                          
      
                    </div>  <!-- Mid S1------------------------------------>

                    <div class = "S2">  <!-- Mid S2------------------------------------>

              

                    <div class = "EXSepator"> 
                     
                         
                         <div class="field">
                            <label>Password</label>
                            <input type="password" name="password" value="{{old('password')}}" style="@error('password') border: 1px solid red; @enderror"  >
                            <span style="color: red;">@error('password') {{$message}} @enderror </span>
                         </div> 

                         <div class="field">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password"  value="{{old('confirm_password')}}" style="@error('confirm_password') border: 1px solid red; @enderror"  >
                            <span style="color: red;">@error('confirm_password') {{$message}} @enderror </span> 
                         </div> 
                         
                    </div>  

                    <div class="field">
                        <label>Role</label>
                        <select class ="selects" name="roles" style="@error('roles') border: 1px solid red; @enderror" >
                            <option value="">---</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>        
                        <span style="color: red;">@error('roles') {{$message}} @enderror </span>                
                     </div>  

                    </div>  <!-- Mid S2------------------------------------>

                    <div class="BUTNS-AD">
                        <a class ="Add-ITM-C"  href="{{Route('Permision.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                        <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                    </div>
          
                </form>
                 

                </div> <!-- Mid Seperator------------------------------------>

            </form>
            </div> <!-- Mid Inp------------------------------------>


        </div> <!-- Add Inp------------------------------------>

    </div> <!-- Add Holder------------------------------------>
</div> 

    @endsection  

