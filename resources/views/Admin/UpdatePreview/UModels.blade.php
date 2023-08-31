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
                    <h1 class = "M-TITTL">Update Models</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                <form action="{{Route('Dimentional.update', $models->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf   
                    @method('PUT')  

                    <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="field">
                                <label>Model Name</label>
                                <input type="text" name="name" placeholder="Example: Card 3D Rendered" value="{{old('name') ?? $models->name}}" style="@error('name') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$message}} @enderror </span>
                             </div>  
        
                             <div class="field">
                                <label>Category</label>
                                <select  class ="selects"  name="category_id" id="" value="{{old('category_id')}}" style="@error('category_id') border: 1px solid red; @enderror">                                               
                                    @foreach($category as $ctry)
                                    <!--query for selected data-->
                                    <option value="{{$ctry->id}}" {{$ctry->id == $models->category_id ? 'selected' : ''}}>{{$ctry->name}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red;">@error('category_id') {{$message}} @enderror </span>
                                
                             </div> 

                             <div class="field">
                                <label>status</label>
                                <select name="status">
                                    @if($models->status == "Active")
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    @endif
                                    @if($models->status == "Inactive")
                                        <option value="Inactive" selected>Inactive</option>
                                        <option value="Active" >Active</option>
                                    @endif                                      
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
                                            {{-- <model-viewer src="/images/3DModels_GLB/{{$models->model}}" alt="" value="{{old('model')}}" style="@error('model') border: 1px solid red; @enderror"auto-rotate camera-controls ar ios-src=""></model-viewer> --}}
                                            <model-viewer value="{{old('model')}}"  style="@error('model') border: 1px solid red; @enderror" camera-controls touch-action="pan-y" autoplay ar shadow-intensity="1" src="/images/3DModels_GLB/{{$models->model}}" alt="An animated 3D model of a robot"></model-viewer>    
                                            <div> <span>Choose model</span></div>
                                        </label>

                                    </div>
                               
                                </div>
                            </div> 
                            <span style="color: red;">@error('model') {{$message}} @enderror </span>
                                              
                        </div> 

                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('Dimentional.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit" id = "save"> <i class="fa-solid fa-circle-plus"></i> <span> update </span></button>
                        </div>
                     
                    </div>

                </form>
               
                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>
    </div> 

        @endsection  
