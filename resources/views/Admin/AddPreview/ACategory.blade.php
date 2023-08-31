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
                    <h1 class = "M-TITTL">New Category</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                      
                <form action="{{Route('Category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    
                    <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="field">
                                <label>Category Name</label>
                                <input type="text" name="name" placeholder="Example: Card" value="{{old('name')}}" style="@error('name') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$message}} @enderror </span>
                             </div>  
        
                             <div class="field">
                                <label>Category Description</label>
                                <textarea type=" text" name="description" placeholder="Description" value="{{old('description')}} " style="@error('description') border: 1px solid red; @enderror">{{old('description')}}</textarea>
                                <span style="color: red;">@error('description') {{$message}} @enderror </span>
                             </div>    
                              

                             <div class="field">
                                <label>Service</label>
                                <select  class ="selects"  name="categorytype_id" id="" value="{{old('categorytype_id')}}" style="@error('categorytype_id') border: 1px solid red; @enderror">                                               
                                     <option disabled= "" value="">Select type</option>
                                     @foreach($cattypedata as $catdata)
                                        <option value="{{$catdata->id}}" {{ old('categorytype_id') == $catdata->id ? "selected" :""}} >{{$catdata->typename}}</option>
                                     @endforeach
      
                                </select>
                                <span style="color: red;">@error('categorytype_id') {{$message}} @enderror </span>
                                
                             </div> 
          
                        </div>  <!-- Mid S1------------------------------------>

                        <div class = "S2">  <!-- Mid S2------------------------------------>

                              <div class="field">
                                <label>status</label>
                                <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <span style="color: red;">@error('status') {{$message}} @enderror </span>
                                
                             </div>  


                            <div class="field">

                                <label>Cover Image</label>           
                                <div class="form">
                                    <div class="grid">
                                    
                                        <div class="form-element">
                                            <input type="file" id="file-1" name="image"  value="{{old('image')}}" style="@error('image') border: 1px solid red; @enderror">
                                            <label for="file-1" id="file-1-preview">                                            
                                                <img src="  " alt=""  value="{{old('image')}}" style="@error('image') border: 1px solid red; @enderror">
                                                <div> <span>Choose image</span></div>
                                            </label>

                                        </div>
                                    
                                    </div>
                                </div> 
                                <span style="color: red;">@error('image') {{$message}} @enderror </span>
                                                  
                            </div> 

                        </div>  <!-- Mid S2------------------------------------>

                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('Category.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                        </div>
              
                    </form>
                     

                    </div> <!-- Mid Seperator------------------------------------>

                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>
    </div> 





        @endsection  

