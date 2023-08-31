@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Pricing')
@section('navi','Pricing')


    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holders"> <!-- Add Holder------------------------------------>

            <div class="Add-InPs"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">Upadate Pricing Type</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>
                  
                      
                <form action="{{Route('PricingType.update', $pricingtype->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')
                     
                    
           
                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="field">
                                <label>Type Name</label>
                                <input type="text" name="name" placeholder="Example: Piece, Box, Reams" value="{{old('name') ?? $pricingtype->name}}" style="@error('typename') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$name}} @enderror </span>
                             </div>  
        
                             <div class="field">
                                <label>status</label>
                                <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                    @if($pricingtype->status == "Active")
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    @endif
                                    @if($pricingtype->status == "Inactive")
                                        <option value="Inactive" selected>Inactive</option>
                                        <option value="Active" >Active</option>
                                    @endif                         
                                </select>
                                <span style="color: red;">@error('status') {{$message}} @enderror </span>
                                
                             </div>  
          
                        </div>  <!-- Mid S1------------------------------------>

          
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('PricingType.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                        </div>

                      
                </form>
                     
                
                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>
    </div> 

    @endsection  