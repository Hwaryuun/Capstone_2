@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Category')
@section('navi','Update')

  
<div class="main"> <!-- Main------------------------------------>


<div class="Add-Holder"> <!-- Add Holder------------------------------------>

    <div class="Add-InP"> <!-- Add Inp------------------------------------>

        <div class ="Top-Form">
            <h1 class = "M-TITTL">Update Category</h1>      
        </div>

        <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

    

        <form action="{{Route('Category.update',$category->id )}}" method="POST" enctype="multipart/form-data">
            @csrf  
            @method('PUT')
            
            <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                <div class = "S1"> <!-- Mid S1------------------------------------>

                    <div class="field">
                        <label>Category Name</label>
                        <input type="text" name="name" placeholder="Example: Card" value="{{old('name') ?? $category->name}}" style="@error('name') border: 1px solid red; @enderror" >
                        <span style="color: red;">@error('name') {{$message}} @enderror </span>
                     </div>  

                     <div class="field">
                        <label>Category Description</label>
                        <textarea type=" text" name="description" placeholder="Description"  style="@error('description') border: 1px solid red; @enderror"> {{old('description') ?? $category->description}}</textarea>
                        <span style="color: red;">@error('description') {{$message}} @enderror </span>
                     </div>    
                      

                     <div class="field">
                        <label>Service</label>
                        <select name="categorytype_id" id="" value="{{old('categorytype_id')}}" style="@error('categorytype_id') border: 1px solid red; @enderror">
                          
                            @foreach($cattypedata as $catdata)
                                                                    <!--query for selected data-->
                            <option value="{{$catdata->id}}" {{$catdata->id == $category->categorytype_id ? 'selected' : ''}}>{{$catdata->typename}}</option>
                            @endforeach
                            
                     
                        </select>
                        <span style="color: red;">@error('type') {{$message}} @enderror </span>
                        
                     </div> 
  
                </div>  <!-- Mid S1------------------------------------>
               
                         
                <div class = "S2">  <!-- Mid S2------------------------------------>
            
                      <div class="field">
                        <label>status</label>
                        <select name="status">
                            @if($category->status == "Active")
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                            @endif
                            @if($category->status == "Inactive")
                                <option value="Inactive" selected>Inactive</option>
                                <option value="Active" >Active</option>
                            @endif                         
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
                                    <img src="/images/Category_img/{{$category->image}}" alt=""  value="{{old('image')}}" style="@error('image') border: 1px solid red; @enderror">
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
                    <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                </div>

              
            </form>
             

            </div> <!-- Mid Seperator------------------------------------>

        </div> <!-- Mid Inp------------------------------------>


    </div> <!-- Add Inp------------------------------------>

</div> <!-- Add Holder------------------------------------>
</div> 


@endsection  
