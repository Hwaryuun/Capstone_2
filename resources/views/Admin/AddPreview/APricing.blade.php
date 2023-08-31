@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Pricing')
@section('navi','Pricing')

<div class="main"> <!-- Main------------------------------------>


    <div class="Add-Holder"> <!-- Add Holder------------------------------------>

        <div class="Add-InP"> <!-- Add Inp------------------------------------>

            <div class ="Top-Form">
                <h1 class = "M-TITTL">Add Price</h1>      
            </div>

            <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                  
            <form action="{{Route('Pricing.store')}}" method="POST" enctype="multipart/form-data">
                @csrf  
                
                <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                    <div class = "S1"> <!-- Mid S1------------------------------------>

                        <div class="field">
                            <label>Products</label>
                            <select  class ="selects"  name="product_id" id="" value="{{old('product_id')}}" style="@error('product_id') border: 1px solid red; @enderror">                                               
                                 <option disabled= "" value="">Select type</option>
                                 @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                 @endforeach 
                            </select>
                            <span style="color: red;">@error('product_id') {{$message}} @enderror </span>
                            
                         </div> 
    
                         <div class="field">
                            <label>Size</label>
                            <select  class ="selects"  name="size_id" id="" value="{{old('size_id')}}" style="@error('size_id') border: 1px solid red; @enderror">                                               
                                 <option disabled= "" value="">Select type</option>
                                 @foreach($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->length}} x {{ $size->width}}</option>
                                 @endforeach  
                            </select>
                            <span style="color: red;">@error('size_id') {{$message}} @enderror </span>
                            
                         </div>  
                          
      
                    </div>  <!-- Mid S1------------------------------------>

                    <div class = "S2">  <!-- Mid S2------------------------------------>

                    <div class = "EXSepator"> 
                        <div class="field">
                            <label>Pricing By: </label>
                            <select  class ="selects"  name="pricingtype_id" id="" value="{{old('pricingtype_id')}}" style="@error('pricingtype_id') border: 1px solid red; @enderror">                                               
                                 <option disabled= "" value="">Select type</option>
                                 @foreach($pricingtype as $pt)
                                    <option value="{{$pt->id}}">{{$pt->name}}</option>
                                 @endforeach
                            </select>
                            <span style="color: red;">@error('pricingtype_id') {{$message}} @enderror </span>
                            
                         </div> 
                       
                        <div class="field">
                            <label>Price : PHP</label>
                            <input type="number" step="any" name="price" placeholder="Price" value="{{old('price')}}" style="@error('price') border: 1px solid red; @enderror" >
                            <span style="color: red;">@error('price') {{$message}} @enderror </span>
                         </div> 
                    </div>  

                        <div class="field">
                            <label>Status</label>
                            <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <span style="color: red;">@error('status') {{$message}} @enderror </span>                          
                         </div>  

                    </div>  <!-- Mid S2------------------------------------>

                    <div class="BUTNS-AD">
                        <a class ="Add-ITM-C"  href="{{Route('Pricing.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                        <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                    </div>
          
                </form>
                 

                </div> <!-- Mid Seperator------------------------------------>

            </div> <!-- Mid Inp------------------------------------>


        </div> <!-- Add Inp------------------------------------>

    </div> <!-- Add Holder------------------------------------>
</div> 

    @endsection  

