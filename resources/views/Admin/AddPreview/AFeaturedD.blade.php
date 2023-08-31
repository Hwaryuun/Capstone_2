@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Designs')
@section('navi','Designs')

    <div class="main"> <!-- Main------------------------------------>

        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>
        
                <div class ="Top-Form">
                    <h1 class = "M-TITTL">Add Featured </h1>      
                </div>
        
                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>
        
            
        
                <form action="{{Route('FeaturedNTemplates.store',$designs->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    
                    <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>
        
                        <div class = "S1"> <!-- Mid S1------------------------------------>
      

                            <div class="field">
                                <label> ID </label>
                                <input type="text" readonly name="design_id" value="{{old('id') ?? $designs->id}}"  style="border: 1px solid rgb(70, 72, 166, 0.536); ">
                             </div>    

                             <div class="field">
        
                                <label>Image Front</label>           
                                <div class="form" >
                                    <div class="grid">
                                    
                                        <div class="form-element" style="border: 2px dashed rgba(70, 72, 166, 0.536);" >
                                            <input type="file" disabled="disabled" id="file-1" value="{{old('image')}}" >
                                            <label for="file-1" id="file-1-preview">
                                            <img src="/images/Design_img/{{$designs->imagef}}" alt=""  value="{{old('image')}}">
                                            <div> <span></span></div>
                                            </label>
        
                                        </div>
                                    
                                    </div>
                                </div> 
                                                  
                            </div> 
                                        
                            <div class="field">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Example: Batman Templates" value="{{old('name')}}" style="@error('name') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$message}} @enderror </span>
                            </div>  

                  
                            <div class="field">
                                <label>Date Featured</label>
                                <input type="date" name="date" placeholder="Example: BTM-01" value="{{old('date')}}" style="@error('tag') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('date') {{$message}} @enderror </span>
                            </div>  


                        </div>  <!-- Mid S1------------------------------------>
                       
                                 
                        <div class = "S2">  <!-- Mid S2------------------------------------>

                    
                            <div class="field">
                                <label>Design Name</label>
                                <input type="text" readonly value="{{old('name') ?? $designs->name}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                             </div>  

               
    
                            <div class="field">
        
                                <label> Image Back</label>           
                                <div class="form" >
                                    <div class="grid">
                                    
                                        <div class="form-element" style="border: 2px dashed rgba(70, 72, 166, 0.536);" >
                                            <input type="file" disabled="disabled" id="file-1" value="{{old('image')}}" >
                                            <label for="file-1" id="file-1-preview">
                                            <img src="/images/Design_img/{{$designs->imageb}}" alt=""  value="{{old('image')}}">
                                            <div> <span></span></div>
                                            </label>
        
                                        </div>
                                    
                                    </div>
                                </div> 
                                                  
                              </div> 

                            
                            <div class="field">
                                <label>Product</label>
                                <select  class ="selects"  name="product_id" id="" value="{{old('product_id')}}" style="@error('product_id') border: 1px solid red; @enderror">                                               
                                     <option disabled= "" value="">Select type</option>
                                     @foreach($products as $prdct)
                                        <option value="{{$prdct->id}}">{{$prdct->name}}</option>
                                     @endforeach
      
                                </select>
                                <span style="color: red;">@error('product_id') {{$message}} @enderror </span>
                                
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
                            <a class ="Add-ITM-C"  href="{{Route('Design.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                        </div>

                        <div class="BUTNS-BACK">
                            <a class ="Add-ITM-X"  href="{{Route('FeaturedNTemplates.index')}}"> <i class="fa-solid fa-right-from-bracket"></i><span> To Featured </span></a> 
                         </div>
              
                     
                      
                         
                    </div> <!-- Mid Seperator------------------------------------>
                </form>

                </div> <!-- Mid Inp------------------------------------>
        
        
            </div> <!-- Add Inp------------------------------------>
        
        </div> <!-- Add Holder------------------------------------>

    
    </div><!-- Main------------------------------------>

    @endsection  