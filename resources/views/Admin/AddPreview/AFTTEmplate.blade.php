
@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Templates')
@section('navi','Templates')


  
<div class="main"> <!-- Main------------------------------------>


    <div class="Add-Holder"> <!-- Add Holder------------------------------------>

        <div class="Add-InP"> <!-- Add Inp------------------------------------>

            <div class ="Top-Form">
                <h1 class = "M-TITTL">New Templates</h1>      
            </div>

            <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

              <form action="{{Route('Templates.store')}}" method="POST" enctype="multipart/form-data">
                 @csrf  
                                    
                <div class = "EXSepator"> <!-- Mid SEPERATOR------------------------------------>

                    <div class = "S1"> <!-- Mid S1------------------------------------>

                        <div class = "EXSepator"> 
                        <div class="field">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Example: Flash Templates" value="{{old('name')}}" style="@error('name') border: 1px solid red; @enderror" >
                            <span style="color: red;">@error('name') {{$message}} @enderror </span>
                        </div>  

                        <div class="field">
                            <label>Tag</label>
                            <input type="text" name="tag" placeholder="Example: FSH-1" value="{{old('tag')}}" style="@error('tag') border: 1px solid red; @enderror" >
                            <span style="color: red;">@error('tag') {{$message}} @enderror </span>
                        </div>       
                        </div> 
      
      
                         
                        <div class="field">
                            <label>Design</label>
                            <select  class ="selects"  name="design_id" id="" value="{{old('design_id')}}" style="@error('design_id') border: 1px solid red; @enderror">                                               
                                 <option disabled= "" value="">Select type</option>
                                 @foreach($designs as $dsgn)
                                    <option value="{{$dsgn->id}}">{{$dsgn->name}}</option>
                                 @endforeach
  
                            </select>
                            <span style="color: red;">@error('design_id') {{$message}} @enderror </span>
                            
                         </div> 

                    </div><!-- Mid S1------------------------------------>

                    <div class = "S2"> <!-- Mid S2------------------------------------>


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

                      
                    </div> <!-- Mid S2------------------------------------>

                    <div class="BUTNS-AD">
                       <a class ="Add-ITM-C"  href="{{Route('Templates.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                       <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                   </div>
         
       
                 
               
                </div> <!-- Mid Seperator------------------------------------>
              </form>
              
            </div> <!-- Mid Inp------------------------------------>


        </div> <!-- Add Inp------------------------------------>

    </div> <!-- Add Holder------------------------------------>

    </div>
    @endsection  