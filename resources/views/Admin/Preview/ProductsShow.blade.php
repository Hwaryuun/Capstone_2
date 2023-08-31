@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Products')
@section('navi','Products')

    <div class="main"> <!-- Main------------------------------------>

        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>
        
                <div class ="Top-Form">
                    <h1 class = "M-TITTL">View Products: {{ $products->name }} </h1>      
                </div>
        
                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>
       
                    <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>
        
                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class = "EXSepator"> 

                                <div class="field">
                                    <label> ID </label>
                                    <input type="text" readonly name="product_id" value="{{old('id') ?? $products->id}}"  style="border: 1px solid rgb(70, 72, 166, 0.536); ">
                                 </div>    
    
                                <div class="field">
                                    <label>Product Name</label>
                                    <input type="text" readonly value="{{old('name') ?? $products->name}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                                 </div>  
    
                                </div>  

               
                            <div class="field">
        
                                <label>Product Image</label>           
                                <div class="form" >
                                    <div class="grid">
                                    
                                        <div class="form-element" style="border: 2px dashed rgba(70, 72, 166, 0.536);" >
                                            <input type="file" disabled="disabled" id="file-1" value="{{old('image')}}" >
                                            <label for="file-1" id="file-1-preview">
                                            <img src="/images/Product_img/{{$products->image}}" alt=""  value="{{old('image')}}">
                             
                                            </label>
        
                                        </div>
                                    
                                    </div>
                                </div> 
                                                  
                            </div> 

                           
                   
        
               
                      
          
          
                        </div>  <!-- Mid S1------------------------------------>
                       
                                 
                        <div class = "S2">  <!-- Mid S2------------------------------------>
                    
                         
                            <div class = "EXSepator"> 
                            <div class="field">
                                <label> Category Name </label>
                                <input type="text" readonly value="{{old('name') ?? $products->Category->name}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                             </div>  
                            
                             <div class="field">
                                <label>Estimated Production</label>
                                <input type="text" readonly value="{{old('name') ?? $products->eproduction}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                             </div>  
                            </div>  
                            
                            <div class="field">
                                <label>Product Description</label>
                                <textarea type=" text"  readonly style="border: 1px solid rgb(70, 72, 166, 0.536);"> {{old('description') ?? $products->description}}</textarea>
                             </div>    
                  
                    

                            <div class="field">
                                <label>Status</label>
                                <input type="text" readonly value="{{old('name') ?? $products->status}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                             </div>  

                          
                        </div>  <!-- Mid S2------------------------------------>
        
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-B"  href="{{Route('Products.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>       
                        </div>

                      
        
                    </div> <!-- Mid Seperator------------------------------------>
        
                </div> <!-- Mid Inp------------------------------------>
        
        
            </div> <!-- Add Inp------------------------------------>
        
        </div> <!-- Add Holder------------------------------------>

       
     

    </div><!-- Main------------------------------------>

    @endsection  