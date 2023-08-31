@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Category')
@section('navi','Category')

    <div class="main"> <!-- Main------------------------------------>

        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>
        
                <div class ="Top-Form">
                    <h1 class = "M-TITTL">Add Papers </h1>      
                </div>
        
                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>
        
            
        
                <form action="{{Route('PaperSpecs.store',$category->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    
                    <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>
        
                        <div class = "S1"> <!-- Mid S1------------------------------------>
        
                            
                            <div class = "EXSepator"> 
                            <div class="field">
                                <label> ID </label>
                                <input type="text" readonly name="category_id" value="{{old('id') ?? $category->id}}"  style="border: 1px solid rgb(70, 72, 166, 0.536); ">
                             </div>    

                            <div class="field">
                                <label>Category Name</label>
                                <input type="text" readonly value="{{old('name') ?? $category->name}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                             </div>  
                            </div>  
                           
                            <div class="field">
                                <label> Type </label>
                                <input type="text" readonly value="{{old('name') ?? $category->CategoryType->typename}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                             </div>    
        
                             <div class="field">
                                <label>Category Description</label>
                                <textarea type=" text"  readonly style="border: 1px solid rgb(70, 72, 166, 0.536);"> {{old('description') ?? $category->description}}</textarea>
                             </div>    
                              
                             <div class="field">
                                <label>Papers</label>
                                <select  class ="selects"  name="papers_id" id="" value="{{old('papers_id')}}" style="@error('papers_id') border: 1px solid red; @enderror">                                               
                                     <option disabled= "" value="">Select type</option>
                                     @foreach($papers as $paper)
                                        <option value="{{$paper->id}}">{{$paper->name}}</option>
                                     @endforeach  
                                </select>
                                <span style="color: red;">@error('papers_id') {{$message}} @enderror </span>
                                
                             </div>  

                             <div class="field">
                                <label>Paper Type</label>
                                <select  class ="selects"  name="papertypes_id" id="" value="{{old('papertypes_id')}}" style="@error('papertypes_id') border: 1px solid red; @enderror">                                               
                                     <option disabled= "" value="">Select type</option>
                                     @foreach($papertypes as $papertype)
                                        <option value="{{$papertype->id}}">{{$papertype->name}}</option>
                                     @endforeach
                                </select>
                                <span style="color: red;">@error('papertypes_id') {{$message}} @enderror </span>
                                
                             </div> 
          
                        </div>  <!-- Mid S1------------------------------------>
                       
                                 
                        <div class = "S2">  <!-- Mid S2------------------------------------>
                    

    
                            <div class="field">
        
                                <label>Cover Image</label>           
                                <div class="form" >
                                    <div class="grid">
                                    
                                        <div class="form-element" style="border: 2px dashed rgba(70, 72, 166, 0.536);" >
                                            <input type="file" disabled="disabled" id="file-1" value="{{old('image')}}" >
                                            <label for="file-1" id="file-1-preview">
                                            <img src="/images/Category_img/{{$category->image}}" alt=""  value="{{old('image')}}">
                                            <div> <span></span></div>
                                            </label>
        
                                        </div>
                                    
                                    </div>
                                </div> 
                                                  
                            </div> 

                            <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                                <div class="field">
                                    <label>LBS</label>
                                    <input type="number" name="lbs" placeholder="Example: 80lbs , 100lbs" value="{{old('lbs')}}" style="@error('lbs') border: 1px solid red; @enderror" >
                                    <span style="color: red;">@error('lbs') {{$message}} @enderror </span>
                                 </div> 
        
                                 
                                <div class="field">
                                    <label>Value</label>
                                    <input type="number"  step="any" name="value" placeholder="Value added" value="{{old('value')}}" style="@error('value') border: 1px solid red; @enderror" >
                                    <span style="color: red;">@error('value') {{$message}} @enderror </span>
                                 </div> 
        
        
                                </div> 
    
                             
                             <div class="field">
                                <label>Quantity</label>
                                <input type="number" name="quantity" placeholder="Example: 100" value="{{old('quantity')}}" style="@error('quantity') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('quantity') {{$message}} @enderror </span>
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
                            <a class ="Add-ITM-C"  href="{{Route('Category.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                        </div>

                        <div class="BUTNS-BACK">
                            <a class ="Add-ITM-X"  href="{{Route('PaperSpecs.index')}}"> <i class="fa-solid fa-right-from-bracket"></i><span> To Papers </span></a> 
                         </div>
                      
                </form>
                     
        
                    </div> <!-- Mid Seperator------------------------------------>
        
                </div> <!-- Mid Inp------------------------------------>
        
        
            </div> <!-- Add Inp------------------------------------>
        
        </div> <!-- Add Holder------------------------------------>

       
     

    </div><!-- Main------------------------------------>

    @endsection  

