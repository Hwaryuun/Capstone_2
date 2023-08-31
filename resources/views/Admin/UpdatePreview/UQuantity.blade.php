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
                    <h1 class = "M-TITTL">New Quantity</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                    <form action="{{Route('Quantity.update',$quantities->id )}}" method="POST" enctype="multipart/form-data" id = "SBMIT">
                        @csrf  
                        @method('PUT')
                        
                         <!-- Mid Seperator------------------------------------>
                         <div class = "EXSepator"> 

                            <div class = "S1"> <!-- Mid S1------------------------------------>
    
                                <div class="field">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" placeholder="Example: 200pcs, 300pcs" value="{{old('quantity')  ?? $quantities->quantity}}" style="@error('quantity') border: 1px solid red; @enderror" >
                                    <span style="color: red;">@error('quantity') {{$message}} @enderror </span>
                                 </div> 

                             <div class = "EXSepator"> 

                                <div class="field">
                                    <label>Value</label>
                                    <input type="number" step="any" name="value" placeholder="Example: 200pcs, 300pcs" value="{{old('value') ?? $quantities->value }}" style="@error('value') border: 1px solid red; @enderror" >
                                    <span style="color: red;">@error('value') {{$message}} @enderror </span>
                                 </div> 
                                 
                                 <div class="field">
                                    <label>Value By:</label>
                                    <select name="pricingtype_id" id="" value="{{old('pricingtype_id')}}" style="@error('pricingtype_id') border: 1px solid red; @enderror">
                                      
                                        @foreach($pricingtype as $prt)
                                                                                <!--query for selected data-->
                                        <option value="{{$prt->id}}" {{$prt->id == $quantities->pricingtype_id ? 'selected' : ''}}>{{$prt->name}}</option>
                                        @endforeach
                                        
                                 
                                    </select>
                                    <span style="color: red;">@error('pricingtype_id') {{$message}} @enderror </span>
                                    
                                 </div> 
                                 
                                </div> 
                  
              
                            </div>  <!-- Mid S1------------------------------------>

                            <div class = "S2">

                                <div class="field">
                                    <label>Service</label>
                                    <select name="categorytype_id" id="" value="{{old('categorytype_id')}}" style="@error('categorytype_id') border: 1px solid red; @enderror">
                                      
                                        @foreach($categorytype as $catdata)
                                                                                <!--query for selected data-->
                                        <option value="{{$catdata->id}}" {{$catdata->id == $quantities->categorytype_id ? 'selected' : ''}}>{{$catdata->typename}}</option>
                                        @endforeach
                                      
                                    </select>
                                    <span style="color: red;">@error('pricingtype_id') {{$message}} @enderror </span>
                                    
                                 </div> 
            
                                 <div class="field">
                                    <label>status</label>
                                    <select name="status">
                                        @if($quantities->status == "Active")
                                            <option value="Active" selected>Active</option>
                                            <option value="Inactive">Inactive</option>
                                        @endif
                                        @if($quantities->status == "Inactive")
                                            <option value="Inactive" selected>Inactive</option>
                                            <option value="Active" >Active</option>
                                        @endif                                 
                                    </select>
            
            
                                    <span style="color: red;">@error('status') {{$message}} @enderror </span>
                                    
                                 </div>  

                           </div> 

                           <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('Quantity.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit" id = "save"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                        </div>

                          </div>  
              
                          
    
                          
                    </form>

                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>


    </div><!-- Main------------------------------------>
    @endsection  
