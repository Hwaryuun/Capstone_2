@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Orders')
@section('navi','Orders')



    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">View Orders</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                        
                    <div class = "EXSepator"> <!-- Mid SEPERATOR------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="SRCH-CID">

                                <div class="field">
                                    <label>Enter Client ID</label>
                                    <input type="text" placeholder="Example: Manager">
                                </div>  
                                
                          <button class ="ENTR-B"> <i class="fa-solid fa-magnifying-glass"></i><span> Find </span> </button>

                            </div>  

                            <div class="SRCH-CID-2">  
                                <div class="card" >
                                    <div class="card-content">
                                        <div class="number-s">Kick Botowski</div>
                                        <div class="card-name-s">Customer Name</div>
                                    </div>
                                    <div class="icon-box">
                                        <i class="fa-solid fa-address-card"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="SRCH-CID-3">                                                                                               
                                        
                                <div class="card">
                                    <div class="card-content">
                                        <div class="number-s">Calling Card</div>
                                        <div class="card-name-s"> Product</div>
                                    </div>
                                </div>
            
                            </div>

             
                        </div><!-- Mid S1------------------------------------>

                        <div class = "S2"> <!-- Mid S2------------------------------------>
                      

                            <div class="SRCH-CID-3H">

                                <div class="card">
                                    <div class="card-content">
                                        <div class="number-s">42</div>
                                        <div class="card-name-s"> Quantity</div>
                                    </div>
                                </div>

                            </div>

                            <div class="SRCH-CID-3H">

                                <div class="card">
                                    <div class="card-content">
                                        <div class="number-s">Pending</div>
                                        <div class="card-name-s"> Status</div>
                                    </div>
                                </div>

                            </div>

                            <div class="SRCH-CID-4">       
                                                
                               <button class ="Add-ITM-B"> <i class="fa-solid fa-square-pen"></i> <span>  Specification </span></a> </button>
                               <button class ="Add-ITM-B"> <i class="fa-solid fa-image"></i><span>  Image </span> </button> 
                             
                            </div>
                           


                          
                        </div> <!-- Mid S2------------------------------------>

                        <div class="BUTNS-OK">
                            <button class ="Add-ITM"> <i class="fa-solid fa-circle-check"></i><span> Okay </span></button>
                         </div>
              
                         <div class="BUTNS-BACK">
                            <button class ="Add-ITM-X"> <i class="fa-solid fa-right-from-bracket"></i><span> Back </span></button> 
                         </div>

                     
                   
                    </div> <!-- Mid Seperator------------------------------------>

                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>

    </div><!-- Main------------------------------------>
    @endsection  