@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Quantity')
@section('navi','Quantity')

    <!-- Primary end ------------------------------------------------------------------------------->


    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">New Leaf Quantity</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                    <form action="{{Route('Leaf.store')}}" method="POST" enctype="multipart/form-data" id = "SBMIT">
                        @csrf  
                        
                         <!-- Mid Seperator------------------------------------>
                         <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                            <div class = "S1"> <!-- Mid S1------------------------------------>

                                <div class="field">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" placeholder="Example: 200pcs, 300pcs" value="{{old('quantity')}}" style="@error('quantity') border: 1px solid red; @enderror" >
                                    <span style="color: red;">@error('quantity') {{$message}} @enderror </span>
                                 </div>

                                <div class="field">
                                    <label>Value Add: </label>
                                    <input type="number" step="any" name="value" placeholder="Example: 1, 5" value="{{old('value')}}" style="@error('value') border: 1px solid red; @enderror" >
                                    <span style="color: red;">@error('value') {{$message}} @enderror </span>
                                 </div> 
                                 

                                                                 
                                

                            </div>  <!-- Mid S1------------------------------------>

                            <div class = "S2">

                                <div class="field">
                                    <label>Category</label>
                                    <select  class ="selects"  name="category_id" id="" value="{{old('category_id')}}" style="@error('category_id') border: 1px solid red; @enderror">                                               
                                         <option disabled= "" value="">Select type</option>
                                         @foreach($category as $ctg)
                                            <option value="{{$ctg->id}}">{{$ctg->name}}</option>
                                         @endforeach

                                    </select>
                                    <span style="color: red;">@error('category_id') {{$message}} @enderror </span>
                                    
                                 </div> 

                            
            
                                 <div class="field">
                                    <label>status</label>
                                    <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <span style="color: red;">@error('status') {{$message}} @enderror </span>
                                    
                                 </div>  
              
                     </div>

                            <div class="BUTNS-AD">
                                <a class ="Add-ITM-C"  href="{{Route('Leaf.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                                <button class ="Add-ITM" type="submit" id = "save"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                            </div>
                            
                        </div> 
              
              
    
                          
                    </form>

                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>


    </div><!-- Main------------------------------------>
    @endsection  
