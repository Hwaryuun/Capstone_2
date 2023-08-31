@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Printing')
@section('navi','Printing')

    <div class="main"> <!-- Main------------------------------------>

        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>
        
                <div class ="Top-Form">
                    <h1 class = "M-TITTL">View Category: {{$category->name}} </h1>      
                </div>
        
                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>
        
            
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
                                            </label>
        
                                        </div>
                                    
                                    </div>
                                </div> 
                                                  
                            </div> 

                            <div class="field">
                                <label>Status</label>
                                <input type="text" readonly value="{{old('name') ?? $category->status}}" style="border: 1px solid rgb(70, 72, 166, 0.536);">
                             </div>  

        
                        </div>  <!-- Mid S2------------------------------------>
        
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-B"  href="{{Route('Category.index')}}" > <i class="fa-solid fa-circle-xmark" ></i> <span> Back </span></a>                         
                        </div>
   
               
                    </div> <!-- Mid Seperator------------------------------------>
        
                </div> <!-- Mid Inp------------------------------------>
        
        
            </div> <!-- Add Inp------------------------------------>
        
        </div> <!-- Add Holder------------------------------------>

       
     

    </div><!-- Main------------------------------------>

    @endsection  

