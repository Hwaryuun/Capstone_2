@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Users')
@section('navi','Users')

    <div class="main"> <!-- Main------------------------------------>

        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>
        
                <div class ="Top-Form">
                    <h1 class = "M-TITTL">View : {{ $customerview->firstname }}  {{ $customerview->lastname }} </h1>      
                </div>
        
                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>
       
                 
                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class = "EXSepator"> 

                                <div class="field">
                                    <label> First Name </label>
                                    <input type="text" readonly  value="{{$customerview->firstname}}"  style="border: 1px solid rgb(70, 72, 166, 0.536); ">
                                 </div>    
    
                                <div class="field">
                                    <label> Last Name</label>
                                    <input type="text" readonly value="{{$customerview->lastname}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                                 </div>  
    
                            </div>  

                        </div>  <!-- Mid S1------------------------------------>
                       
                        <div class = "EXSepator"> 

                        <div class="field">
                            <label> Full Address </label>
                            <input type="text" readonly  value="{{$customerview->address}}"  style="border: 1px solid rgb(70, 72, 166, 0.536); ">
                         </div>    

                         <div class="field">
                            <label> Contact Number </label>
                            <input type="text" readonly  value="{{$customerview->contactnumber}}"  style="border: 1px solid rgb(70, 72, 166, 0.536); ">
                         </div>   

                        </div>  

                        <div class = "EXSepator"> 

                            <div class="field">
                                <label> Birth Date </label>
                                <input type="text" readonly  value="{{$customerview->birthdate}}"  style="border: 1px solid rgb(70, 72, 166, 0.536); ">
                             </div>    
    
                             <div class="field">
                                <label> Email Address </label>
                                <input type="text" readonly  value="{{$customerview->email}}"  style="border: 1px solid rgb(70, 72, 166, 0.536); ">
                             </div>   
    
                        </div>  
                          
                
        
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-B"  href="{{Route('Users.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>       
                        </div>

                      
                </div> <!-- Mid Inp------------------------------------>
        
        
            </div> <!-- Add Inp------------------------------------>
        
        </div> <!-- Add Holder------------------------------------>

       
     

    </div><!-- Main------------------------------------>

    @endsection  