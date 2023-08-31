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
                <h1 class = "M-TITTL">New Design</h1>      
            </div>

            <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

              <form action="{{Route('Templates.update',$templates->id )}}" method="POST" enctype="multipart/form-data">    
                 @csrf  
                 @method('PUT')
                                    
                <div class = "EXSepator"> <!-- Mid SEPERATOR------------------------------------>

                    <div class = "S1"> <!-- Mid S1------------------------------------>

                        <div class = "EXSepator"> 
                        <div class="field">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Example: FlashTemplates" value="{{old('name') ?? $templates->name}}" style="@error('name') border: 1px solid red; @enderror" >
                            <span style="color: red;">@error('name') {{$message}} @enderror </span>
                        </div>  

                        <div class="field">
                            <label>Tag</label>
                            <input type="text" name="tag" placeholder="Example: FLSH-01" value="{{old('tag') ?? $templates->tag}}" style="@error('date') border: 1px solid red; @enderror" >
                            <span style="color: red;">@error('tag') {{$message}} @enderror </span>
                        </div>  
                       
                        </div> 
      
      
                         
                        <div class="field">
                            <label>Design</label>
                            <select  class ="selects"  name="design_id" id="" value="{{old('design_id')}}" style="@error('design_id') border: 1px solid red; @enderror">                                               
                                 <option disabled= "" value="">Select type</option>
                                 @foreach($designs as $dsgn)
                                    <option value="{{$dsgn->id}}" {{$dsgn->id == $templates->design_id ? 'selected' : ''}}>{{$dsgn->name}}</option>
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
                                    <option value="{{$prdct->id}}" {{$prdct->id == $templates->product_id ? 'selected' : ''}}>{{$prdct->name}}</option>
                                 @endforeach
  
                            </select>
                            <span style="color: red;">@error('product_id') {{$message}} @enderror </span>
                            
                         </div> 

                 


                        <div class="field">
                            <label>status</label>
                            <select name="status">
                                @if($templates->status == "Active")
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                @endif
                                @if($templates->status == "Inactive")
                                    <option value="Inactive" selected>Inactive</option>
                                    <option value="Active" >Active</option>
                                @endif                           
                            </select>

                            <span style="color: red;">@error('status') {{$message}} @enderror </span>
                            
                         </div>  

                      
                    </div> <!-- Mid S2------------------------------------>

                    <div class="BUTNS-AD">
                       <a class ="Add-ITM-C"  href="{{Route('Templates.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                       <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                   </div>
                       
                </div> <!-- Mid Seperator------------------------------------>
              </form>
            </div> <!-- Mid Inp------------------------------------>


        </div> <!-- Add Inp------------------------------------>

    </div> <!-- Add Holder------------------------------------>
</div>
@endsection  