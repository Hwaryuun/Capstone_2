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
                    <h1 class = "M-TITTL">{{$order->Orders->ClientAcc->firstname}}'s Order</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                <form action="{{Route('Partial.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')  

                    <div class="samimi">

                        <div class="Simsg">
                            <img src="/images/Product_img/{{$order->Carts->ProductPricing->Products->image}}" alt="">
                        </div>

                        <div class="infox">
                           
                            <p class="subaas"> <b> NAME : </b> {{$order->Orders->fullname}} </p>
                            <p class="subaas"> <b> EMAIL : </b>{{$order->Orders->emailadd}}. </p>
                            <p class="subaas"> <b> CLIENT : </b> {{$order->Orders->ClientAcc->lastname}} {{$order->Orders->ClientAcc->firstname}} {{$order->Orders->ClientAcc->lastname}} . </p>

                            <hr>
                            <p class="subaas"> <b>  PRODUCT : </b> {{$order->Carts->ProductPricing->Products->name}}. </p>
                            <p class="subaas"> <b>  SIZE : </b>{{$order->Carts->ProductPricing->Size->length}} x {{$order->Carts->ProductPricing->Size->width}}. </p>
                            <p class="subaas"> <b>  PAPER STOCK : </b> {{$order->Carts->paperdefault}}. </p>
                            @if ($order->Carts->cover)
                            <p class="subaas"> <b>  PAPER COVER : </b> {{$order->Carts->cover}}. </p>
                            <p class="subaas"> <b>  PAGE : </b>  {{$order->Carts->page}}. </p>
                            @endif
                         
                            <p class="subaas"> <b>  QUANTIY : </b> {{$order->Carts->quantity}}.pcs </p>
                            <p class="subaas"> <b>  PRODUCT PRICE : </b>₱ {{ number_format((float)$order->price, 2,".",",") }}</p>
                            <hr>
                            <p class="subaas"> <b>  CLIENT DESIGN : </b> <a target ="_blank" href="/images/Clientfile_img/{{$order->Carts->files}}"> Click Here. </a> </p>
                        </div>
                    </div>

                    <div class="azami">
            
                        <div class="yuzaki">
                     
                            <p class="subaas"> <b> TRACKING TAG : </b> {{$order->Orders->tracking_no}} </p>  
                            <p class="subaas"> <b> TRACKING TAG OLD : </b> {{$order->tracking_old}} </p>                     
                            <p class="subaas"> <b> PAYMENT ID : </b>  {{$order->Orders->payment_id}} </p>
                        </div>

                        <div class="yuzaki">
                       
                            <div class="fields">
                        
                                <p class="subaas"> <b> STATUS : </b>   @if ($order->statusODR == 'In-Progress')
                                                                            <i class="fa-solid fa-file-circle-exclamation" style="color: rgb(231, 196, 0);"></i>
                                                                        @elseif ($order->statusODR == 'Finished')
                                                                            <i class="fa-solid fa-file-circle-check" style="color: rgb(0, 254, 51);"></i>
                                                                        @else
                                                                            <i class="fa-solid fa-file-circle-minus" style="color: rgb(0, 94, 255);" ></i>  
                                                                        @endif
                                <select name="status">
                                    @if($order->statusODR == "New-Order")
                                        <option value="New-Order" selected> New-Order</option>
                                        <option value="In-Progress" >In-Progress</option>
                                        <option value="Finished">Finished</option>
                                    
                                    @endif
                                    @if($order->statusODR == "In-Progress")
                                        <option value="In-Progress" selected>In-Progress</option>
                                        <option value="Finished">Finished</option>
                                        <option value="New-Order">New-Order</option>
                                    @endif  
                                    @if($order->statusODR == "Finished")
                                        <option value="Finished" selected>Finished</option>
                                        <option value="New-Order">New-Order</option>
                                        <option value="In-Progress" >In-Progress</option>
                                     @endif                        
                                </select>  
                                </p>
                             </div>    

                            
                                <p class="subaas"> <b> REMARKS : </b> {{$order->Orders->remarks}}  </p>
                                <p class="subaas"> <b> DATE ORDERED : </b>  {{$order->created_at->format('F j, Y')}}  <b>  </b> {{$order->created_at->diffForHumans()}}  </p>
                            
                        </div>
                    </div>

                    <div class = "EXSepator">
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('Partial.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update Order </span></button>
                        </div>
                        <div class="BUTNS-BACK">
                            <a class ="Add-ITM-X"  href="{{Route('PrintPdfrPar',  $order->id)}}"> <i class="fa-solid fa-print"></i><span> Print Order </span></a> 
                        </div>  
                    </div>
             
                </form>

                 </div> <!-- Mid Inp------------------------------------>
            </div> <!-- Add Inp------------------------------------>
        </div> <!-- Add Holder------------------------------------>

    </div><!-- Main------------------------------------>
        
    @endsection  