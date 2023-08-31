@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Papers')
@section('navi','Papers')

<div class="main"> <!-- Main------------------------------------>


    <div class="Add-Holder"> <!-- Add Holder------------------------------------>

        <div class="Add-InP"> <!-- Add Inp------------------------------------>

            <div class ="Top-Form">
                <h1 class = "M-TITTL">New PaperSpecs</h1>      
            </div>

            <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                  
            <form action="{{Route('PaperSpecs.update', $paperspecs->id )}}" method="POST" enctype="multipart/form-data">
                @csrf  
                @method('PUT')
                
                <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                    <div class = "S1"> <!-- Mid S1------------------------------------>

                        <div class="field">
                            <label>Category</label>
                            <select  class ="selects"  name="category_id" id="" value="{{old('category_id')}}" style="@error('category_id') border: 1px solid red; @enderror">                                               
                                @foreach($category as $ctgy)
                                <option value="{{$ctgy->id}}" {{$ctgy->id == $paperspecs->category_id ? 'selected' : ''}}>{{$ctgy->name}}</option>
                                @endforeach
                            </select>
                            <span style="color: red;">@error('category_id') {{$message}} @enderror </span>
                            
                         </div> 
    
                         <div class="field">
                            <label>Papers</label>
                            <select  class ="selects"  name="papers_id" id="" value="{{old('papers_id')}}" style="@error('papers_id') border: 1px solid red; @enderror">                                               
                                @foreach($papers as $paper)
                                <option value="{{$paper->id}}" {{$paper->id == $paperspecs->papers_id ? 'selected' : ''}}>{{$paper->name}}</option>
                                @endforeach
                            </select>
                            <span style="color: red;">@error('papers_id') {{$message}} @enderror </span>
                            
                         </div>  
                          

                         <div class="field">
                            <label>Paper Types</label>
                            <select  class ="selects"  name="papertypes_id" id="" value="{{old('papertypes_id')}}" style="@error('papertypes_id') border: 1px solid red; @enderror">                                               
                                @foreach($papertypes as $paperty)
                                <option value="{{$paperty->id}}" {{$paperty->id == $paperspecs->papertypes_id ? 'selected' : ''}}>{{$paperty->name}}</option>
                                @endforeach
                            </select>
                            <span style="color: red;">@error('papertypes_id') {{$message}} @enderror </span>
                            
                         </div> 
      
                    </div>  <!-- Mid S1------------------------------------>

                    <div class = "S2">  <!-- Mid S2------------------------------------>

                       

                        <div class = "EXSepator">  <!-- Mid Seperator------------------------------------>

                            <div class="field">
                                <label>LBS</label>
                                <input type="number" name="lbs" placeholder="Example: 80lbs , 100lbs" value="{{old('lbs') ?? $paperspecs->lbs}}" style="@error('lbs') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('lbs') {{$message}} @enderror </span>
                             </div> 

                            <div class="field">
                                <label>Value</label>
                                <input type="number"  step="any" name="value" placeholder="Value added" value="{{old('value') ?? $paperspecs->value}}" style="@error('value') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('value') {{$message}} @enderror </span>
                             </div> 
    
    
                            </div> 
                

                         
                         <div class="field">
                            <label>Quantity</label>
                            <input type="number" name="quantity" placeholder="Example: 100" value="{{old('quantity') ?? $paperspecs->quantity}}" style="@error('quantity') border: 1px solid red; @enderror" >
                            <span style="color: red;">@error('quantity') {{$message}} @enderror </span>
                         </div> 
               

                         <div class="field">
                            <label>Status</label>
                            <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                @if($paperspecs->status == "Active")
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                @endif
                                @if($paperspecs->status == "Inactive")
                                    <option value="Inactive" selected>Inactive</option>
                                    <option value="Active" >Active</option>
                                @endif     
                            </select>
                            <span style="color: red;">@error('status') {{$message}} @enderror </span>
                            
                         </div>  

                    </div>  <!-- Mid S2------------------------------------>

                    <div class="BUTNS-AD">
                        <a class ="Add-ITM-C"  href="{{Route('PaperSpecs.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                        <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                    </div>
          
                </form>
                 

                </div> <!-- Mid Seperator------------------------------------>

            </div> <!-- Mid Inp------------------------------------>


        </div> <!-- Add Inp------------------------------------>

    </div> <!-- Add Holder------------------------------------>
</div> 