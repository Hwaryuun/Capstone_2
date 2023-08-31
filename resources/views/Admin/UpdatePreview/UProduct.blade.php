@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Product')
@section('navi','Product')

    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">New Product</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                <form action="{{Route('Products.update', $products->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')  

                    <div class = "EXSepator"> <!-- Mid SEPERATOR------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>
                        <div class = "EXSepator">

                            <div class="field">
                                <label>Product Name</label>
                                <input type="text" name="name" placeholder="Example: Card" value="{{old('name')  ?? $products->name}}" style="@error('name') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$message}} @enderror </span>
                             </div> 

                             <div class="field">
                                <label>Category</label>
                                <select  class ="selects"  name="category_id" id="" value="{{old('category_id')}}" style="@error('category_id') border: 1px solid red; @enderror">                                               
                                    @foreach($category as $ctgy)
                                    <!--query for selected data-->
                                    <option value="{{$ctgy->id}}" {{$ctgy->id == $products->category_id ? 'selected' : ''}}>{{$ctgy->name}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red;">@error('category_id') {{$message}} @enderror </span>
                                
                             </div> 

                        </div> 
        
                             <div class="field">
                                <label>Description</label>
                                <textarea type=" text" name="description" placeholder="Description" value="{{old('description')}} " style="@error('description') border: 1px solid red; @enderror">{{old('description') ?? $products->description}}</textarea>
                                <span style="color: red;">@error('description') {{$message}} @enderror </span>
                             </div>    

                             <div class = "EXSepator">
                             <div class="field">
                                <label>Estimated Production</label>
                                <input type="number" max="30" min="0"  name="eproduction" placeholder="Example: 2-3 Working Days" value="{{old('eproduction')?? $products->eproduction}}" style="@error('eproduction') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('eproduction') {{$message}} @enderror </span>
                             </div>

        
                             <div class="field">
                                <label>.</label>
                                <input type="" disabled max="30" min="0" style="color: rgb(100, 100, 255)" value=" Working Days "  style="@error('eproduction') border: 1px solid red; @enderror" >     
                              </div>
                          </div> 


                    
                        </div><!-- Mid S1------------------------------------>

                        <div class = "S2"> <!-- Mid S2------------------------------------>

                       
                             <div class="field">
                                <label>status</label>
                                <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                    @if($products->status == "Active")
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    @endif
                                    @if($products->status == "Inactive")
                                        <option value="Inactive" selected>Inactive</option>
                                        <option value="Active" >Active</option>
                                    @endif 
                                </select>
                                <span style="color: red;">@error('status') {{$message}} @enderror </span>
                                
                             </div>  


                             <div class="field">

                              <label>Product Image</label>           
                              <div class="form">
                                  <div class="grid">
                                  
                                      <div class="form-element">
                                          <input type="file" id="file-1" name="image"  value="{{old('image')}}" style="@error('image') border: 1px solid red; @enderror">
                                          <label for="file-1" id="file-1-preview">
                                          <img src="/images/Product_img/{{$products->image}}" alt=""  value="{{old('image')}}" style="@error('image') border: 1px solid red; @enderror">
                                          <div> <span>Choose image</span></div>
                                          </label>

                                      </div>
                                  
                                  </div>
                              </div> 
                              <span style="color: red;">@error('image') {{$message}} @enderror </span>
                                                
                          </div>

                          
                        </div> <!-- Mid S2------------------------------------>

                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('Products.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                        </div>
                 
                    </div> <!-- Mid Seperator------------------------------------>

                </form>



                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>

     <!-- Test------------------------------------>
     
<!--Test------------------------------------>

    </div><!-- Main------------------------------------>
        
    @endsection  