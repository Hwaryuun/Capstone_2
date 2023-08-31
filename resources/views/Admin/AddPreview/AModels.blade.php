@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Models')
@section('navi','Models')


    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holders"> <!-- Add Holder------------------------------------>

            <div class="Add-InPs"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">New Models</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                <form action="{{Route('Dimentional.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf   

                    <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="field">
                                <label>Model Name</label>
                                <input type="text" name="name" placeholder="Example: Card 3D Rendered" value="{{old('name')}}" style="@error('name') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$message}} @enderror </span>
                             </div>  
        
                          
                             <div class="field">
                                <label>Category</label>
                                <select  class ="selects"  name="category_id" id="" value="{{old('category_id')}}" style="@error('category_id') border: 1px solid red; @enderror">                                               
                                     <option disabled= "" value="">Select Product</option>
                                     @foreach($category as $ctry)
                                      <option value="{{$ctry->id}}">{{$ctry->name}}</option>
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
          
                        </div>  <!-- Mid S1------------------------------------>

                        
                        <div class="field">

                            <label>3d Model GLB, GLF</label>           
                            <div class="form3d">
                                <div class="grid3d">
                                
                                    <div class="form-element3d">
                                        <input type="file" id="file-3d" name="model"  value="{{old('model')}}" style="@error('model') border: 1px solid red; @enderror">
                                        <label for="file-3d" id="file-3d-preview">  
                                            <model-viewer value="{{old('model')}}"  style="@error('model') border: 1px solid red; @enderror" camera-controls touch-action="pan-y" autoplay ar shadow-intensity="1" src="" alt="An animated 3D model of a robot"></model-viewer>                                           
                                            {{-- <model-viewer src=" " alt="" value="{{old('model')}}" style="@error('model') border: 1px solid red; @enderror"auto-rotate camera-controls ar ios-src=""></model-viewer>  --}}
                                            <div> <span>Choose model</span></div>
                                        </label>

                                    </div>
                                
                                </div>
                            </div> 
                            <span style="color: red;">@error('model') {{$message}} @enderror </span>
                                              
                        </div> 
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('Dimentional.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit" id = "save"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                        </div>
                     
                   
                    </div>

                   </form>

                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>
    </div> 


 
        @endsection  

